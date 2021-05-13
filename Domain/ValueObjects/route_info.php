<?php

    class route_info
    {
        /**
         * route_info constructor.
         * @param $route_number
         * @param $route_from
         * @param $route_to
         */
        public function __construct($route_number, $route_from, $route_to)
        {
            $this->route_number = $route_number;
            $this->route_from = $route_from;
            $this->route_to = $route_to;
        }

        /**
         * @return mixed
         */
        public function getRouteNumber()
        {
            return $this->route_number;
        }

        /**
         * @param mixed $route_number
         */
        public function setRouteNumber($route_number): void
        {
            $this->route_number = $route_number;
        }

        /**
         * @return mixed
         */
        public function getRouteFrom()
        {
            return $this->route_from;
        }

        /**
         * @param mixed $route_from
         */
        public function setRouteFrom($route_from): void
        {
            $this->route_from = $route_from;
        }

        /**
         * @return mixed
         */
        public function getRouteTo()
        {
            return $this->route_to;
        }

        /**
         * @param mixed $route_to
         */
        public function setRouteTo($route_to): void
        {
            $this->route_to = $route_to;
        }
        private $route_number;
        private $route_from;
        private $route_to;
    }