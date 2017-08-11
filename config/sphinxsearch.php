<?php
return array(
    'host'    => '127.0.0.1',
    'port'    => 9312,
    'timeout' => 30,
    'indexes' => array(
        'my_index_name' => array ( 'table' => 'movies', 'column' => 'movie_id' ),
    ),
    'mysql_server' => array(
        'host' => '127.0.0.1',
        'port' => 9306
    )
);
