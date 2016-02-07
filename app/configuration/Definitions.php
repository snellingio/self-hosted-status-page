<?php

namespace Configuration;

use Model\Settings;

class Definitions
{

    public $definitions;
    public $defaults = [
        'ADMIN_AUTHENTICATION'      => [],
        'API_KEY'                   => '',
        'TIMEZONE'                  => 'America/Chicago',
        'REDIS_HOST'                => '127.0.0.1',
        'REDIS_PORT'                => '6379',
        'REDIS_PASSWORD'            => '',
        'REDIS_PREFIX'              => '',
        'SLACK_WEBHOOK'             => false,
        'SLACK_WEBHOOK_URL'         => '',
        'UPTIMEROBOT'               => false,
        'UPTIMEROBOT_RESPONSE_TIME' => false,
        'UPTIMEROBOT_UP_TIME'       => true,
        'UPTIMEROBOT_MONITOR_KEY'   => '',
        'UPTIMEROBOT_MONITOR_ID'    => '',
        'WEBHOOK'                   => false,
        'WEBHOOK_URLS'              => [],
        'RUNNING_TESTS'             => false,
        'DEMO'                      => false,
        'VIEWS_DIR'                 => __DIR__ . '/../views/',
        'GZIP'                      => true,
        'SUPPORT_STATUS_CAT'        => true,
        'PUBLIC_PAGE'               => true,
        'PRIVATE_PAGE_PASSWORD'     => '',
        'REQUIRE_API_KEY'           => false,
    ];
    private $settings;

    public function __construct($definitions = [])
    {
        $this->definitions = $definitions;
    }

    public function load()
    {
        if (!defined('BASE_URL')) {
            define('BASE_URL', $_SERVER['HTTP_HOST']);
        }
        foreach ($this->definitions as $key => $value) {
            if (!defined($key)) {
                if (is_array($value)) {
                    $value = serialize($value);
                }
                define($key, $value);
            }
        }
        if (!defined('REDIS_HOST') || !defined('REDIS_PORT')) {
            echo "Redis is not configured correctly";
            exit;
        }
        foreach ((new Settings)->get() as $key => $value) {
            if (!defined($key)) {
                if (is_array($value)) {
                    $value = serialize($value);
                }
                define(strtoupper($key), $value);
            }
        }
        foreach ($this->defaults as $key => $value) {
            if (!defined($key)) {
                if (is_array($value)) {
                    $value = serialize($value);
                }
                define($key, $value);
            }
        }
        return true;
    }
}
