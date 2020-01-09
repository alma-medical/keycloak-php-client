<?php

namespace AlmaMedical\KeycloakClient\Method;

use AlmaMedical\KeycloakClient\Keycloak;
use Symfony\Contracts\HttpClient\ResponseInterface;

class PutUser extends AbstractMethod
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
     * @return ResponseInterface
     */
    protected function parseResponse(ResponseInterface $response)
    {
        return $response;
    }

    protected function getHttpMethod(): string
    {
        return 'PUT';
    }
}
