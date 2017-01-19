<?php

require 'Connection.php';
require 'Query.php';
require 'Request.php';
require 'Page.php';
require 'Item.php';

$request = new Request('http://hotline.ua/computer/noutbuki-netbuki/872-883-9886-85763-85764-85765/?sort=0');

$query = new Query(
    Connection::make()
);

$notebooks = $query->addNotebookElements($request->getNotebooks());
