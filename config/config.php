<?php

$config = array();

// API
$config['lastfm']['api_key'] = 'de101a2ec2e13e62e13be39681eb38b5';
$config['lastfm']['secret'] = '07dea814af860a46765d7e25e01e5efd';


// DB
$config['db_host'] = 'localhost';
$config['db_name'] = 'silex';
$config['db_user'] = 'root';
$config['db_pass'] = 'root';


$app['config'] = $config;
