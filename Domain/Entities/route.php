<?php

require_once("../../Domain/Entities/bus.php");

class routeId extends Id
{
    private $id;

    /**
     * routeId constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

}

    class route
    {
        private routeId $id;
        private route_info $route_info;
        private $bus = [];
        private $counter;

        /**
         * @return int
         */
        public function getCounter(): int
        {
            return $this->counter;
        }

        public function __construct()
        {
            $this->counter = 0;
        }


        /**
         * @return mixed
         */
        public function getRouteInfo()
        {
            return $this->route_info;
        }

        /**
         * @param mixed $route_info
         */
        public function setRouteInfo(route_info $route_info): void
        {
            $this->route_info = $route_info;
        }

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id): void
        {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getBus($id)
        {
            return $this->bus[$id];
        }

        /**
         * @param mixed $bus
         */
        public function setBus(bus $bus): void
        {
            $this->bus[] = $bus;
        }

        public function addBus(bus $bus)
        {
            $id = count($this->bus);
            $this->bus[$id] = $bus;
            $this->counter++;
        }

        public function removeBus(bus $bus)
        {
            $id = $bus->getId();
            unset($bus[$id]);
        }


    }

