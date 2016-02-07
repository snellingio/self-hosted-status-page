<?php
declare (strict_types = 1);

namespace Controller;

use Model\Page;
use Model\Incident;
use Source\Request;
use Model\Component;
use Source\Response;
use Service\UptimeRobot;

abstract class AbstractApiController
{

    protected $component;
    protected $incident;
    protected $page;
    protected $response;
    protected $request;
    protected $uptimerobot;

    public function __construct()
    {
        $this->component   = new Component();
        $this->incident    = new Incident();
        $this->page        = new Page();
        $this->response    = new Response();
        $this->request     = new Request();
        $this->uptimerobot = new UptimeRobot();
    }

}
