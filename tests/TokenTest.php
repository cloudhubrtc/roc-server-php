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

        # 删除掩码
        $authToken = substr($authToken, 0, -16);


        $this->assertEquals(
            'eyJ0b2tlbiI6IjBiNDkzZTVjN2FjMjM2OThkOWNkYTJhZmMzNGUyMTQyIiwidGltZXN0YW1wIjoxNTk0NzA0ODkxfQ==',
            $authToken
        );
    }
}