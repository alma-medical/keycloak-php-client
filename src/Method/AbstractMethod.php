<?php

namespace AlmaMedical\KeycloakClient\Method;

use AlmaMedical\KeycloakClient\Keycloak;
use Symfony\Contracts\HttpClient\ResponseInterface;

abstract class AbstractMethod implements MethodInterface
{
    private $keycloak;

    public function __construct(Keycloak $keycloak)
    {
        $this->keycloak = $keycloak;
    }

    /**
     * Get method name.
     */
    abstract protected function getMethodName(): string;

    /**
     * Parses response.
     *
     * @return mixed
     */
    abstract protected function parseResponse(ResponseInterface $responseInterface);

    /**
     * Get http method. Override this function if the http method is not 'GET'.
     */
    protected function getHttpMethod(): string
    {
        return 'GET';
    }

    /**
     * Call method.
     *
     * @return mixed
     */
    public function call()
    {
        $response = $this->keycloak->callMethod($this->getMethodName(), $this->getHttpMethod());

        return $this->parseResponse($response);
    }
}
