<?php
require_once("..\..\Domain\Entities\bus.php");
require_once("..\..\Infrastructure\Repos\bussesRepo.php");
$connection = mysqli_connect('localhost', 'root', '', 'park');
$busesRepo = new bussesRepo($connection);

$bus = new bus(new busId($busesRepo->nextIdentity()), 1131, 1);
switch($_SERVER['REQUEST_METHOD'])
{
    case 'GET':
    {
        $bus = $busesRepo->getAllBusses();

        foreach($bus as $item)
        {
            echo ($item->getRouteNumber().' '.$item->getTrailNumber()."\r\n");
        }
        break;
    }
    case 'POST':
    {
        $busesRepo->createBus($bus);
        break;
    }
}