<?php

//include 'includes/user_token.php';
require __DIR__.'includes/../vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory)
    ->withServiceAccount('/opt/lampp/htdocs/admintiket/includes/tiketku-fa9a6-cc0354f4de8a.json')
    // The following line is optional if the project id in your credentials file
    // is identical to the subdomain of your Firebase project. If you need it,
    // make sure to replace the URL with the URL of your project.
    ->withDatabaseUri('https://tiketku-fa9a6.firebaseio.com/');

$database = $factory->createDatabase();