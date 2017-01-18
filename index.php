<?php

require 'Connection.php';
require 'Query.php';
require 'Page.php';
require 'Item.php';

$query = new Query(
    Connection::make()
);

$notebooks = $query->selectAll('notebook');

print_r($notebooks);