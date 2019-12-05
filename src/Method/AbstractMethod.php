<?php

namespace AlmaMedical\KeycloakClient\Method;

use AlmaMedical\KeycloakClient\Keycloak;
use Symfony\Contracts\HttpClient\ResponseInterface;

abstract class AbstractMethod implements MethodInterface
{
    private $keycloak;
    private $queryParameters = [];
    private $bodyParameters = [];

    public function __construct(Keycloak $keycloak)
    {
        $this->keycloak = $keycloak;
    }

    /**
     * Set query parameters.
     */
    public function setQueryParameters(array $queryParameters): self
    {
        $this->queryParameters = $queryParameters;

        return $this;
    }

    /**
     * Set body parameters.
     */
    public function setBodyParameters(array $bodyParameters): self
    {
        $this->bodyParameters = $bodyParameters;

        return $this;
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
        $response = $this->keycloak->callMethod(
            $this->getMethodName(),
            $this->getHttpMethod(),
            $this->queryParameters,
            $this->bodyParameters
        );

        return $this->parseResponse($response);
    }
}
