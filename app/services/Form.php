<?php

namespace Service;

use Model\Page;
use Model\Incident;
use Model\Component;

class Form
{

    private $component;
    private $page;
    private $incident;
    private $webhook;

    public function __construct()
    {
        $this->component = new Component();
        $this->page      = new Page();
        $this->incident  = new Incident();
        $this->webhook   = new Webhook();

    }

    public function createComponent($post)
    {
        if (!empty($post['component']['name'])) {
            $item = [
                'name'        => $post['component']['name'],
                'description' => $post['component']['description'],
                'sort'        => 99,
                'status'      => 'operational',
            ];
            $this->component->create($item);
            return true;
        }
        return false;
    }

    public function createIncident($post)
    {
        if (!empty($post['incident']['name'])
            && !empty($post['incident']['description'])) {
            $pageKey = substr(md5(uniqid()), 0, 12);
            $status  = $post['incident']['status'];
            if ($status === 'custom') {
                $status = $post['incident']['custom'];
                if (empty($status)) {
                    $status = 'investigating';
                }
            }
            $createdIncident = $this->incident->create(
                [
                    'page'        => $pageKey,
                    'description' => $post['incident']['description'],
                    'status'      => strtolower($status),
                ]
            );
            $this->page->create(
                [
                    'key'       => $pageKey,
                    'name'      => $post['incident']['name'],
                    'incidents' => [$createdIncident['key']],
                ]
            );
            $message = "[Status Update] " . $post['incident']['name'] . " \n Currently " . ucfirst($post['incident']['status']) . "... \n " . $post['incident']['description'] . " \n <" . BASE_URL . "/incidents/" . $pageKey . "|Click here for more updates> ";
            $this->webhook->slack($message);
            return true;
        }
        return false;
    }

    public function updateComponent($post)
    {
        if ($post['action'] === 'save') {
            if (!empty($post['component']['name'])) {
                $this->component->create($post['component']);
                return true;
            }
            return false;
        }
        if ($post['action'] === 'delete') {
            $this->component->delete($post['component']['key']);
            return true;
        }
        return false;
    }

    public function updateComponents($post)
    {
        if (isset($post['component'])) {
            $items = $post['component'];
            $sort  = 0;
            foreach ($items as $key => $value) {
                $piece           = $this->component->get($key);
                $piece['sort']   = $sort;
                $piece['status'] = $value;
                $this->component->create($piece);
                $sort++;
            }
            return true;
        }
        return false;
    }

    public function updateCreateIncident($post)
    {
        if (!empty($post['page']['key']) && !empty($post['incident']['description'])) {
            $status = $post['incident']['status'];
            if ($status === 'custom') {
                $status = $post['incident']['custom'];
                if (empty($status)) {
                    $status = 'investigating';
                }
            }
            $currentPage     = $this->page->get($post['page']['key']);
            $createdIncident = $this->incident->create(
                [
                    'page'        => $post['page']['key'],
                    'description' => $post['incident']['description'],
                    'status'      => strtolower($status),
                ]
            );
            $currentPage['incidents'][] = $createdIncident['key'];
            $this->page->create($currentPage);
            $message = "[Status Update] " . $currentPage['name'] . " \n Currently " . ucfirst($post['incident']['status']) . "... \n " . $post['incident']['description'] . " \n <" . BASE_URL . "/incidents/" . $currentPage['key'] . "|Click here for more updates> ";
            $this->webhook->slack($message);
            return true;
        }
        return false;
    }

    public function updateIncident($post)
    {
        if ($post['action'] === 'save') {
            return $this->updateIncidentSave($post);
        }
        if ($post['action'] === 'delete') {
            return $this->updateIncidentDelete($post);
        }
        return false;
    }

    public function updateIncidentDelete($post)
    {
        $currentPage  = $this->page->get($post['page']['key']);
        $newIncidents = [];
        foreach ($currentPage['incidents'] as $currentIncident) {
            if ($currentIncident !== $post['incident']['key']) {
                $newIncidents[] = $currentIncident;
            }
        }
        $currentPage['incidents'] = $newIncidents;
        $this->page->create($currentPage);
        $this->incident->delete($post['incident']['key']);
        return true;
    }

    public function updateIncidentSave($post)
    {
        if (!empty($post['page']['key']) && !empty($post['incident']['description']) && !empty($post['incident']['key'])) {
            $status = $post['incident']['status'];
            if ($status === 'custom') {
                $status = $post['incident']['custom'];
                if (empty($status)) {
                    $status = 'investigating';
                }
            }
            $this->incident->create(
                [
                    'key'         => $post['incident']['key'],
                    'page'        => $post['page']['key'],
                    'description' => $post['incident']['description'],
                    'status'      => strtolower($status),
                ]
            );
            return true;
        }
        return false;
    }

    public function updatePage($post)
    {
        if ($post['action'] === 'save') {
            return $this->updatePageSave($post);
        }
        if ($post['action'] === 'delete') {
            return $this->updatePageDelete($post);
        }
        return false;
    }

    public function updatePageDelete($post)
    {
        $currentPage = $this->page->get($post['page']['key']);
        foreach ($currentPage['incidents'] as $currentIncident) {
            $this->incident->delete($currentIncident);
        }
        $this->page->delete($post['page']['key']);
        return true;
    }

    public function updatePageSave($post)
    {
        $currentPage         = $this->page->get($post['page']['key']);
        $currentPage['name'] = $post['page']['name'];
        $this->page->create($currentPage);
        return true;
    }
}
