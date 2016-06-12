<?php

namespace Controllers\Home;

use \Helpers\Artist\Fetch;
// use \Models\Artist\Search;

class Home {

  function __construct ($app) {
    $this->app = $app;
  }

  public function readTopArtist() {
    $data = array(
      "TopArtist"   => $data = Fetch::getTopArtist($this->app)->topartists->artist
    );

    return $data;
  }

  public function vueRender($template, $data = null) {
    return $this->app['twig']->render($template .'.twig', $data);
  }

}
