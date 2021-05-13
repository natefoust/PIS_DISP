<?php session_start();


require_once("../../Application/Services/dispLogic.php");
require_once("../../Domain/Entities/bus.php");
require_once("../../Infrastructure/Repos/bussesRepo.php");

$connection = mysqli_connect('localhost', 'root', '', 'park');

//$busRepository = new bussesRepo($connection);
//$service = new dispLogic($busRepository);
//$disp = $service->showAllBusses();

header("Location: ../View/dispPanel.php");
