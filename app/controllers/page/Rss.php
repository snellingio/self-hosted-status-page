<?php

namespace Controller\Page;

class Rss extends \Controller\AbstractPageController
{

    public function get()
    {
        $template  = $this->template->get();
        $incidents = $this->incident->all();

        for ($x = 0; $x < count($incidents); $x++) {
            $incidents[$x]['name'] = $this->page->get($incidents[$x]['page'])['name'] ?? '';
            $incidents[$x]['time'] = date('c', strtotime($incidents[$x]['time']));
            ksort($incidents[$x]);
        }

        $xml = new \SimpleXMLElement('<rss/>');
        $xml->addAttribute('version', '2.0');
        $channel              = $xml->addChild('channel');
        $channel->title       = $template['headline'] . ' status updates';
        $channel->link        = BASE_URL . '/rss';
        $channel->description = $template['about'];
        $channel->pubDate     = date("c", time());

        if (count($incidents) > 0) {
            foreach ($incidents as $incident) {
                $item              = $channel->addChild('item');
                $item->title       = $incident['name'] . ' - ' . ucfirst($incident['status']);
                $item->description = $incident['description'];
                $item->pubDate     = $incident['time'];
                $item->link        = BASE_URL . '/incidents/' . $incident['page'];
                $item->guid        = BASE_URL . '/incidents/' . $incident['page'];
            }
        }

        $xml = $xml->asXML();
        return $this->response->xml($xml);
    }
}
