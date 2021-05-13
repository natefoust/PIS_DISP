<?php

require_once("C:/xampp\htdocs\disp_system\Domain\Entities\id.php");

  class busId extends Id
  {
    private Int $id;

    /**
     * busId constructor.
     * @param Int $id
     */
    public function __construct(int $id)
    {
      $this->id = $id;
    }
  }

  class bus
  {
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
    private busId $id;
    private $route_number;
    private $trail_number;

    /**
     * bus constructor.
     * @param busId $id
     * @param $trail_number
     */
    public function __construct(busId $id, $route_number, $trail_number)
    {
      $this->id = $id;
      $this->route_number = $route_number;
      $this->trail_number = $trail_number;
    }


    /**
     * @param mixed $trail_number
     */
    public function setTrailNumber($trail_number): void
    {
      $this->trail_number = $trail_number;
    }

    /**
     * @return mixed
     */
    public function getId() : int
    {
      return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTrailNumber()
    {
      return $this->trail_number;
    }


  }

 ?>
