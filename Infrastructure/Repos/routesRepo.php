<?php

require_once("../../Domain/IRepos/IRoutesRepo.php");
require_once("../../Domain/Entities/route.php");
require_once("../../Domain/ValueObjects/route_info.php");
require_once("C:/xampp\htdocs\disp_system\hydrator.php");
require_once("bussesRepo.php");

class routesRepo implements IRoutesRepo
{
    private $connection;
    private $hydrator;
    private $bussesRepo;

    /**
     * routesRepo constructor.
     * @param $connection
     */
    public function __construct($connection)
    {
        $this->connection = $connection;
        $this->hydrator = new Hydrator();
        $this->bussesRepo = new bussesRepo($this->connection);
    }

    public function nextIdentity(): int
    {
        $query = "SELECT MAX(id) FROM t_lines";
        $result = mysqli_query($this->connection, $query);
        $result = mysqli_fetch_assoc($result);
        $id = $result['MAX(id)'];
        settype($id, 'integer');
        $id++;
        return $id;
    }

    public function getAllRoutes(): array
    {
        $maxRouteNum = $this->getMaxRouteNum();

        $route = [];
        for($i = 1; $i <= $maxRouteNum; $i++) {

            $id = $this->hydrator->hydrate(routeId::class, [
                'id' => $i,
            ]);

            $bus = $this->bussesRepo->getBusesByRoute($i);

            $entity = $this->hydrator->hydrate(route::class, [
                'id' => $id,
                'route_info' => $this->getRouteInfo($i),
            ]);

            foreach ($bus as $item)
            {
                $entity->addBus($item);
            }

            $route[] = $entity;
        }

        return $route;
    }

    public function createRoute(route $route)
    {
        $id = $this->nextIdentity();
        $rout = $route->getRouteInfo()->getRouteNumber();
        $to = $route->getRouteInfo()->getRouteTo();
        $from = $route->getRouteInfo()->getRouteTo();
        $query = "INSERT INTO routes(id, route rto, rfrom) VALUES('$id', '$rout', '$to', '$from')";
        mysqli_query($this->connection, $query);
    }

    public function updateRouteNumber($value, route $route)
    {
        $id = $route->getId();
        $query = "UPDATE routes SET route = '$value' WHERE id = '$id'";
        mysqli_query($this->connection, $query);
    }

    public function updateRouteTo($value, route $route)
    {
        $id = $route->getId();
        $query = "UPDATE routes SET rto = '$value' WHERE id = '$id' ";
        mysqli_query($this->connection, $query);
    }

    public function updateRouteFrom($value, route $route)
    {
        $id = $route->getId();
        $query = "UPDATE routes SET rfrom = '$value' WHERE id = '$id' ";
        mysqli_query($this->connection, $query);
    }

    public function deleteRoute(route $route)
    {
        $id = $route->getId();
        $query = "DELETE FROM routes WHERE id = '$id'";
        mysqli_query($this->connection, $query);
    }

    public function getMaxRouteNum(): int
    {
        $query = "SELECT MAX(route_id) as max FROM trolleybuses";
        $result = mysqli_query($this->connection, $query);
        $result = mysqli_fetch_all($result);
        $max = $result[0][0];
        $max = intval($max);
        return $max;
    }

    public function getRouteInfo($route): route_info
    {
        $query = "SELECT * FROM routes WHERE route='$route'";
        $result = mysqli_query($this->connection, $query);

        $result = mysqli_fetch_assoc($result);
        $info = $this->hydrator->hydrate(route_info::class, [
            'route_number' => $result['route'],
            'route_from' => $result['rfrom'],
            'route_to' => $result['rto'],
        ]);
        return $info;

    }
}