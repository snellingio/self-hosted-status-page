<?php

namespace Controller\Dashboard;

class Settings extends \Controller\AbstractDashboardController
{

    public function get()
    {
        $parameters['path']     = $this->router->path();
        $parameters['template'] = $this->template->get();
        $parameters['settings'] = $this->settings->get();
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

        $post['settings']['public_page']     = ($post['settings']['public_page'] === 'true');
        $post['settings']['require_api_key'] = ($post['settings']['require_api_key'] === 'true');

        if (!$post['settings']['public_page']) {
            $post['settings']['require_api_key'] = true;
        }

        $post['settings']['webhook_urls']              = explode("\n", $post['settings']['webhook_urls']);
        $post['settings']['uptimerobot_response_time'] = ($post['settings']['uptimerobot_response_time'] === 'true');
        $post['settings']['uptimerobot_up_time']       = ($post['settings']['uptimerobot_up_time'] === 'true');
        $post['settings']['uptimerobot']               = ($post['settings']['uptimerobot_response_time'] || $post['settings']['uptimerobot_up_time']);
        $post['settings']['webhook']                   = ($post['settings']['webhook'] === 'true');
        $post['settings']['slack_webhook']             = ($post['settings']['slack_webhook'] === 'true');
        $post['settings']['support_status_cat']        = ($post['settings']['support_status_cat'] === 'true');
        $parameters['flash']['success']                = $this->settings->create($post['settings']);
        $parameters['settings']                        = $this->settings->get();
        return $this->response->render('_dashboard', $parameters);
    }
}
