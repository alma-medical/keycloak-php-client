<?php

namespace AlmaMedical\KeycloakClient\Model;

class Map
{
    private $map = [];

    /**
     * Get a map value.
     *
     * @return mixed
     */
    public function get(string $key)
    {
        return $this->map[$key];
    }

    /**
     * Set a map value.
     *
     * @param mixed $value
     */
    public function set(string $key, $value): void
    {
        $this->map[$key] = $value;
    }

    public function setMap(array $map): void
    {
        $this->map = $map;
    }
}
