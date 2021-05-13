<?php

class lineId extends Id
{
    private $id;

    /**
     * lineId constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }
}
    class lines
    {

        public function __construct()
        {

        }

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @return mixed
         */
        public function getRoutes()
        {
            return $this->routes;
        }

        /**
         * @param mixed $routes
         */
        public function setRoutes(route $routes): void
        {
            $this->routes[] = $routes;
        }

        public function addRoute(route $route)
        {
            $id = count($this->routes);
            $this->routes[$id] = $route;
        }

        public function removeRoute(route $route)
        {
            $id = $route->getId();
            unset($route[$id]);
        }
        private lineId $id;
        private $routes = [];
    }
?>