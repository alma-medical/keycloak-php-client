<?php

namespace AlmaMedical\KeycloakClient\Model;

class MultivaluedHashMap
{
    /**
     * @var bool
     */
    private $empty;
    /**
     * @var float
     */
    private $loadFactor;
    /**
     * @var int
     */
    private $threshold;

    /**
     * Get empty.
     */
    public function getEmpty(): ?bool
    {
        return $this->empty;
    }

    /**
     * Set empty.
     */
    public function setEmpty(bool $empty): self
    {
        $this->empty = $empty;

        return $this;
    }

    /**
     * Get loadFactor.
     */
    public function getLoadFactor(): ?float
    {
        return $this->loadFactor;
    }

    /**
     * Set loadFactor.
     */
    public function setLoadFactor(float $loadFactor): self
    {
        $this->loadFactor = $loadFactor;

        return $this;
    }

    /**
     * Get threshold.
     */
    public function getThreshold(): ?int
    {
        return $this->threshold;
    }

    /**
     * Set threshold.
     */
    public function setThreshold(int $threshold): self
    {
        $this->threshold = $threshold;

        return $this;
    }
}
