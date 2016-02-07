<?php
declare (strict_types = 1);

namespace Source;

class Router
{

    private $request;
    private $tokens = [
        ':string' => '([a-zA-Z]+)',
        ':number' => '([0-9]+)',
        ':alpha'  => '([a-zA-Z0-9-_]+)',
    ];

    public function __construct()
    {
        $this->request = new Request();
    }

    public function path() : string
    {
        $server = $this->request->server();
        $path   = '/';
        if (!empty($server['PATH_INFO'])) {
            $path = $server['PATH_INFO'];
        } elseif (!empty($server['ORIG_PATH_INFO']) && '/index.php' !== $server['ORIG_PATH_INFO']) {
            $path = $server['ORIG_PATH_INFO'];
        } else {
            if (!empty($server['REQUEST_URI'])) {
                $path = (strpos($server['REQUEST_URI'], '?') > 0) ? strstr($server['REQUEST_URI'], '?', true) : $server['REQUEST_URI'];
            }
        }
        if (strlen($path) > 1) {
            $path = rtrim($path, '/');
        }
        return $path;
    }

    public function serve($routes) : bool
    {
        try {
            $server     = $this->request->server();
            $method     = strtolower($server['REQUEST_METHOD']) ?? 'get';
            $path       = $this->path();
            $discovered = null;
            $matches    = [];
            if (isset($routes[$path])) {
                $discovered = $routes[$path];
            } elseif ($routes) {
                foreach ($routes as $pattern => $name) {
                    $pattern = strtr($pattern, $this->tokens);
                    if (preg_match('#^/?' . $pattern . '/?$#', $path, $match)) {
                        $discovered = $name;
                        $matches    = $match;
                        break;
                    }
                }
            }
            $handler = null;
            if ($discovered) {
                if (is_string($discovered)) {
                    $handler = new $discovered();
                } elseif (is_callable($discovered)) {
                    $handler = $discovered();
                }
            }
            if ($handler) {
                if (method_exists($handler, $method)) {
                    call_user_func_array([$handler, $method], $matches);
                    return true;
                }
            }
        } catch (\Exception $e) {}
        return false;
    }
}
