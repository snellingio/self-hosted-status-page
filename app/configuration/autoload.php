<?php

if (getenv('REDIS_URL')) {
    $redis = parse_url(getenv('REDIS_URL'));
    $redisHost = $redis['host'] ?? '';
    $redisPort = $redis['port'] ?? '';
    $redisPass = $redis['pass'] ?? '';
    $authentication = [
        'ADMIN_AUTHENTICATION' => [
            getenv('ADMIN_USERNAME') => getenv('ADMIN_PASSWORD'),
        ],
        'API_KEY'              => getenv('API_KEY'),
    ];
    $database = [
        'REDIS_HOST'     => $redisHost,
        'REDIS_PORT'     => $redisPort,
        'REDIS_PASSWORD' => $redisPass,
        'REDIS_PREFIX'   => getenv('REDIS_PREFIX'),
    ];
    if (getenv('DEMO')) {
        $authentication = $authentication + ['DEMO' => true];
    }
    $exports = $authentication + $database;
} else {
    require __DIR__ . '/../../CONFIGURATION.php';
}

require __DIR__ . '/../../vendor/autoload.php';

if (!isset($exports)) {
    echo 'The configuration file did not load correctly.';
    exit;
}

if (!defined('RUNNING_TESTS')) {
    $definitions = new Configuration\Definitions($exports);
    $definitions->load();
    $routes = (new Configuration\Routes)->load();
    $found  = (new Source\Router)->serve($routes);
}

if (!function_exists('getallheaders')) {
    function getallheaders()
    {
        $headers = [];
        foreach ($_SERVER as $name => $value) {
            if (substr($name, 0, 5) == 'HTTP_') {
                $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
            }
        }
        return $headers;
    }
}

define('CONFIGURATION_LOADED', true);
