<?php

    interface IBussesRepo
    {
        public function nextIdentity(): int;
        public function getAllBusses(): array;
        public function getBusesByRoute($route): array;
        public function createBus(bus $bus);
        public function updateBusRouteNumber($value, bus $bus);
        public function deleteBus(bus $bus);
    }