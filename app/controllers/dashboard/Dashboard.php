<?php

namespace Controller\Dashboard;

class Dashboard extends \Controller\AbstractDashboardController
{

    public function get()
    {
        if ($this->session->get('authenticated') === true && $this->session->get('admin') === true) {
            $this->response->redirect('/dashboard/components');
        }
        $parameters['path']     = $this->router->path();
        $parameters['template'] = $this->template->get();
        return $this->response->render('_signin', $parameters);
    }

    public function post()
    {
        $post                   = $this->request->post();
        $parameters['path']     = $this->router->path();
        $parameters['template'] = $this->template->get();
        $users                  = unserialize(ADMIN_AUTHENTICATION);

        if (DEMO) {
            $this->session->set('authenticated', true);
            return $this->response->redirect('/dashboard/components');
        }

        if (isset($users[$post['username']]) && ($users[$post['username']] == $post['password'])) {
            $this->session->set('authenticated', true);
            $this->session->set('admin', true);
            return $this->response->redirect('/dashboard/components');
        }

        $parameters['error'] = 'Incorrect username & password';
        return $this->response->render('_signin', $parameters);
    }
}
