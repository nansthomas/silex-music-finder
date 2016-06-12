<?php

ini_set( 'error_reporting', E_ALL );
ini_set( 'display_errors', true );

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

require_once __DIR__.'/../config/config.php';
require_once __DIR__.'/../config/provider.php';

use Helpers\Artist\Fetch;
use Models\Artist\Search;
use Controllers\Artist\Artist;
use Controllers\Home\Home;

$app['debug'] = true;

$artist           = new Search($app);
$artistController = new Artist($app, $artist);
$topTrack         = new Home($app);

$app->get('/',function() use ($app, $topTrack) {
    $data = $topTrack->readTopArtist();
    return $app['twig']->render('home.twig',$data);
})
->bind('home');

$app->match('/search', function() use ($app) {
    $q = $_POST['artist'];
    $name = str_replace(' ', '+', $q);
    return $app->redirect($app['url_generator']->generate('home').$name);
});

$app->get('/{search}', function ($search) use ($app, $artistController) {
  $data = $artistController->readArtist($search);

  return $app['twig']->render('artiste.twig', $data);
});

$app->run();
