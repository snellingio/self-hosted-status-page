<?php

//
// Below is what you need to get started.
// Most other configuration options are available via the dashboard.
// If you need to look at all options to pass in, look in /app/configuration/Definitions.php
//
// All the best,
// Sam
//

// You should generate secure usernames / passwords.
// Feel free to add as many users as you want in this array.
$authentication = [
    'ADMIN_AUTHENTICATION' => [
        'username'  => 'password',
        'username2' => 'password',
        'username3' => 'password',
    ],
];

// You should generate a secure api key.
// If you leave this blank, you will not be able to POST to the api.
$api = [
    'API_KEY' => '',
];

// Put in your Redis credentials.
// Redis PASSWORD is usually blank by default if setup on a vps.
// Leave PREFIX blank unless you know you need it. (Used if multiple apps share a redis instance)
$database = [
    'REDIS_HOST'     => '127.0.0.1',
    'REDIS_PORT'     => '6379',
    'REDIS_PASSWORD' => '',
    'REDIS_PREFIX'   => '',
];

// Do not remove this line. :D
$exports = $authentication + $api + $database;
