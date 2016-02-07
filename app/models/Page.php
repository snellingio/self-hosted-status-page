<?php

namespace Model;

use Service\Webhook as Webhook;
use Source\Database as Database;

class Page
{

    private $database;
    private $webhook;
    private $table   = 'page';
    private $columns = [
        'name',
        'incidents',
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
        return $data;
    }

    public function create(array $data = [])
    {
        $key  = $data['key'] ?? substr(md5(uniqid()), 0, 12);
        $data = array_intersect_key($data, array_flip($this->columns));
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
