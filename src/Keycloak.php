<?php

namespace AlmaMedical\KeycloakClient;

use League\OAuth2\Client\Token\AccessToken;
use Stevenmaguire\OAuth2\Client\Provider\Keycloak as KeycloakProvider;
use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Symfony\Component\Cache\CacheItem;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\ResponseInterface;

class Keycloak
{
    const ENDPOINT_AUTHORIZATION = 'protocol/openid-connect/auth';
    const ENDPOINT_TOKEN = 'protocol/openid-connect/auth';

    const CACHE_ITEM = 'token';

    private $keycloakProvider;
    private $cache;

    public function __construct(KeycloakProvider $keycloakProvider)
    {
        $this->keycloakProvider = $keycloakProvider;
    }

    /**
     * Refresh token.
     */
    private function getToken(): AccessToken
    {
        $tokenCacheItem = $this->getTokenCacheItem();
        $token = $tokenCacheItem->get();
        // If the token does not exists, create it
        if (!$token) {
            $token = $this->keycloakProvider->getAccessToken('client_credentials');
            $this->setToken($token);
        }

        // If the token has expired, refresh it with refresh token
        if ($token->hasExpired()) {
            $token = $this->keycloakProvider->getAccessToken('refresh_token', [
                'refresh_token' => $this->token->getRefreshToken(),
            ]);
            $this->setToken($token);
        }

        return $token;
    }

    /**
     * Set token.
     */
    private function setToken(AccessToken $token): void
    {
        $this->getTokenCacheItem()->set($token);
    }

    /**
     * Get default cache. This should not be used in production environment.
     */
    private function getDefaultTokenCacheItem(): CacheItem
    {
        return (new ArrayAdapter())->getItem(self::CACHE_ITEM);
    }

    /**
     * Set cache.
     */
    public function setCache(CacheItem $cache): self
    {
        $this->cache = $cache;

        return $this;
    }

    /**
     * Get cache.
     */
    private function getTokenCacheItem(): CacheItem
    {
        if (!$this->cache) {
            $this->setCache($this->getDefaultTokenCacheItem());
        }

        return $this->cache;
    }

    /**
     * Call an API method.
     */
    public function callMethod(string $endpoint, string $method = 'GET'): ResponseInterface
    {
        $client = HttpClient::create();

        return $client->request(
            $method,
            "{$this->keycloakProvider->authServerUrl}/admin/realms/{$this->keycloakProvider->realm}/$endpoint",
            [
                'auth_bearer' => $this->getToken()->getToken(),
                'headers' => ['Content-Type' => 'application/json'],
            ]
        );
    }
}
