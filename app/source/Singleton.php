<?php
declare (strict_types = 1);

namespace Source;

use Predis\Client as Redis;
use Source\Response;
use Source\Request;
use Source\Router;
use Source\Session;
use Source\Database;

class Singleton
{

    public static $cache;
    public static $database;
    public static $response;
    public static $request;
    public static $router;
    public static $session;

    public function cache() : Redis
    {
        if (!self::$cache) {
            self::$cache = new Redis(
                [
                    'host'     => REDIS_HOST,
                    'port'     => REDIS_PORT,
                    'password' => REDIS_PASSWORD,
                ],
                [
                    'prefix' => REDIS_PREFIX,
                ]
            );
        }

        return self::$cache;
    }

    public function database() : Database
    {
        if (!self::$database) {
            self::$database = new Database();
        }

        return self::$database;
    }

    public function response() : Response
    {
        if (!self::$response) {
            self::$response = new Response();
        }

        return self::$response;
    }

    public function request() : Request
    {
        if (!self::$request) {
            self::$request = new Request();
        }

        return self::$request;
    }

    public function router() : Router
    {
        if (!self::$router) {
            self::$router = new Router();
        }

        return self::$router;
    }

    public function session() : Session
    {
        if (!self::$session) {
            self::$session = new Session();
        }

        return self::$session;
    }
}
