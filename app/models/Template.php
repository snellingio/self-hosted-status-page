<?php

namespace Model;

use Source\Database as Database;

class Template
{

    private $database;
    private $table   = 'template';
    private $columns = [
        'headline',
        'about',
        'footline',
        'days_to_show',
        'body_background_color',
        'font_color',
        'light_font_color',
        'greens',
        'yellows',
        'oranges',
        'reds',
        'link_color',
        'border_color',
        'graph_color',
        'custom_header',
        'custom_header_html',
        'custom_footer',
        'custom_footer_html',
        'custom_js',
        'custom_css',
    ];
    private $defaults = [
        'headline'              => 'Your Status Page',
        'about'                 => 'The super simple self hosted status page.',
        'footline'              => 'Copyright Your Company',
        'days_to_show'          => 30,
        'body_background_color' => '#FFFFFF',
        'font_color'            => '#555555',
        'light_font_color'      => '#AAAAAA',
        'greens'                => '#55B68B',
        'yellows'               => '#EAA823',
        'oranges'               => '#E67E22',
        'reds'                  => '#CE0F0D',
        'link_color'            => '#3AA3E3',
        'border_color'          => '#E0E0E0',
        'graph_color'           => '#3498DB',
        'custom_header'         => false,
        'custom_header_html'    => '',
        'custom_footer'         => false,
        'custom_footer_html'    => '',
        'custom_js'             => '',
        'custom_css'            => '',
    ];

    public function __construct()
    {
        $this->database = new Database($this->table);
    }

    public function create(array $data = [])
    {
        $data = array_intersect_key($data, array_flip($this->columns));
        $this->database->set($this->table, $data);
        return $this->get($this->table);
    }

    public function get()
    {
        $data = $this->database->get($this->table);
        if (!$data) {
            return $this->defaults;
        }
        $result = array_merge($this->defaults, $data);
        return $result;
    }
}
