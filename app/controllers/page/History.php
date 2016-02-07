<?php

namespace Controller\Page;

class History extends \Controller\AbstractPageController
{

    public function get()
    {
        $incidents = array_slice($this->incident->all(), 0, 150);

        for ($x = 0; $x < count($incidents); $x++) {
            $incidents[$x]['name'] = $this->page->get($incidents[$x]['page'])['name'] ?? '';
        }

        $parameters['path']       = $this->router->path();
        $parameters['template']   = $this->template->get();
        $parameters['components'] = $this->component->all();
        $parameters['incidents']  = $incidents;

        return $this->response->render('_history', $parameters);
    }
}
