<?php

namespace Service;

use Model\Page as Page;
use Model\Incident as Incident;

class Import
{

    private $incident;
    private $page;

    public function __construct()
    {
        $this->incident = new Incident();
        $this->page     = new Page();
    }

    public function statuspageio($feed)
    {
        $context   = stream_context_create(['ssl' => ['verify_peer' => false, 'verify_peer_name' => false]]);
        $feed      = file_get_contents($feed, false, $context);
        $xml       = simplexml_load_string($feed);
        $json      = json_encode($xml);
        $array     = json_decode($json, true);
        $items     = $array['channel']['item'];
        $incidents = [];
        $pages     = [];
        foreach ($items as $item) {
            $key = explode('/', $item['link']);
            $key = end($key);
            if (!empty($key)) {
                $statuses = $item['description'];
                preg_match_all('(' . preg_quote('<p>') . '(.*?)' . preg_quote('</p>') . ')is', $statuses, $descriptions);
                $descriptions = $descriptions[1];
                foreach ($descriptions as $description) {
                    $text = explode('</strong> - ', $description);
                    $text = end($text);
                    preg_match(
                        '(' . preg_quote('<small>') . '(.*?)' . preg_quote('</small>') . ')is',
                        $description,
                        $time
                    );
                    preg_match_all(
                        '(' . preg_quote('<strong>') . '(.*?)' . preg_quote('</strong>') . ')is',
                        $description,
                        $status
                    );
                    $status = $status[1];
                    if (isset($status[0]) && isset($time[1]) && $status[0] !== 'Postmortem') {
                        $correct_time = (string) date('M d,', strtotime($time[1]))
                        . ' ' . date('Y', strtotime($item['pubDate']))
                        . ' ' . date(' H:i T', strtotime($time[1]));
                        if (strtotime($correct_time) > time()) {
                            $correct_time = (string) date('M d,', strtotime($time[1]))
                            . ' ' . (date('Y', strtotime($item['pubDate'])) - 1)
                            . ' ' . date(' H:i T', strtotime($time[1]));
                        }
                        $incident = [
                            'key'         => substr(md5($status[0] . $correct_time), 0, 12),
                            'page'        => $key,
                            'name'        => $item['title'],
                            'description' => strip_tags($text),
                            'status'      => strtolower($status[0]),
                            'date'        => date('Y-m-d', strtotime($correct_time)),
                            'time'        => date('F j Y, H:i T', strtotime($correct_time)),
                        ];
                        $incidents[] = $incident;
                    }
                }
            }
        }
        foreach ($incidents as $incident) {
            $pages[$incident['page']]['key']         = $incident['page'];
            $pages[$incident['page']]['name']        = $incident['name'];
            $pages[$incident['page']]['incidents'][] = $incident['key'];
        }
        foreach ($incidents as $incident) {
            $this->incident->create($incident);
        }
        foreach ($pages as $page) {
            $this->page->create($page);
        }

        return true;
    }
}
