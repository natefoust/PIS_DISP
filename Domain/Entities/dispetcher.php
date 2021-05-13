<?php

require_once('id.php');
class dispetcherId extends Id
{
    private Int $id;
    /**
     * dispetcherId constructor.
     */
    public function __construct(Int $id)
    {
        $this->id = $id;
    }
}

class dispetcher
{
    /**
     * dispetcher constructor.
     * @param dispetcherId $id
     * @param dispetcher_info $personal_info
     * @param $position
     */
    public function __construct(dispetcherId $id, dispetcher_info $personal_info, $position)
    {
        $this->id = $id;
        $this->personal_info = $personal_info;
        $this->position = $position;
    }

    /**
     * @return mixed
     */
    public function getPersonalInfo()
    {
        return $this->personal_info;
    }

    /**
     * @param mixed $personal_info
     */
    public function setPersonalInfo(dispetcher_info $personal_info): void
    {
        $this->personal_info = $personal_info;
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
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param mixed $position
     */
    public function setPosition($position): void
    {
        $this->position = $position;
    }

    private dispetcherId $id;
    private dispetcher_info $personal_info;
    private $position;
}

 ?>
