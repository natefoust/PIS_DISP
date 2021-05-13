<?php

abstract class Id
{
    /**
    *
    * @var int The identifier
    */
    private $id;

    public function __construct(int $anId)
    {
        $this->id = $anId;
    }

    public function equals($object): bool
    {
        /** @noinspection PhpNonStrictObjectEqualityInspection */
        /** @noinspection TypeUnsafeComparisonInspection */
        return $this == $object;
    }

    /**
    *
    *  @return mixed
    */
    public function getValue() { return $this->id; }

}