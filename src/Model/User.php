<?php

namespace AlmaMedical\KeycloakClient\Model;

class User
{
    /**
     * @var array
     */
    private $access = [];
    /**
     * @var array
     */
    private $attributes = [];
    /**
     * @var array
     */
    private $clientConsents = [];
    /**
     * @var array
     */
    private $clientRoles = [];
    /**
     * @var int
     */
    private $createdTimestamp;
    /**
     * @var array
     */
    private $credentials = [];
    /**
     * @var array
     */
    private $disableableCredentialTypes = [];
    /**
     * @var string
     */
    private $email;
    /**
     * @var bool
     */
    private $emailVerified;
    /**
     * @var bool
     */
    private $enabled;
    /**
     * @var array
     */
    private $federatedIdentities = [];
    /**
     * @var string
     */
    private $federationLink;
    /**
     * @var string
     */
    private $firstName;
    /**
     * @var array
     */
    private $groups = [];
    /**
     * @var string
     */
    private $id;
    /**
     * @var string
     */
    private $lastName;
    /**
     * @var int
     */
    private $notBefore;
    /**
     * @var string
     */
    private $origin;
    /**
     * @var array
     */
    private $realmRoles = [];
    /**
     * @var array
     */
    private $requiredActions = [];
    /**
     * @var string
     */
    private $self;
    /**
     * @var string
     */
    private $serviceAccountClientId;
    /**
     * @var string
     */
    private $username;

    /**
     * Get access.
     */
    public function getAccess(): array
    {
        return $this->access;
    }

    /**
     * Set access.
     */
    public function setAccess(array $access): self
    {
        $this->access = $access;

        return $this;
    }

    /**
     * Get attributes.
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * Set attributes.
     */
    public function setAttributes(array $attributes): self
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * Get clientConsents.
     */
    public function getClientConsents(): array
    {
        return $this->clientConsents;
    }

    /**
     * Set clientConsents.
     */
    public function setClientConsents(array $clientConsents): self
    {
        $this->clientConsents = [];

        foreach ($clientConsents as $clientConsent) {
            $this->addClientConsent($clientConsent);
        }

        return $this;
    }

    /**
     * Add a clientConsent.
     */
    public function addClientConsent(UserConsent $clientConsent): self
    {
        $this->clientConsents[] = $clientConsent;

        return $this;
    }

    /**
     * Get clientRoles.
     */
    public function getClientRoles(): array
    {
        return $this->clientRoles;
    }

    /**
     * Set clientRoles.
     */
    public function setClientRoles(array $clientRoles): self
    {
        $this->clientRoles = $clientRoles;

        return $this;
    }

    /**
     * Get createdTimestamp.
     */
    public function getCreatedTimestamp(): ?int
    {
        return $this->createdTimestamp;
    }

    /**
     * Set createdTimestamp.
     */
    public function setCreatedTimestamp(int $createdTimestamp): self
    {
        $this->createdTimestamp = $createdTimestamp;

        return $this;
    }

    /**
     * Get credentials.
     */
    public function getCredentials(): array
    {
        return $this->credentials;
    }

    /**
     * Set credentials.
     */
    public function setCredentials(array $credentials): self
    {
        $this->credentials = [];

        foreach ($credentials as $credential) {
            $this->addCredential($credential);
        }

        return $this;
    }

    /**
     * Add a credential.
     */
    public function addCredential(Credential $credential): self
    {
        $this->credentials[] = $credential;

        return $this;
    }

    /**
     * Get disableableCredentialTypes.
     */
    public function getDisableableCredentialTypes(): array
    {
        return $this->disableableCredentialTypes;
    }

    /**
     * Set disableableCredentialTypes.
     */
    public function setDisableableCredentialTypes(array $disableableCredentialTypes): self
    {
        $this->disableableCredentialTypes = [];

        foreach ($disableableCredentialTypes as $disableableCredentialType) {
            $this->addDisableableCredentialType($disableableCredentialType);
        }

        return $this;
    }

    /**
     * Add a disableableCredentialType.
     */
    public function addDisableableCredentialType(string $disableableCredentialType): self
    {
        $this->disableableCredentialTypes[] = $disableableCredentialType;

        return $this;
    }

    /**
     * Get email.
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Set email.
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get emailVerified.
     */
    public function getEmailVerified(): ?bool
    {
        return $this->emailVerified;
    }

    /**
     * Set emailVerified.
     */
    public function setEmailVerified(bool $emailVerified): self
    {
        $this->emailVerified = $emailVerified;

        return $this;
    }

    /**
     * Get enabled.
     */
    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    /**
     * Set enabled.
     */
    public function setEnabled(bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get federatedIdentities.
     */
    public function getFederatedIdentities(): array
    {
        return $this->federatedIdentities;
    }

    /**
     * Set federatedIdentities.
     */
    public function setFederatedIdentities(array $federatedIdentities): self
    {
        $this->federatedIdentities = [];

        foreach ($federatedIdentities as $federatedIdentitie) {
            $this->addFederatedIdentity($federatedIdentitie);
        }

        return $this;
    }

    /**
     * Add a federatedIdentitie.
     */
    public function addFederatedIdentity(FederatedIdentity $federatedIdentity): self
    {
        $this->federatedIdentities[] = $federatedIdentity;

        return $this;
    }

    /**
     * Get federationLink.
     */
    public function getFederationLink(): ?string
    {
        return $this->federationLink;
    }

    /**
     * Set federationLink.
     */
    public function setFederationLink(string $federationLink): self
    {
        $this->federationLink = $federationLink;

        return $this;
    }

    /**
     * Get firstName.
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * Set firstName.
     */
    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get groups.
     */
    public function getGroups(): array
    {
        return $this->groups;
    }

    /**
     * Set groups.
     */
    public function setGroups(array $groups): self
    {
        $this->groups = [];

        foreach ($groups as $group) {
            $this->addGroup($group);
        }

        return $this;
    }

    /**
     * Add a group.
     */
    public function addGroup(string $group): self
    {
        $this->groups[] = $group;

        return $this;
    }

    /**
     * Get id.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Set id.
     */
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get lastName.
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * Set lastName.
     */
    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get notBefore.
     */
    public function getNotBefore(): ?int
    {
        return $this->notBefore;
    }

    /**
     * Set notBefore.
     */
    public function setNotBefore(int $notBefore): self
    {
        $this->notBefore = $notBefore;

        return $this;
    }

    /**
     * Get origin.
     */
    public function getOrigin(): ?string
    {
        return $this->origin;
    }

    /**
     * Set origin.
     */
    public function setOrigin(string $origin): self
    {
        $this->origin = $origin;

        return $this;
    }

    /**
     * Get realmRoles.
     */
    public function getRealmRoles(): array
    {
        return $this->realmRoles;
    }

    /**
     * Set realmRoles.
     */
    public function setRealmRoles(array $realmRoles): self
    {
        $this->realmRoles = [];

        foreach ($realmRoles as $realmRole) {
            $this->addRealmRole($realmRole);
        }

        return $this;
    }

    /**
     * Add a realmRole.
     */
    public function addRealmRole(string $realmRole): self
    {
        $this->realmRoles[] = $realmRole;

        return $this;
    }

    /**
     * Get requiredActions.
     */
    public function getRequiredActions(): array
    {
        return $this->requiredActions;
    }

    /**
     * Set requiredActions.
     */
    public function setRequiredActions(array $requiredActions): self
    {
        $this->requiredActions = [];

        foreach ($requiredActions as $requiredAction) {
            $this->addRequiredAction($requiredAction);
        }

        return $this;
    }

    /**
     * Add a requiredAction.
     */
    public function addRequiredAction(string $requiredAction): self
    {
        $this->requiredActions[] = $requiredAction;

        return $this;
    }

    /**
     * Get self.
     */
    public function getSelf(): ?string
    {
        return $this->self;
    }

    /**
     * Set self.
     */
    public function setSelf(string $self): self
    {
        $this->self = $self;

        return $this;
    }

    /**
     * Get serviceAccountClientId.
     */
    public function getServiceAccountClientId(): ?string
    {
        return $this->serviceAccountClientId;
    }

    /**
     * Set serviceAccountClientId.
     */
    public function setServiceAccountClientId(string $serviceAccountClientId): self
    {
        $this->serviceAccountClientId = $serviceAccountClientId;

        return $this;
    }

    /**
     * Get username.
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * Set username.
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }
}
