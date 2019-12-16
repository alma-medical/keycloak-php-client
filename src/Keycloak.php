<?php

namespace AlmaMedical\KeycloakClient;

use League\OAuth2\Client\Token\AccessToken;
use Psr\Cache\CacheItemInterface;
use Psr\Cache\CacheItemPoolInterface;
use Stevenmaguire\OAuth2\Client\Provider\Keycloak as KeycloakProvider;
use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\ResponseInterface;

class Keycloak
{
    const ENDPOINT_AUTHORIZATION = 'protocol/openid-connect/auth';
    const ENDPOINT_TOKEN = 'protocol/openid-connect/auth';

    const CACHE_ITEM = 'keycloak.token';

    private $keycloakProvider;
    private $cachePool;

    public function __construct(KeycloakProvider $keycloakProvider)
    {
        $this->keycloakProvider = $keycloakProvider;
    }

    /**
     * Refresh token.
     */
    private function getToken(): AccessToken
    {
        $cacheItem = $this->getCacheItem();
        // If the token does not exists, create it
        if (!$cacheItem->isHit()) {
            $token = $this->keycloakProvider->getAccessToken('client_credentials');
            $this->storeTokenToCache($token);
        }

        $token = $this->getCacheItem()->get();

        // If the token has expired, refresh it with refresh token
        if ($token->hasExpired()) {
            $token = $this->keycloakProvider->getAccessToken('refresh_token', [
                'refresh_token' => $token->getRefreshToken(),
            ]);
            $this->storeTokenToCache($token);
        }

        return $token;
    }

    /**
     * Set tokenStore token to cache.
     */
    private function storeTokenToCache(AccessToken $token): void
    {
        $cacheItem = $this->getCacheItem();
        $this->getCachePool()->save($cacheItem->set($token));
    }

    /**
     * Get default cache. This should not be used in production environment.
     */
    private function getDefaultCachePool(): CacheItemPoolInterface
    {
        return new ArrayAdapter();
    }

    /**
     * Set cache pool.
     */
    public function setCachePool(CacheItemPoolInterface $cachePool): self
    {
        $this->cachePool = $cachePool;

        return $this;
    }

    /**
     * Get cache pool.
     */
    private function getCachePool(): CacheItemPoolInterface
    {
        if (!$this->cachePool) {
            $this->setCachePool($this->getDefaultCachePool());
        }

        return $this->cachePool;
    }

    /**
     * Get cache item.
     */
    private function getCacheItem(): CacheItemInterface
    {
        return $this->getCachePool()->getItem(self::CACHE_ITEM);
    }

    /**
     * Call an API method.
     */
    public function callMethod(
        string $endpoint,
        string $method = 'GET',
        array $queryParameters = [],
        array $bodyParameters = []
    ): ResponseInterface {
        $client = HttpClient::create();

        $queryParametersString = '';
        if (count($queryParameters) > 0) {
            $queryParametersString = '?'.http_build_query($queryParameters);
        }

        return $client->request(
            $method,
            "{$this->keycloakProvider->authServerUrl}/admin/realms/{$this->keycloakProvider->realm}/$endpoint$queryParametersString",
            [
                'auth_bearer' => $this->getToken()->getToken(),
                'headers' => ['Content-Type' => 'application/json'],
                'json' => $bodyParameters,
            ]
        );
    }
}
