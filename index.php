<?php

use App\Crawlers\Github;
use Github\Client;

require 'vendor/autoload.php';

$client = new Github(new Client());
$repositories = $client->listRepositories('symfony');

echo '<h3>Symfony Repositories from</h3>';
foreach($repositories as $repository) {
    echo "<b>{$repository['name']}</b><br>";
    echo $repository['description'] . '<br><br>';
}



