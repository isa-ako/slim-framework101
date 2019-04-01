<?php

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
        "db" => [
	        "host" => "192.168.10.253",
	        "dbname" => "a111710671",
	        "user" => "a111710671",
	        "pass" => "a"
	    ],
    ],
];

$c = new \Slim\Container($configuration);