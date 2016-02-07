<?php

namespace Controller\Api;

class Status extends \Controller\AbstractApiController
{

    public function get()
    {
        if (REQUIRE_API_KEY) {
            if (API_KEY !== $post['apikey']) {
                return $this->response->jsonError(400, 'Your `apikey` was not correct.');
            }
        }

        $components = $this->component->all();
        $incidents  = $this->incident->all();
        $status     = 'operational';

        if (isset($incidents[0])) {
            if (strtolower($incidents[0]['status']) !== 'resolved' && strtolower($incidents[0]['status']) !== 'completed') {
                $status = 'issues';
            }
        }

        foreach ($components as $component) {
            if ($component['status'] !== 'operational') {
                $status = 'issues';
            }
        }

        return $this->response->json(['status' => $status]);
    }
}
