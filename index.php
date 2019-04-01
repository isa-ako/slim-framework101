<?php
require './vendor/autoload.php';

use Slim\Views\PhpRenderer;

require 'config.php';

$app = new \Slim\App($c);

$container = $app->getContainer();
$container['tpl'] = new PhpRenderer("./templates");

$container['pdo'] = function ($c) {
    $settings = $c->get('settings')['db'];
    $pdo = new PDO("mysql:host=" . $settings['host'] . ";dbname=" . $settings['dbname'],
                   $settings['user'], $settings['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};

require 'router.php';

$app->run();