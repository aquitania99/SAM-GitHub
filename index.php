<?php

/*
 * Frontend controller to
 * configure the application
 */
require 'config.php';
require 'helpers.php';

//Library
require 'library/Request.php';
require 'library/Inflector.php';
require 'library/Response.php';
require 'library/View.php';


//Call the right Controller

if (empty($_GET['url']))
{
    $url = "";
}
else
{
    $url = $_GET['url'];
}

$request = new Request($url);
$request->execute();