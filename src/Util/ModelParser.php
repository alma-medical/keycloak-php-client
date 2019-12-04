<?php

namespace AlmaMedical\KeycloakClient\Util;

use AlmaMedical\KeycloakClient\Model\Credential;
use AlmaMedical\KeycloakClient\Model\FederatedIdentity;
use AlmaMedical\KeycloakClient\Model\MultivaluedHashMap;
use AlmaMedical\KeycloakClient\Model\User;
use AlmaMedical\KeycloakClient\Model\UserConsent;

class ModelParser
{
    /**
     * Parse a user.
     */
    public static function parseUser(array $rawUser): User
    {
        $user = new User();

        if (isset($rawUser['access'])) {
            $user->setAccess($rawUser['access']);
        }
        if (isset($rawUser['attributes'])) {
            $user->setAttributes($rawUser['attributes']);
        }
        if (isset($rawUser['clientConsents'])) {
            foreach ($rawUser['clientConsent'] as $rawClientConsent) {
                $user->addClientConsent(self::parseUserConsent($rawClientConsent));
            }
        }
        if (isset($rawUser['clientRoles'])) {
            $user->setClientRoles($rawUser['clientRoles']);
        }
        if (isset($rawUser['createdTimestamp'])) {
            $user->setCreatedTimestamp($rawUser['createdTimestamp']);
        }
        if (isset($rawUser['credentials'])) {
            foreach ($rawUser['credentials'] as $rawCredential) {
                $user->addCredential(self::parseCredential($rawCredential));
            }
        }
        if (isset($rawUser['disableableCredentialTypes'])) {
            $user->setDisableableCredentialTypes($rawUser['disableableCredentialTypes']);
        }
        if (isset($rawUser['email'])) {
            $user->setEmail($rawUser['email']);
        }
        if (isset($rawUser['emailVerified'])) {
            $user->setEmailVerified($rawUser['emailVerified']);
        }
        if (isset($rawUser['enabled'])) {
            $user->setEnabled($rawUser['enabled']);
        }
        if (isset($rawUser['federatedIdentities'])) {
            foreach ($rawUser['federatedIdentities'] as $rawFederatedIdentity) {
                $user->addFederatedIdentity(self::parseFederatedIdentity($rawFederatedIdentity));
            }
        }
        if (isset($rawUser['federationLink'])) {
            $user->setFederationLink($rawUser['federationLink']);
        }
        if (isset($rawUser['firstName'])) {
            $user->setFirstName($rawUser['firstName']);
        }
        if (isset($rawUser['groups'])) {
            $user->setGroups($rawUser['groups']);
        }
        if (isset($rawUser['id'])) {
            $user->setId($rawUser['id']);
        }
        if (isset($rawUser['lastName'])) {
            $user->setLastName($rawUser['lastName']);
        }
        if (isset($rawUser['notBefore'])) {
            $user->setNotBefore($rawUser['notBefore']);
        }
        if (isset($rawUser['origin'])) {
            $user->setOrigin($rawUser['origin']);
        }
        if (isset($rawUser['realmRoles'])) {
            $user->setRealmRoles($rawUser['realmRoles']);
        }
        if (isset($rawUser['requiredActions'])) {
            $user->setRequiredActions($rawUser['requiredActions']);
        }
        if (isset($rawUser['self'])) {
            $user->setSelf($rawUser['self']);
        }
        if (isset($rawUser['serviceAccountClientId'])) {
            $user->setServiceAccountClientId($rawUser['serviceAccountClientId']);
        }
        if (isset($rawUser['username'])) {
            $user->setUsername($rawUser['username']);
        }

        return $user;
    }

    /**
     * Parses a user consent.
     */
    public static function parseUserConsent(array $rawUserConsent): UserConsent
    {
        $userConsent = new UserConsent();

        if (isset($rawUserConsent['clientId'])) {
            $userConsent->setClientId($rawUserConsent['clientId']);
        }
        if (isset($rawUserConsent['createdDate'])) {
            $userConsent->setCreatedDate($rawUserConsent['createdDate']);
        }
        if (isset($rawUserConsent['grantedClientScopes'])) {
            $userConsent->setGrantedClientScopes($rawUserConsent['grantedClientScopes']);
        }
        if (isset($rawUserConsent['lastUpdatedDate'])) {
            $userConsent->setLastUpdatedDate($rawUserConsent['lastUpdatedDate']);
        }

        return $userConsent;
    }

    /**
     * Parse credential.
     */
    public static function parseCredential(array $rawCredential): Credential
    {
        $credential = new Credential();

        if (isset($rawCredential['algorithm'])) {
            $credential->setAlgorithm($rawCredential['algorithm']);
        }
        if (isset($rawCredential['config'])) {
            $credential->setConfig(self::parseMultivaluedHashMap($rawCredential['config']));
        }
        if (isset($rawCredential['counter'])) {
            $credential->setCounter($rawCredential['counter']);
        }
        if (isset($rawCredential['createdDate'])) {
            $credential->setCreatedDate($rawCredential['createdDate']);
        }
        if (isset($rawCredential['device'])) {
            $credential->setDevice($rawCredential['device']);
        }
        if (isset($rawCredential['digits'])) {
            $credential->setDigits($rawCredential['digits']);
        }
        if (isset($rawCredential['hashIterations'])) {
            $credential->setHasIterations($rawCredential['hashIterations']);
        }
        if (isset($rawCredential['hashedSaltedValue'])) {
            $credential->setHashedSaltedValue($rawCredential['hashedSaltedValue']);
        }
        if (isset($rawCredential['period'])) {
            $credential->setPeriod($rawCredential['period']);
        }
        if (isset($rawCredential['salt'])) {
            $credential->setSalt($rawCredential['salt']);
        }
        if (isset($rawCredential['temporary'])) {
            $credential->setTemporary($rawCredential['temporary']);
        }
        if (isset($rawCredential['type'])) {
            $credential->setType($rawCredential['type']);
        }
        if (isset($rawCredential['value'])) {
            $credential->setValue($rawCredential['value']);
        }

        return $credential;
    }

    /**
     * Parse multivalued hash map.
     */
    public static function parseMultivaluedHashMap(array $rawMultivaluedHashMap): MultivaluedHashMap
    {
        $multivaluedHashMap = new MultivaluedHashMap();

        if (isset($rawMultivaluedHashMap['empty'])) {
            $multivaluedHashMap->setEmpty($rawMultivaluedHashMap['empty']);
        }
        if (isset($rawMultivaluedHashMap['loadFactor'])) {
            $multivaluedHashMap->setLoadFactor($rawMultivaluedHashMap['loadFactor']);
        }
        if (isset($rawMultivaluedHashMap['threshold'])) {
            $multivaluedHashMap->setThreshold($rawMultivaluedHashMap['threshold']);
        }

        return $multivaluedHashMap;
    }

    /**
     * Parse a federated identity.
     */
    public static function parseFederatedIdentity(array $rawFederatedIdentity): FederatedIdentity
    {
        $federatedIdentity = new FederatedIdentity();

        if (isset($rawFederatedIdentity['identityProvider'])) {
            $federatedIdentity->setIdentityProvider($rawFederatedIdentity['identityProvider']);
        }
        if (isset($rawFederatedIdentity['userId'])) {
            $federatedIdentity->setUserId($rawFederatedIdentity['userId']);
        }
        if (isset($rawFederatedIdentity['userName'])) {
            $federatedIdentity->setUserName($rawFederatedIdentity['userName']);
        }

        return $federatedIdentity;
    }
}
