<?php
require_once("../../Infrastructure/Repos/dispRepo.php");
require_once("../../Domain/Entities/dispetcher.php");
require_once("../../Domain/DServices/ilogin.php");
class login implements ILogin
{
    private dispRepo $dispetcherRepo;

    /**
     * login constructor.
     * @param dispRepo $dispetcherRepo
     */
    public function __construct(dispRepo $dispetcherRepo)
    {
        $this->dispetcherRepo = $dispetcherRepo;
    }

    public function authorization($login, $password): dispetcher
    {
        return $this->dispetcherRepo->getDispByLoginData($login, $password);
    }
}


