<?php

namespace Controller\Dashboard;

class Incidents extends \Controller\AbstractDashboardController
{

    public function get()
    {
        $parameters['path']     = $this->router->path();
        $parameters['template'] = $this->template->get();

        $incidents = $this->incident->all();

        for ($x = 0; $x < count($incidents); $x++) {
            $incidents[$x]['name'] = $this->page->get($incidents[$x]['page'])['name'] ?? '';
        }

        $parameters['incidents'] = $incidents;

        return $this->response->render('_dashboard', $parameters);
    }

    public function post()
    {
        $post                        = $this->request->post();
        $parameters['path']          = $this->router->path();
        $parameters['template']      = $this->template->get();
        $parameters['flash']['form'] = $post['form'];

        if (DEMO) {
            return $this->response->redirect('/dashboard/incidents');
        }

        if ($post['form'] === 'create-incident') {
            $parameters['flash']['success'] = $this->form->createIncident($post);
        }

        if ($post['form'] === 'update-create-incident') {
            $parameters['flash']['success'] = $this->form->updateCreateIncident($post);
        }

        $incidents = $this->incident->all();

        for ($x = 0; $x < count($incidents); $x++) {
            $incidents[$x]['name'] = $this->page->get($incidents[$x]['page'])['name'] ?? '';
        }

        $parameters['incidents'] = $incidents;

        return $this->response->render('_dashboard', $parameters);
    }
}
