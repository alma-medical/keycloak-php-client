<?php

namespace AlmaMedical\KeycloakClient\Method;

use AlmaMedical\KeycloakClient\Keycloak;
use AlmaMedical\KeycloakClient\Model\User;
use AlmaMedical\KeycloakClient\Util\ModelParser;
use Symfony\Contracts\HttpClient\ResponseInterface;

class GetUser extends AbstractMethod
{
    private $userId;

    public function __construct(Keycloak $keycloak, string $userId)
    {
        parent::__construct($keycloak);
        $this->userId = $userId;
    }

    protected function getMethodName(): string
    {
        return "users/{$this->userId}";
    }

    /**
     * Return a parsed User.
     *
     * @return User
     */
    protected function parseResponse(ResponseInterface $responseInterface)
    {
        $rawUser = $responseInterface->toArray();

        return ModelParser::parseUser($rawUser);
    }
}
