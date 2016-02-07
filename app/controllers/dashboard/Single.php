<?php

namespace Controller\Dashboard;

class Single extends \Controller\AbstractDashboardController
{

    public function get($key)
    {
        $parameters['path']     = $this->router->path();
        $parameters['template'] = $this->template->get();
        $key                    = explode('/', $key);
        $key                    = end($key);
        $page                   = $this->page->get($key);

        if (!isset($page['name'])) {
            return $this->response->redirect('/dashboard/incidents');
        }

        $incidents = [];

        if (isset($page['incidents'])) {
            foreach ($page['incidents'] as $incidentKey) {
                $incidents[] = $this->incident->get($incidentKey);
            }
        }

        usort($incidents, function ($incident1, $incident2) {
            return strtotime($incident2['time']) - strtotime($incident1['time']);
        });

        $parameters['page']      = $page;
        $parameters['incidents'] = $incidents;

        return $this->response->render('_dashboard', $parameters);
    }

    public function post($key)
    {
        $post                        = $this->request->post();
        $parameters['path']          = $this->router->path();
        $parameters['template']      = $this->template->get();
        $parameters['flash']['form'] = $post['form'];
        $key                         = explode('/', $key);
        $key                         = end($key);

        if (DEMO) {
            return $this->response->redirect('/dashboard/incidents/' . $key);
        }

        if ($post['form'] === 'update-page') {
            $parameters['flash']['success'] = $this->form->updatePage($post);
            if ($post['action'] === 'delete') {
                return $this->response->redirect('/dashboard/incidents');
            }
        }

        if ($post['form'] === 'update-incident') {
            $parameters['flash']['success'] = $this->form->updateIncident($post);
        }

        if ($post['form'] === 'update-create-incident') {
            $parameters['flash']['success'] = $this->form->updateCreateIncident($post);
        }

        $page = $this->page->get($key);

        if (!isset($page['name'])) {
            return $this->response->redirect('/dashboard/incidents');
        }

        $incidents = [];

        if (isset($page['incidents'])) {
            foreach ($page['incidents'] as $incidentKey) {
                $incidents[] = $this->incident->get($incidentKey);
            }
        }

        usort($incidents, function ($incident1, $incident2) {
            return strtotime($incident2['time']) - strtotime($incident1['time']);
        });

        $parameters['page']      = $page;
        $parameters['incidents'] = $incidents;

        if (empty($parameters['incidents'])) {
            return $this->response->redirect('/dashboard/incidents');
        }

        return $this->response->render('_dashboard', $parameters);
    }
}
