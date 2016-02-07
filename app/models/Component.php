<?php

namespace Model;

use Service\Webhook as Webhook;
use Source\Database as Database;

class Component
{

    private $database;
    private $webhook;
    private $table   = 'component';
    private $columns = [
        'name',
        'description',
        'status',
        'sort',
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
        usort($data, function ($component1, $component2) {
            return $component1['sort'] - $component2['sort'];
        });
        return $data;
    }

    public function create(array $data = [])
    {
        $data['sort'] = $data['sort'] ?? 1;
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
