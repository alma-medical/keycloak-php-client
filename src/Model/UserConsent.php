<?php

namespace AlmaMedical\KeycloakClient\Model;

class UserConsent
{
    private $clientId;
    private $createdDate;
    private $grantedClientScopes = [];
    private $lastUpdatedDate;

    /**
     * Get the value of clientId.
     */
    public function getClientId(): ?string
    {
        return $this->clientId;
    }

    /**
     * Set the value of clientId.
     */
    public function setClientId(string $clientId): self
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * Get the value of createdDate.
     */
    public function getCreatedDate(): ?\DateTime
    {
        return $this->createdDate;
    }

    /**
     * Set the value of createdDate.
     */
    public function setCreatedDate(\DateTime $createdDate): self
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    /**
     * Get the value of grantedClientScopes.
     */
    public function getGrantedClientScopes(): array
    {
        return $this->grantedClientScopes;
    }

    /**
     * Add a grantedClientScope.
     */
    public function addGrantedClientScope(string $grantedClientScope): self
    {
        $this->grantedClientScopes[] = $grantedClientScope;

        return $this;
    }

    /**
     * Set the value of grantedClientScopes.
     */
    public function setGrantedClientScopes($grantedClientScopes): self
    {
        $this->grantedClientScopes = [];

        foreach ($$grantedClientScopes as $grantedClientScope) {
            $this->addGrantedClientScope($grantedClientScope);
        }

        return $this;
    }

    /**
     * Get the value of lastUpdatedDate.
     */
    public function getLastUpdatedDate(): ?\DateTime
    {
        return $this->lastUpdatedDate;
    }

    /**
     * Set the value of lastUpdatedDate.
     */
    public function setLastUpdatedDate(\DateTime $lastUpdatedDate): self
    {
        $this->lastUpdatedDate = $lastUpdatedDate;

        return $this;
    }
}
