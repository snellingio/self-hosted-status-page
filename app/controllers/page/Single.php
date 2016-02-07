<?php

namespace Controller\Page;

class Single extends \Controller\AbstractPageController
{

    public function get($key)
    {
        $key  = explode('/', $key);
        $key  = end($key);
        $page = $this->page->get($key);

        if (!isset($page['name'])) {
            return $this->response->redirect('/');
        }

        $incidents = [];

        if (isset($page['incidents'])) {
            foreach ($page['incidents'] as $incidentKey) {
                $incidents[] = $this->incident->get($incidentKey);
            }
        }

        usort($incidents, function ($incident1, $incident2) {
            return strtotime($incident2['time']) - strtotime($incident1['time']);
        });

        $parameters['path']      = $this->router->path();
        $parameters['template']  = $this->template->get();
        $parameters['page']      = $page;
        $parameters['incidents'] = $incidents;

        return $this->response->render('_single', $parameters);
    }
}
