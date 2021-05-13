<?php
class CreatedLine implements DomainEventInterface
{
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
    public function getRoute()
    {
        return $this->route;
    }


    private DateTimeImmutable $occurredOn;
    private $id;
    private $route;

    public function __construct($id, $route)
    {
        $this->id=$id;
        $this->route=$route;
        $this->occurredOn = new DateTimeImmutable();
    }


    /**
     * @return DateTimeImmutable
     */
    public function getOccurredOn() : DateTimeInterface
    {
        return $this->occurredOn;
    }
}