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
require_once('entities/notifications.php');

// Namespaces.
use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;

// Init DB connection.
$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'ivgz2rnl5rh7sphb.chr7pe7iynqr.eu-west-1.rds.amazonaws.com',
    'database'  => 'm7airr7e10agig1i',
    'username'  => 'xhm5e0lxc4q8lko9',
    'password'  => 'q8r9gm9h0mzacsyp',
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
