<?php
declare (strict_types = 1);

namespace Source;

class Database
{

    private $redis;
    private $table;

    public function __construct(string $table = '')
    {
        $this->redis = (new Singleton)->cache();
        $this->table = $table;
    }

    public function delete(string $key)
    {
        return $this->redis->hdel($this->table, $key);
    }

    public function flush()
    {
        return $this->redis->del($this->table);
    }

    public function get(string $key)
    {
        $data = $this->redis->hget($this->table, $key) ?? false;
        if ($data) {
            return json_decode($data, true);
        }
        return $data;
    }

    public function getKeys()
    {
        return $this->redis->hkeys($this->table);
    }

    public function set(string $key, $data)
    {
        return $this->redis->hset($this->table, $key, json_encode($data));
    }
}
