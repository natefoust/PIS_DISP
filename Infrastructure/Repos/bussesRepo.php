<?php
require_once("C:/xampp\htdocs\disp_system\hydrator.php");
require_once ("C:/xampp\htdocs\disp_system\Domain\IRepos\IBussesRepo.php");
require_once ("C:/xampp\htdocs\disp_system\Domain\Entities\bus.php");

    class bussesRepo implements IBussesRepo
    {
        private $connection;
        private $hydrator;

        /**
         * bussesRepo constructor.
         * @param $connection
         */
        public function __construct($connection)
        {
            $this->connection = $connection;
            $this->hydrator = new Hydrator();
        }

        public function nextIdentity(): int
        {
            $query = "SELECT MAX(id) FROM trolleybuses";
            $result = mysqli_query($this->connection, $query);
            $result = mysqli_fetch_assoc($result);

            $id = $result['MAX(id)'];
            settype($id, 'integer');
            $id++;
            return $id;
        }

        public function getAllBusses(): array
        {
            $query = "SELECT * FROM trolleybuses";
            $result = mysqli_query($this->connection, $query);

            $array = [];
            while($row = mysqli_fetch_assoc($result))
            {
                $id = $row['id'];
                $id = new busId($id);
                $num = $row['tail_number'];
                $route = $row['route_id'];

                $bus = $this->hydrator->hydrate(Bus::class, [
                   'id' => $id,
                   'route_number' => $num,
                   'trail_number' => $route,
                ]);

                $array[] = $bus;
            }

            return $array;
        }

        public function getBusesByRoute($route): array
        {
            $query = "SELECT * FROM trolleybuses WHERE route_id = '$route'";

            $result = mysqli_query($this->connection, $query);

            $array = [];
            while($row = mysqli_fetch_assoc($result))
            {
                $id = $row['id'];
                $id = new busId($id);
                $num = $row['tail_number'];
                $route = $row['route_id'];

                $bus = $this->hydrator->hydrate(Bus::class, [
                    'id' => $id,
                    'route_number' => $num,
                    'trail_number' => $route,
                ]);

                $array[] = $bus;
            }

            return $array;
        }

        public function createBus(bus $bus)
        {
            $id = $this->nextIdentity();
            $trail_num = $bus->getTrailNumber();
            $route = $bus->getRouteNumber();
            $query = "INSERT INTO trolleybuses(id, tail_number, route_id) VALUES('$id', '$trail_num', '$route')";
            mysqli_query($this->connection, $query);
        }

        public function updateBusRouteNumber($value, bus $bus)
        {
            $id = $bus->getId();
            $query = "UPDATE trolleybuses SET route_id = '$value' WHERE id='$id'";
            mysqli_query($this->connection, $query);
        }

        public function deleteBus(bus $bus)
        {
            $trail_number = $bus->getTrailNumber();
            $query = "DELETE FROM trolleybuses WHERE tail_number = '$trail_number'";
            mysqli_query($this->connection, $query);
        }
    }