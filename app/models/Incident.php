<?php

namespace Model;

use Service\Webhook as Webhook;
use Source\Database as Database;

class Incident
{

    private $database;
    private $webhook;
    private $table   = 'incident';
    private $columns = [
        'page',
        'description',
        'status',
        'date',
        'time',
    ];

    public function __construct()
    {
        $this->database = new Database($this->table);
        $this->webhook  = new Webhook();
    }

    public function all()
    {
        $data = [];
        $keys = $this->database->getKeys();
        foreach ($keys as $key) {
            $data[] = $this->get($key);
        }
        usort($data, function ($incdent1, $incident2) {
            return strtotime($incident2['time']) - strtotime($incdent1['time']);
        });
        return $data;
    }

    public function create(array $data = [])
    {
        $data['date'] = $data['date'] ?? date('Y-m-d');
        $data['time'] = $data['time'] ?? date('F j Y, H:i T');
        $key          = $data['key'] ?? substr(md5(uniqid()), 0, 12);
        $data         = array_intersect_key($data, array_flip($this->columns));
        $this->database->set($key, $data);
        $item           = $this->get($key);
        $hook           = $item;
        $hook['action'] = $this->table;
        $this->webhook->send($hook);
        return $item;
    }

    public function delete($key)
    {
        return $this->database->delete($key);
    }

    public function get($key)
    {
        $data        = $this->database->get($key);
        $data['key'] = $key;
        return $data;
    }
}
