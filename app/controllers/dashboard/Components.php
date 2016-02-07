<?php

namespace Controller\Dashboard;

class Components extends \Controller\AbstractDashboardController
{

    public function get()
    {
        $parameters['path']       = $this->router->path();
        $parameters['template']   = $this->template->get();
        $parameters['components'] = $this->component->all();

        return $this->response->render('_dashboard', $parameters);
    }

    public function post()
    {
        $post                        = $this->request->post();
        $parameters['path']          = $this->router->path();
        $parameters['template']      = $this->template->get();
        $parameters['flash']['form'] = $post['form'];

        if (DEMO) {
            return $this->response->redirect('/dashboard/components');
        }

        if ($post['form'] === 'create-component') {
            $parameters['flash']['success'] = $this->form->createComponent($post);
        }

        if ($post['form'] === 'update-component') {
            $parameters['flash']['success'] = $this->form->updateComponent($post);
        }

        if ($post['form'] === 'update-components') {
            $parameters['flash']['success'] = $this->form->updateComponents($post);
        }

        $parameters['components'] = $this->component->all();

        return $this->response->render('_dashboard', $parameters);
    }
}
