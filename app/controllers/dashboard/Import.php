<?php

namespace Controller\Dashboard;

class Import extends \Controller\AbstractDashboardController
{

    public function get()
    {
        $parameters['path']     = $this->router->path();
        $parameters['template'] = $this->template->get();
        return $this->response->render('_dashboard', $parameters);
    }

    public function post()
    {
        $post                   = $this->request->post();
        $parameters['path']     = $this->router->path();
        $parameters['template'] = $this->template->get();

        if (DEMO) {
            return $this->response->redirect('/dashboard/import');
        }

        $parameters['flash']['success'] = false;

        if (!isset($post['import']['url']) || !strpos($post['import']['url'], 'history.rss')) {
            $parameters['flash']['message'] = 'Invalid URL - looking for /history.rss';
            return $this->response->render('_dashboard', $parameters);
        }

        if (!@file_get_contents($post['import']['url'])) {
            $parameters['flash']['message'] = 'Invalid URL - could not load ' . $post['import']['url'];
            return $this->response->render('_dashboard', $parameters);
        }

        $parameters['flash']['success'] = $this->import->statuspageio($post['import']['url']);

        return $this->response->render('_dashboard', $parameters);
    }
}
