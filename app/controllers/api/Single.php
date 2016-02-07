<?php

namespace Controller\Api;

class Single extends \Controller\AbstractApiController
{

    public function get($key)
    {
        if (REQUIRE_API_KEY) {
            if (API_KEY !== $post['apikey']) {
                return $this->response->jsonError(400, 'Your `apikey` was not correct.');
            }
        }

        $key  = explode('/', $key);
        $key  = end($key);
        $page = $this->page->get($key);

        if (!isset($page['name'])) {
            return $this->response->jsonError(404, 'This page does not exist.');
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

        for ($x = 0; $x < count($incidents); $x++) {
            $incidents[$x]['time'] = date("c", strtotime($incidents[$x]['time']));
            ksort($incidents[$x]);
        }

        return $this->response->json($incidents);
    }

    public function post($key)
    {
        $post        = $this->request->post();
        $key         = explode('/', $key);
        $key         = end($key);
        $currentPage = $this->page->get($key);

        if (DEMO) {
            return $this->response->jsonError(401, 'Currently in DEMO mode');
        }

        if (API_KEY !== $post['apikey']) {
            return $this->response->jsonError(400, 'Your `apikey` was not correct.');
        }

        if (API_KEY === '') {
            return $this->response->jsonError(400, 'The `apikey` on the server is not configured correctly.');
        }

        if (!isset($currentPage['name'])) {
            return $this->response->jsonError(404, 'This page does not exist.');
        }

        if (!isset($post['status']) || empty($post['status'])) {
            return $this->response->jsonError(400, 'Expected a parameter `status` with the status of the incident.');
        }

        if (!isset($post['description']) || empty($post['description'])) {
            return $this->response->jsonError(400, 'Expected a parameter `description` with a description of the incident.');
        }

        $createdIncident = $this->incident->create(
            [
                'page'        => $currentPage['key'],
                'description' => $post['description'],
                'status'      => strtolower($post['status']),
            ]
        );
        $currentPage['incidents'][] = $createdIncident['key'];
        $this->page->create($currentPage);

        $message = [
            'success'  => true,
            'error'    => false,
            'message'  => 'Created a new incident on the page ' . $key,
            'incident' => $createdIncident,
        ];
        return $this->response->json($message);
    }
}
