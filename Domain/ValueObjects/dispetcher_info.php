<?php

    class dispetcher_info
    {
        /**
         * dispetcher_info constructor.
         * @param $name
         * @param $surname
         * @param $middle_name
         */
        public function __construct($name, $surname, $middle_name)
        {
            $this->name = $name;
            $this->surname = $surname;
            $this->middle_name = $middle_name;
        }

        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param mixed $name
         */
        public function setName($name): void
        {
            $this->name = $name;
        }

        /**
         * @return mixed
         */
        public function getSurname()
        {
            return $this->surname;
        }

        /**
         * @param mixed $surname
         */
        public function setSurname($surname): void
        {
            $this->surname = $surname;
        }

        /**
         * @return mixed
         */
        public function getMiddleName()
        {
            return $this->midle_name;
        }

        /**
         * @param mixed $middlde_name
         */
        public function setMiddleName($middle_name): void
        {
            $this->midle_name = $middle_name;
        }
        private $name;
        private $surname;
        private $middle_name;


    }