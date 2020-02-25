<?php
require('../vendor/autoload.php');
$f3 = Base::instance();

/* CONFIG */
$f3->config('../app/config/config.ini');
$f3->config('../app/config/database.ini');
$f3->config('../app/config/languages.ini');


$f3->set('DEBUG', 3);
$f3->set('CACHE', true);
$f3->set('UPLOADS', 'upload/');

$session = new Session();
$f3->set('CSRF', $session->csrf());

$f3->config('../app/routes.ini');

$f3->run();