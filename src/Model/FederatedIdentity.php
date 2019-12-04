<?php

namespace AlmaMedical\KeycloakClient\Model;

class FederatedIdentity
{
    /**
     * @var string
     */
    private $identityProvider;
    /**
     * @var string
     */
    private $userId;
    /**
     * @var string
     */
    private $userName;

    /**
     * Get identityProvider.
     */
    public function getIdentityProvider(): ?string
    {
        return $this->identityProvider;
    }

    /**
     * Set identityProvider.
     */
    public function setIdentityProvider(string $identityProvider): self
    {
        $this->identityProvider = $identityProvider;

        return $this;
    }

    /**
     * Get userId.
     */
    public function getUserId(): ?string
    {
        return $this->userId;
    }

    /**
     * Set userId.
     */
    public function setUserId(string $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userName.
     */
    public function getUserName(): ?string
    {
        return $this->userName;
    }

    /**
     * Set userName.
     */
    public function setUserName(string $userName): self
    {
        $this->userName = $userName;

        return $this;
    }
}
