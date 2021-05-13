<?php

require_once("../../Domain/ValueObjects/route_info.php");
require_once("../../Domain/Entities/route.php");

interface IRoutesRepo
{
    public function nextIdentity(): int;
    public function getAllRoutes(): array;
    public function getMaxRouteNum(): int;
    public function getRouteInfo($route): route_info;
    public function createRoute(route $route);
    public function updateRouteNumber($value, route $route);
    public function updateRouteTo($value, route $route);
    public function updateRouteFrom($value, route $route);
    public function deleteRoute(route $route);
}