# Keycloak REST API PHP client

This package provides a PHP wrapper for [Keycloak REST API](https://www.keycloak.org/docs-api/5.0/rest-api/).

<!-- TOC depthFrom:2 -->

- [Keycloak REST API PHP client](#keycloak-rest-api-php-client)
  - [Installation](#installation)
  - [How to use it](#how-to-use-it)
    - [Get users](#get-users)
    - [Get user](#get-user)
  - [Cache](#cache)
  - [Running tests](#running-tests)

<!-- /TOC -->

## Installation

Run this command to integrate the Keycloak REST API client to your existing project:  
`composer require alma-medical/keycloak-client`

## How to use it

First of all we need to configure a oauth2 provider for authenticating against Keycloak. For that purpose we use the [stevenmaguire/oauth2-keycloak](https://github.com/stevenmaguire/oauth2-keycloak) package, a [league/oauth2-client](https://github.com/thephpleague/oauth2-client) Keycloak provider.
This is an example of how to do that:

```php
use Stevenmaguire\OAuth2\Client\Provider\Keycloak as KeycloakProvider;

$provider = new KeycloakProvider([
    'authServerUrl' => 'https://my-keycloak.com/auth',
    'clientId' => 'myClientId',
    'clientSecret' => 'myCleintSecret',
    'realm' => 'myRealm',
]);
```

Once we have our provider instance we need to create an API client:

```php
use AlmaMedical\KeycloakClient\Keycloak;

$client = new Keycloak($provider);
```

Now we can call any api method with `callMedthod()` function:

```php
$response = $client->callMethod('users');
```

To make easier the parse of the responses, some methods have been implemented:

### Get users

This method gets all the users:

```php
use AlmaMedical\KeycloakClient\Method\GetUsers;

$getUsers = new GetUsers($client);
$users = $getUsers->call();
```

### Get user

This method get a user

```php
use AlmaMedical\KeycloakClient\Method\GetUser;

$getUsers = new GetUser($client, 'user_id');
$user = $getUsers->call();
```

## Cache

You can use a `Psr\Cache\CacheItemPoolInterface` to cache Keycloak tokens. To use it simply set your `CacheItemPoolInterface` and the client will package will use it:

```php
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

$client->setCachePool(new FilesystemAdapter());
```

## Running tests

To run the tests run the following command:  
`./vendor/bin/phpunit`
