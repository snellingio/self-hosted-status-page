<?php

namespace Controller\Api;

class UptimeRobot extends \Controller\AbstractApiController
{

    public function get()
    {
        if (!UPTIMEROBOT) {
            return $this->response->jsonError(403, 'This endpoint is not currently enabled.');
        }

        $summary = $this->uptimerobot->summary();
        return $this->response->json($summary);
    }
}
