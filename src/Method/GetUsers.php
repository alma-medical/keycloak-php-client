<?php

namespace AlmaMedical\KeycloakClient\Method;

use AlmaMedical\KeycloakClient\Model\User;
use AlmaMedical\KeycloakClient\Util\ModelParser;
use Symfony\Contracts\HttpClient\ResponseInterface;

class GetUsers extends AbstractMethod
{
    protected function getMethodName(): string
    {
        return 'users';
    }

    /**
     * Return array of parse User.
     *
     * @return User[]
     */
    protected function parseResponse(ResponseInterface $responseInterface)
    {
        $rawUsers = $responseInterface->toArray();
        $users = [];
        foreach ($rawUsers as $rawUser) {
            $users[] = ModelParser::parseUser($rawUser);
        }

        return $users;
    }
}
