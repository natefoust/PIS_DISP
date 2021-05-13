<?php

require_once("../../Domain/Entities/bus.php");
require_once("../../Infrastructure/Repos/bussesRepo.php");
require_once("../../hydrator.php");

$connection = mysqli_connect('localhost', 'root', '', 'park');
$br = new bussesRepo($connection);
$hydrator = new Hydrator();
$bus = $hydrator->hydrate(bus::class, [
    'id' => new busId(1),
    'route_number' => 1111,
    'trail_number' => 1,
]);

file_put_contents('bus.txt', serialize($bus));
$bus_from_file = file_get_contents('bus.txt');
$bus_from_file = unserialize($bus_from_file);
echo $bus_from_file->getRouteNumber().' '.$bus_from_file->getTrailNumber();