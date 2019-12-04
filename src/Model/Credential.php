<?php

namespace AlmaMedical\KeycloakClient\Model;

class Credential
{
    /**
     * @var string
     */
    private $algorithm;
    /**
     * @var MultivaluedHashMap
     */
    private $config;

    /**
     * @var int
     */
    private $counter;

    /**
     * @var \DateTime
     */
    private $createdDate;

    /**
     * @var string
     */
    private $device;

    /**
     * @var int
     */
    private $digits;

    /**
     * @var int
     */
    private $hasIterations;

    /**
     * @var string
     */
    private $hashedSaltedValue;

    /**
     * @var int
     */
    private $period;

    /**
     * @var string
     */
    private $salt;

    /**
     * @var bool
     */
    private $temporary;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $value;

    /**
     * Get algorithm.
     */
    public function getAlgorithm(): ?string
    {
        return $this->algorithm;
    }

    /**
     * Set algorithm.
     */
    public function setAlgorithm(string $algorithm): self
    {
        $this->algorithm = $algorithm;

        return $this;
    }

    /**
     * Get config.
     */
    public function getConfig(): ?MultivaluedHashMap
    {
        return $this->config;
    }

    /**
     * Set config.
     */
    public function setConfig(MultivaluedHashMap $config): self
    {
        $this->config = $config;

        return $this;
    }

    /**
     * Get counter.
     */
    public function getCounter(): ?int
    {
        return $this->counter;
    }

    /**
     * Set counter.
     */
    public function setCounter(int $counter): self
    {
        $this->counter = $counter;

        return $this;
    }

    /**
     * Get createdDate.
     */
    public function getCreatedDate(): ?\DateTime
    {
        return $this->createdDate;
    }

    /**
     * Set createdDate.
     */
    public function setCreatedDate(\DateTime $createdDate): self
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    /**
     * Get device.
     */
    public function getDevice(): ?string
    {
        return $this->device;
    }

    /**
     * Set device.
     */
    public function setDevice(string $device): self
    {
        $this->device = $device;

        return $this;
    }

    /**
     * Get digits.
     */
    public function getDigits(): ?int
    {
        return $this->digits;
    }

    /**
     * Set digits.
     */
    public function setDigits(int $digits): self
    {
        $this->digits = $digits;

        return $this;
    }

    /**
     * Get hasIterations.
     */
    public function getHasIterations(): ?int
    {
        return $this->hasIterations;
    }

    /**
     * Set hasIterations.
     */
    public function setHasIterations(int $hasIterations): self
    {
        $this->hasIterations = $hasIterations;

        return $this;
    }

    /**
     * Get hashedSaltedValue.
     */
    public function getHashedSaltedValue(): ?string
    {
        return $this->hashedSaltedValue;
    }

    /**
     * Set hashedSaltedValue.
     */
    public function setHashedSaltedValue(string $hashedSaltedValue): self
    {
        $this->hashedSaltedValue = $hashedSaltedValue;

        return $this;
    }

    /**
     * Get period.
     */
    public function getPeriod(): ?int
    {
        return $this->period;
    }

    /**
     * Set period.
     */
    public function setPeriod(int $period): self
    {
        $this->period = $period;

        return $this;
    }

    /**
     * Get salt.
     */
    public function getSalt(): ?string
    {
        return $this->salt;
    }

    /**
     * Set salt.
     */
    public function setSalt(string $salt): self
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get temporary.
     */
    public function getTemporary(): ?bool
    {
        return $this->temporary;
    }

    /**
     * Set temporary.
     */
    public function setTemporary(bool $temporary): self
    {
        $this->temporary = $temporary;

        return $this;
    }

    /**
     * Get type.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Set type.
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get value.
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * Set value.
     */
    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }
}
