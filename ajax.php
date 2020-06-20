<?php

//require 'vendor/autoload.php';
//
//$command = new \App\Command\Nslookup();
//echo "<ul>";
//foreach ($command->run($_POST['search']) as $ip){
//    echo "<li>$ip</li>";
//}
//echo "<ul>";

require 'vendor/autoload.php';

//$command = new \App\Command\Nslookup();
//$output = $command->run($_POST['search']);
//$whois = new \App\Command\Whois();
//$output = array_merge($output, $whois->run($_POST['search']));
//$geoiplookup = new \App\Command\GeoIp();
//$output = array_merge($output, $geoiplookup->run($_POST['search']));
//require "templates/main.phtml";
$command = new \App\Command\CompositeCommand(
    new \App\Command\Nslookup(),
    new \App\Command\GeoIp(),
    new \App\Command\Whois()
);

echo new App\View\Template($command->run($_POST['search']), $_POST['type']);
