<?php declare(strict_types=1);

class Client
{
    private $authKey;
    private $secretKey;

    public function __construct($authKey, $secretKey)
    {
        $this->authKey = $authKey;
        $this->secretKey = $secretKey;
    }

    /**
     * @param string $channelName channel 名称
     * @param string $userId 用户 id
     * @param int $expireTime 过期时间
     * @return string
     */
    public function getToken(string $channelName, string $userId, int $expireTime)
    {
        $bodyStr = $this->authKey . "authkey" . $this->authKey . "channame" . $channelName . "timestamp" . $expireTime . "userid" . $userId;
        $encodeStr = md5(md5($bodyStr) . md5($this->secretKey));
        $tokenArr = [
            'token' => $encodeStr,
            'timestamp' => $expireTime,
        ];
        return base64_encode(json_encode($tokenArr)) . self::randomStr(16);
    }

    static public function randomStr($count)
    {
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ';
        $str = '';
        for ($i = 0; $i < $count; $i++) {
            $str .= $pattern{mt_rand(0, 35)};
        }
        return $str;
    }


}