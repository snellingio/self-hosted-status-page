<?php

namespace Configuration;

class Routes
{

    public $api = [
        '/api/v1/components'       => 'Controller\Api\Components',
        '/api/v1/incidents'        => 'Controller\Api\Incidents',
        '/api/v1/incidents/:alpha' => 'Controller\Api\Single',
        '/api/v1/status'           => 'Controller\Api\Status',
        '/api/v1/graph'            => 'Controller\Api\UptimeRobot',
        '/api/v1/uptimerobot'      => 'Controller\Api\UptimeRobot',
    ];

    public $app = [
        '/dashboard'                    => 'Controller\Dashboard\Dashboard',
        '/dashboard/components/new'     => 'Controller\Dashboard\Components',
        '/dashboard/components'         => 'Controller\Dashboard\Components',
        '/dashboard/incidents'          => 'Controller\Dashboard\Incidents',
        '/dashboard/incidents/new'      => 'Controller\Dashboard\Incidents',
        '/dashboard/incidents/p/:alpha' => 'Controller\Dashboard\Single',
        '/dashboard/import'             => 'Controller\Dashboard\Import',
        '/dashboard/settings'           => 'Controller\Dashboard\Template',
        '/dashboard/settings/styles'    => 'Controller\Dashboard\Template',
        '/dashboard/settings/options'   => 'Controller\Dashboard\Settings',
    ];

    public $site = [
        '/'                 => 'Controller\Page\Status',
        '/private'          => 'Controller\Page\PrivatePage',
        '/history'          => 'Controller\Page\History',
        '/incidents/:alpha' => 'Controller\Page\Single',
        '/rss'              => 'Controller\Page\Rss',
    ];

    public function load()
    {
        return $this->api + $this->app + $this->site;
    }
}
