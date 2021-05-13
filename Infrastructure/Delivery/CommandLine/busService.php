<?php

require_once("../../../Infrastructure/Repos/bussesRepo.php");
require_once("../../../Domain/Entities/bus.php");

$connection = mysqli_connect('localhost', 'root', '', 'park');
$busRepository = new bussesRepo($connection);
$bus = new bus(new busId($busRepository->nextIdentity()), 1, 1131);

$busRepository->createBus($bus);


//header("Location: ../../View/dispPanel.php");