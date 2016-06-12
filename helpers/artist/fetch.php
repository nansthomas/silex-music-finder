<?php

namespace Helpers\Artist;

class Fetch {

  static function getArtiste ($name, $app) {

    // GET ALL INFORMATIONS FOR $name ARTIST

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://ws.audioscrobbler.com/2.0/?method=artist.getinfo&artist='. $name .'&api_key='. $app['config']['lastfm']['api_key'] .'&format=json');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json')); // Assuming you're requesting JSON
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec($ch);

    // JSON
    $data = json_decode($response);
    return $data;

  }

  static function getTopTrack ($name, $app) {

    // GET TOP TRACK FOR $name ARTIST

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://ws.audioscrobbler.com/2.0/?method=artist.gettoptracks&artist='. $name .'&api_key='. $app['config']['lastfm']['api_key'] .'&format=json');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json')); // Assuming you're requesting JSON
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec($ch);

    // JSON
    $data = json_decode($response);
    return $data;

  }

  static function getTopArtist ($app) {

    // GET TOP ARTIST FROM FRANCE

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://ws.audioscrobbler.com/2.0/?method=geo.getTopArtists&country=france&api_key='. $app['config']['lastfm']['api_key'] .'&format=json');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json')); // Assuming you're requesting JSON
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec($ch);

    // JSON
    $data = json_decode($response);
    return $data;

  }

  static function getTopAlbum ($name, $app) {

    // GET TOP ARTIST FROM FRANCE

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://ws.audioscrobbler.com/2.0/?method=artist.getTopAlbums&artist='. $name .'&api_key='. $app['config']['lastfm']['api_key'] .'&format=json');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json')); // Assuming you're requesting JSON
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec($ch);

    $data = json_decode($response);
    return $data;

  }

}
