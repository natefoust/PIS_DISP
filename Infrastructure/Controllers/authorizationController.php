<?php session_start();


require_once("../../Application/Services/login.php");
require_once("../../Domain/Entities/dispetcher.php");
require_once("../../Infrastructure/Repos/dispRepo.php");

    $connection = mysqli_connect('localhost', 'root', '', 'park');
    $login = $_POST['auth_login'];
    $password = $_POST['auth_password'];

    $dispRepository = new dispRepo($connection);
    $service = new login($dispRepository);
    $disp = $service->authorization($login, $password);

    $_SESSION['dispetcher'] = $disp;
    $_POST['disp'] = $disp;
    header("Location: ../View/dispPanel.php");
