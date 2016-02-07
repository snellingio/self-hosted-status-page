<?php
declare (strict_types = 1);

namespace Source;

use League\Plates\Engine as View;

class Response
{

    private $body;
    private $headers;
    private $responseCode;
    private $request;
    private $view;

    public function __construct()
    {
        $this->request      = new Request();
        $this->view         = new View(VIEWS_DIR);

        $this->setResponseCode(200);
        $this->setHeader('Access-Control-Allow-Origin', '*');
        $this->setHeader('Date', date('D, d M Y H:i:s \G\M\T'));
        $this->setHeader('Server', 'Status Cat');
        $this->setHeader('X-Frame-Options', 'SAMEORIGIN');
        $this->setHeader('X-UA-Compatible', 'IE=Edge,chrome=1');
        $this->setHeader('X-Powered-By', 'Status Cat');
        $this->setHeader('X-XSS-Protection', '1');
        $this->setHeader('X-Content-Type-Options', 'nosniff');
    }

    public function html(string $data) : bool
    {
        $this->setHeader('Content-Type', 'text/html; charset=utf-8');
        $this->setHeader('Cache-Control', 'public, max-age=600');
        $this->setBody($data);
        return $this->output();
    }

    public function jsonError(int $responseCode = 500, string $details = '')
    {
        $this->setResponseCode($responseCode);
        return $this->json(
            [
                'status'  => $responseCode,
                'object'  => 'error',
                'details' => $details,
            ]
        );
    }

    public function json(array $data = []) : bool
    {
        $json = json_encode($data, JSON_PRETTY_PRINT);
        $this->setHeader('Content-Type', 'application/json; charset=utf-8');
        $this->setHeader('Cache-Control', 'private, max-age=300');
        $this->setBody($json);
        return $this->output();
    }

    public function output() : bool
    {
        if (RUNNING_TESTS) {
            return true;
        }

        $this->setHeader('ETag', md5($this->body));
        $this->outputHeaders();
        $this->outputBody();
        return true;
    }

    public function outputBody() : bool
    {
        if (RUNNING_TESTS) {
            return true;
        }
        if ($this->request->gzip()) {
            ob_start('ob_gzhandler');
            echo $this->body;
            ob_end_flush();
            return true;
        }

        ob_start();
        echo $this->body;
        ob_end_flush();
        return true;
    }

    public function outputHeaders() : bool
    {
        if (RUNNING_TESTS) {
            return true;
        }
        foreach ($this->headers as $key => $value) {
            header($key . ': ' . $value);
        }

        return true;
    }

    public function redirect(string $location = '/') : bool
    {
        $this->setHeader('Location', $location);
        return $this->outputHeaders();
    }

    public function render(string $template, array $parameters = []) : bool
    {
        $html = $this->view->render($template, $parameters);
        return $this->html($html);
    }

    public function setBody(string $data) : bool
    {
        $this->body = $data;
        return true;
    }

    public function setHeader(string $key, string $value) : bool
    {
        $this->headers[$key] = $value;
        return true;
    }

    public function setResponseCode(int $responseCode = 200) : bool
    {
        $this->responseCode = $responseCode;
        return true;
    }

    public function xml(string $data) : bool
    {
        $this->setHeader('Content-Type', 'application/xml; charset=utf-8');
        $this->setHeader('Cache-Control', 'private, max-age=300');
        $this->setBody($data);
        return $this->output();
    }
}
