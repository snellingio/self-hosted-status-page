<?php

namespace Controller\Api;

class Components extends \Controller\AbstractApiController
{

    public function get()
    {
        if (REQUIRE_API_KEY) {
            if (API_KEY !== $post['apikey']) {
                return $this->response->jsonError(400, 'Your `apikey` was not correct.');
            }
        }

        $components = $this->component->all();

        if (count($components) < 1) {
            return $this->response->jsonError(200, 'There are currently no components.');
        }

        for ($x = 0; $x < count($components); $x++) {
            ksort($components[$x]);
            unset($components[$x]['sort']);
        }

        return $this->response->json($components);
    }
}
