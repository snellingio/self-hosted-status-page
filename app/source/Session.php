<?php
declare (strict_types = 1);

namespace Source;

use Predis\Session\Handler as SessionHandler;

class Session
{

    private $redis;
    private $sessionHandler;

    public function __construct()
    {
        $this->redis          = (new Singleton)->cache();
        $this->sessionHandler = new SessionHandler($this->redis, ['gc_maxlifetime' => 86400]);
    }

    public function all()
    {
        return $_SESSION;
    }

    public function get(string $key)
    {
        if (array_key_exists($key, $_SESSION)) {
            return $_SESSION[$key];
        }
        return false;
    }

    public function set(string $key, $value) : bool
    {
        $_SESSION[$key] = $value;
        return true;
    }

    public function start() : bool
    {
        try {
            if (session_status() === PHP_SESSION_NONE || $this->all() === null) {
                $this->sessionHandler->register();
                session_start();
            }
            return true;
        } catch (\Exception $e) {}
        return false;
    }
}
