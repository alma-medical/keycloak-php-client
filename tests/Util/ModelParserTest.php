<?php

namespace Tests\Util;

use AlmaMedical\KeycloakClient\Util\ModelParser;
use PHPUnit\Framework\TestCase;

class ModelParserTest extends TestCase
{
    const RAW_FEDERATED_ENTITY = [
        'identityProvider' => 'identity_provider',
        'userId' => 'user_id',
        'userName' => 'user_name',
    ];

    const RAW_FEDERATED_ENTITY_2 = [
        'identityProvider' => 'identity_provider2',
        'userId' => 'user_id2',
        'userName' => 'user_name2',
    ];

    const RAW_MULTIVALUE_HASH_MAP = [
        'empty' => false,
        'loadFactor' => 32.23,
        'threshold' => 10,
    ];

    const RAW_CREDENTIAL = [
        'algorithm' => 'my_algorithm',
        'config' => self::RAW_MULTIVALUE_HASH_MAP,
        'counter' => 32,
        'createdDate' => 123456789,
        'device' => 'my_device',
        'digits' => 54,
        'hashIterations' => 100,
        'hashedSaltedValue' => 'hashed_salted_value',
        'period' => 123,
        'salt' => 'my_salt',
        'temporary' => true,
        'type' => 'my_type',
        'value' => 'my_value',
    ];

    const RAW_CREDENTIAL_2 = [
        'algorithm' => 'my_algorithm_2',
        'config' => self::RAW_MULTIVALUE_HASH_MAP,
        'counter' => 12,
        'createdDate' => 1234567189,
        'device' => 'my_device2',
        'digits' => 542,
        'hashIterations' => 1002,
        'hashedSaltedValue' => 'hashed_salted_value2',
        'period' => 1232,
        'salt' => 'my_salt2',
        'temporary' => false,
        'type' => 'my_type2',
        'value' => 'my_value2',
    ];

    const RAW_USER_CONSENT = [
        'clientId' => 'client_id',
        'createdDate' => 123456789,
        'grantedClientScopes' => ['scope1', 'scope2'],
        'lastUpdatedDate' => 98765321,
    ];

    const RAW_USER_CONSENT_2 = [
        'clientId' => 'client_id2',
        'createdDate' => 1234567892,
        'grantedClientScopes' => ['scope12', 'scope22'],
        'lastUpdatedDate' => 987653212,
    ];

    const RAW_USER = [
        'access' => ['key1' => 'value1', 'key2' => 'value2'],
        'attributes' => ['key3' => 'value3', 'key4' => 'value4'],
        'clientConsents' => [self::RAW_USER_CONSENT, self::RAW_USER_CONSENT_2],
        'clientRoles' => ['key5' => 'value5', 'key6' => 'value6'],
        'createdTimestamp' => 654983216,
        'credentials' => [self::RAW_CREDENTIAL, self::RAW_CREDENTIAL_2],
        'disableableCredentialTypes' => ['one', 'two'],
        'email' => 'a@a.a',
        'emailVerified' => false,
        'enabled' => true,
        'federatedIdentities' => [self::RAW_FEDERATED_ENTITY, self::RAW_FEDERATED_ENTITY_2],
        'federationLink' => 'https://federation-link.com',
        'firstName' => 'first_name',
        'groups' => ['group1', 'group2'],
        'id' => 'my_id',
        'lastName' => 'last_name',
        'notBefore' => 54,
        'origin' => 'my_origin',
        'realmRoles' => ['ROLE_1', 'ROLE_2'],
        'requiredActions' => ['ACTION_1', 'ACTION_2'],
        'self' => 'my_self',
        'serviceAccountClientId' => 'service_account_client_id',
        'username' => 'my_username',
    ];

    private function rawDataIsProperlyParsed(array $rawData, $entity, array $mapping = [])
    {
        foreach ($rawData as $key => $value) {
            $getter = 'get'.ucfirst($key);
            if (isset($mapping[$key])) {
                $testMethod = $mapping[$key];
                if (is_array($entity->$getter())) {
                    foreach ($value as $subValue) {
                        $this->$testMethod($subValue);
                    }
                } else {
                    $this->$testMethod($value);
                }
            } else {
                $this->assertEquals($value, $entity->$getter());
            }
        }
    }

    public function testProperlyParsesAFederatedIdentity(?array $rawFederatedIdentity = null)
    {
        $rawFederatedIdentity = $rawFederatedIdentity ?? self::RAW_FEDERATED_ENTITY;
        $federatedIdentity = ModelParser::parseFederatedIdentity($rawFederatedIdentity);

        $this->rawDataIsProperlyParsed($rawFederatedIdentity, $federatedIdentity);
    }

    public function testProperlyParsesAMultivaluedHashMap(?array $rawMultivalueHashMap = null)
    {
        $rawMultivalueHashMap = $rawMultivalueHashMap ?? self::RAW_MULTIVALUE_HASH_MAP;
        $multivalueHashMap = ModelParser::parseMultivaluedHashMap($rawMultivalueHashMap);

        $this->rawDataIsProperlyParsed($rawMultivalueHashMap, $multivalueHashMap);
    }

    public function testProperlyParsesACredential(?array $rawCredential = null)
    {
        $rawCredential = $rawCredential ?? self::RAW_CREDENTIAL;
        $credential = ModelParser::parseCredential($rawCredential);

        $this->rawDataIsProperlyParsed($rawCredential, $credential, [
            'config' => 'testProperlyParsesAMultivaluedHashMap',
        ]);
    }

    public function testProperlyParsesAUserConsent(?array $rawUserConsent = null)
    {
        $rawUserConsent = $rawUserConsent ?? self::RAW_USER_CONSENT;
        $userConsent = ModelParser::parseUserConsent($rawUserConsent);

        $this->rawDataIsProperlyParsed($rawUserConsent, $userConsent);
    }

    public function testProperlyParsesAUser(?array $rawUser = null)
    {
        $rawUser = $rawUser ?? self::RAW_USER;
        $user = ModelParser::parseUser($rawUser);

        $this->rawDataIsProperlyParsed($rawUser, $user, [
            'clientConsents' => 'testProperlyParsesAUserConsent',
            'credentials' => 'testProperlyParsesACredential',
            'federatedIdentities' => 'testProperlyParsesAFederatedIdentity',
        ]);
    }
}
