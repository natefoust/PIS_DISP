<?php
    class CreatedRoute implements DomainEventInterface
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
        public function getRouteInfo()
        {
            return $this->route_info;
        }

        /**
         * @return mixed
         */
        public function getBus()
        {
            return $this->bus;
        }

        private DateTimeImmutable $occurredOn;
        private $id;
        private $route_info;
        private $bus;

        public function __construct($id, $route_info, $bus)
        {
            $this->id=$id;
            $this->route_info=$route_info;
            $this->bus=$bus;
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