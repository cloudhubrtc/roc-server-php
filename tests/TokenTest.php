<?php declare(strict_types=1);
require_once './roc/Client.php';

use PHPUnit\Framework\TestCase;

final class TokenTest extends TestCase
{
    const AuthKey = 'testAuthKey';
    const SecretKey = 'testSecretKey';
    const ChannelName = 'testChannelName';
    const UserId = 'testUserId';
    const ExpiredTime = 1594704891;

    public function testGetToken()
    {
        $client = new Client(self::AuthKey, self::SecretKey);
        $authToken = $client->getToken(self::ChannelName, self::UserId, self::ExpiredTime);

        $this->assertEquals(
            'user@example.com',
            $authToken
        );
    }
}