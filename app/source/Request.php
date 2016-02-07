<?php
declare (strict_types = 1);

namespace Source;

class Request
{

    public function get()
    {
        return $_GET;
    }

    public function gzip() : bool
    {
        $server = $this->server();
        if (isset($server['HTTP_ACCEPT_ENCODING'])) {
            if (substr_count($server['HTTP_ACCEPT_ENCODING'], 'gzip') && GZIP) {
                return true;
            }
        }
        return false;
    }

    public function headers() : array
    {
        return getallheaders();
    }

    public function pjaxRequest() : bool
    {
        $headers = $this->headers();
        return isset($headers['X-PJAX']);
    }

    public function post()
    {
        return $_POST;
    }

    public function server()
    {
        return $_SERVER;
    }
}
