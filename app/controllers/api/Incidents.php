<?php

namespace Controller\Api;

class Incidents extends \Controller\AbstractApiController
{

    public function get()
    {
        if (REQUIRE_API_KEY) {
            if (API_KEY !== $post['apikey']) {
                return $this->response->jsonError(400, 'Your `apikey` was not correct.');
            }
        }

        $incidents = $this->incident->all();

        if (count($incidents) < 1) {
            return $this->response->jsonError(200, 'There are currently no incidents.');
        }

        for ($x = 0; $x < count($incidents); $x++) {
            $incidents[$x]['name'] = $this->page->get($incidents[$x]['page'])['name'] ?? '';
            $incidents[$x]['time'] = date("c", strtotime($incidents[$x]['time']));
            ksort($incidents[$x]);
        }

        return $this->response->json($incidents);
    }

    public function post()
    {
        $post = $this->request->post();

        if (DEMO) {
            return $this->response->jsonError(401, 'Currently in DEMO mode');
        }

        if (API_KEY !== $post['apikey']) {
            return $this->response->jsonError(400, 'Your `apikey` was not correct.');
        }

        if (API_KEY === '') {
            return $this->response->jsonError(400, 'The `apikey` on the server is not configured correctly.');
        }

        if (!isset($post['name']) || empty($post['name'])) {
            return $this->response->jsonError(400, 'Expected a parameter `name` with the name of the incident.');
        }

        if (!isset($post['status']) || empty($post['status'])) {
            return $this->response->jsonError(400, 'Expected a parameter `status` with the status of the incident.');
        }

        if (!isset($post['description']) || empty($post['description'])) {
            return $this->response->jsonError(400, 'Expected a parameter `description` with a description of the incident.');
        }

        $pageKey = substr(md5(uniqid()), 0, 12);

        $createdIncident = $this->incident->create(
            [
                'page'        => $pageKey,
                'description' => $post['description'],
                'status'      => strtolower($post['status']),
            ]
        );

        $this->page->create(
            [
                'key'       => $pageKey,
                'name'      => $post['name'],
                'incidents' => [$createdIncident['key']],
            ]
        );

        ksort($createdIncident);

        $message = [
            'success'  => true,
            'error'    => false,
            'message'  => 'Created a new incident and a new page',
            'incident' => $createdIncident,
        ];
        return $this->response->json($message);
    }
}
