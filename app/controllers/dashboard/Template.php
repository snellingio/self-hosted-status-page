<?php

namespace Controller\Dashboard;

class Template extends \Controller\AbstractDashboardController
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
            return $this->response->redirect('/dashboard/settings');
        }

        $post['template']['days_to_show']  = intval($post['template']['days_to_show']);
        $post['template']['custom_header'] = ($post['template']['custom_header'] === 'true');
        $post['template']['custom_footer'] = ($post['template']['custom_footer'] === 'true');
        $post['template']['days_to_show']  = is_numeric($post['template']['days_to_show']) ? $post['template']['days_to_show'] : 30;
        $parameters['flash']['success']    = $this->template->create($post['template']);
        $parameters['template']            = $this->template->get();
        return $this->response->render('_dashboard', $parameters);
    }
}
