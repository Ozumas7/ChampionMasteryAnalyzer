<?php
use Kolter\Website\App;


require 'vendor/autoload.php';
require 'config/config.php';
$app = new App();
$app->router->routesFromYaml('config/routes.yaml');
$app->run();

?>

