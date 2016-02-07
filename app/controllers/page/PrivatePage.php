<?php

namespace Controller\Page;

class PrivatePage extends \Controller\AbstractPageController
{

    public function get()
    {
        if (PUBLIC_PAGE) {
            $this->response->redirect('/');
        }

        $parameters['path']     = $this->router->path();
        $parameters['template'] = $this->template->get();

        return $this->response->render('_private', $parameters);
    }

    public function post()
    {
        $post                   = $this->request->post();
        $parameters['path']     = $this->router->path();
        $parameters['template'] = $this->template->get();

        if (DEMO) {
            $this->session->set('authenticated', true);
        }

        if (PRIVATE_PAGE_PASSWORD == $post['password']) {
            $this->session->set('authenticated', true);
            return $this->response->redirect('/');
        }

        $parameters['error'] = 'Incorrect password';
        return $this->response->render('_private', $parameters);
    }
}
