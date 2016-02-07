<?php
declare (strict_types = 1);

namespace Controller;

use Model\Page;
use Service\Form;
use Source\Router;
use Model\Incident;
use Model\Settings;
use Model\Template;
use Service\Import;
use Source\Request;
use Source\Session;
use Model\Component;
use Source\Response;

abstract class AbstractDashboardController
{

    protected $component;
    protected $form;
    protected $import;
    protected $incident;
    protected $page;
    protected $response;
    protected $request;
    protected $router;
    protected $session;
    protected $settings;
    protected $template;

    public function __construct()
    {
        $this->session  = new Session();
        $this->response = new Response();
        $this->router   = new Router();

        $this->session->start();
        if (($this->session->get('authenticated') !== true) && ($this->session->get('admin') !== true) && ($this->router->path() != '/dashboard')) {
            $this->response->redirect('/');
        }

        $this->component = new Component();
        $this->form      = new Form();
        $this->import    = new Import();
        $this->incident  = new Incident();
        $this->page      = new Page();
        $this->request   = new Request();
        $this->template  = new Template();
        $this->settings  = new Settings();
    }
}
