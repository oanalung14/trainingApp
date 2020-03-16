<?php
// Mandatory vendor require.
require_once('vendor/autoload.php');

// Entites go here.
require_once('entities/comment.php');
require_once('entities/technology.php');
require_once('entities/training.php');
require_once('entities/trainer_technology.php');
require_once('entities/user.php');
require_once('entities/user_detail.php');
require_once('entities/user_training.php');

// Namespaces.
use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;

// Init DB connection.
$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'training',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Set the event dispatcher used by Eloquent models...
$capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods...
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

session_start();
