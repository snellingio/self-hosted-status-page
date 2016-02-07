<?php

if (!defined('RUNNING_TESTS')) {
    $_SERVER['HTTP_HOST'] = '';
    define('RUNNING_TESTS', true);
    define('VIEWS_DIR', __DIR__ . '/../app/views');
    if (!defined('CONFIGURATION_LOADED')) {
        include __DIR__ . '/../app/configuration/autoload.php';
        $definitions = new Configuration\Definitions([
            'REDIS_HOST' => '127.0.0.1',
            'REDIS_PORT' => '6379',
        ]);
        $definitions->load();
    }
}
