<?php
declare (strict_types = 1);

namespace Controller;

use Model\Page;
use Source\Router;
use Model\Incident;
use Model\Template;
use Source\Request;
use Source\Session;
use Model\Component;
use Source\Response;

abstract class AbstractPageController
{

    protected $component;
    protected $incident;
    protected $page;
    protected $response;
    protected $request;
    protected $router;
    protected $session;
    protected $template;

    public function __construct()
    {
        $this->response = new Response();
        $this->router   = new Router();

        if (!PUBLIC_PAGE) {
            $this->session = new Session();
            $this->session->start();
            $this->request = new Request();
            if (($this->session->get('authenticated') !== true) && ($this->router->path() != '/private')) {
                $this->response->redirect('/private');
            }
        }

        $this->component = new Component();
        $this->incident  = new Incident();
        $this->page      = new Page();
        $this->template  = new Template();
    }
}
