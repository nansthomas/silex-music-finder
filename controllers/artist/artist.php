<?php

namespace Controllers\Artist;

use \Helpers\Artist\Fetch;
use \Models\Artist\Search;

class Artist {

  function __construct ($app, $artist) {
    $this->app = $app;
    $this->artist = $artist;
  }

  public function readArtist($search) {
    $data = array(
      "artiste"     => Fetch::getArtiste($search, $this->app)->artist,
      "count"       => $this->artist->makeItCount($search),
      "tracks"      => Fetch::getTopTrack($search, $this->app)->toptracks->track,
      "albums"      => Fetch::getTopAlbum($search, $this->app)->topalbums->album
    );

    return $data;
  }

  public function vueRender($template, $data = null) {
    return $this->app['twig']->render($template .'.twig', $data);
  }

}
