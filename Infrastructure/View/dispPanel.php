<?php session_start();

include("../../Domain/Entities/dispetcher.php");
require_once("../../Application/Services/dispLogic.php");
require_once("../../Domain/Entities/bus.php");
require_once("../../Infrastructure/Repos/bussesRepo.php");
require_once("../../Infrastructure/Repos/routesRepo.php");
require_once("../../Domain/Entities/route.php");
require_once("../../Infrastructure/Repos/linesRepo.php");
require_once("../../Domain/Entities/line.php");

$connection = mysqli_connect('localhost', 'root', '', 'park');

$busRepository = new bussesRepo($connection);
$routeRepository = new routesRepo($connection);
$linesRepository = new linesRepo($connection);
$service = new dispLogic($busRepository, $routeRepository, $linesRepository);
$disp = $service->showAllBusses();
$bus = $service->showAllRoutes();
$lines = $service->showAllLines();

?>

<html>
<head>

</head>
<body>

</body>
</head>
</html>


