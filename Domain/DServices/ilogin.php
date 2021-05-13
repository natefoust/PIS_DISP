<?php

interface ILogin
{
    public function authorization($login, $password): dispetcher;
}