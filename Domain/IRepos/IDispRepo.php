<?php

include("../../Domain/Entities/dispetcher.php");
include("../../Domain/ValueObjects/dispetcher_info.php");

interface IDispetcherRepo
{
    public function nextIdentity(): int;
    public function getDispByLoginData($login, $password): dispetcher;
    public function createDisp($name, $surname, $middle_name, $login, $password, $position);
    public function updateDispPassword($value, dispetcher $disp);
    public function updateDispPosition($value, dispetcher $disp);
    public function deleteDisp(dispetcher $disp);
}