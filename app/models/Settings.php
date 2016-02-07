<?php

namespace Model;

use Source\Database as Database;

class Settings
{

    private $database;
    private $table   = 'settings';
    private $columns = [
        'timezone',
        'slack_webhook',
        'uptimerobot',
        'uptimerobot_response_time',
        'uptimerobot_up_time',
        'uptimerobot_monitor_key',
        'uptimerobot_monitor_id',
        'support_status_cat',
        'webhook',
        'webhook_urls',
        'public_page',
        'private_page_password',
        'require_api_key',
    ];
    private $defaults = [
        'timezone'                  => 'America/Chicago',
        'slack_webhook'             => false,
        'slack_webhook_url'         => '',
        'uptimerobot'               => false,
        'uptimerobot_response_time' => false,
        'uptimerobot_up_time'       => false,
        'uptimerobot_monitor_key'   => '',
        'uptimerobot_monitor_id'    => '',
        'support_status_cat'        => true,
        'webhook'                   => false,
        'webhook_urls'              => [],
        'public_page'               => true,
        'private_page_password'     => '',
        'require_api_key'           => false,
    ];

    public function __construct()
    {
        $this->database = new Database($this->table);
    }

    public function create(array $data = [])
    {
        $data = array_intersect_key($data, array_flip($this->columns));
        $this->database->set($this->table, $data);
        return $this->get($this->table);
    }

    public function get()
    {
        $data = $this->database->get($this->table);
        if (!$data) {
            return $this->defaults;
        }
        $result = array_merge($this->defaults, $data);
        return $result;
    }
}
