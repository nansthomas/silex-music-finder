<?php

namespace Models\Artist;

class Search {

  function __construct ($app) {
    $this->app = $app;
  }

  public function getArtist ($search) {

    $sql = "SELECT * FROM search WHERE query = ?";
    $query = $this->app['db']->fetchAssoc($sql, array($search));

    return $query;
  }

  public function makeItCount ($search) {

    $query = $this->getArtist($search);

    if (!$query) {
      $q = $this->app['db']->insert('search', array(
        'query' => $search,
        'count'=> 1
      ));

      $query = $this->getArtist($search);
    } else {

      $q = $this->app['db']->update('search', array(
        'count' => $query['count'] + 1,
      ), array(
        'id' => $query['id'],
      ));

      $query = $this->getArtist($search);
    }

    return $query;

  }

}
