<?php
require_once 'Token.php';

class Client
{
    private $authKey;
    private $secretKey;
    private $apiDomain;

    public function __construct($authKey, $secretKey)
    {
        $this->authKey = $authKey;
        $this->secretKey = $secretKey;
        $this->apiDomain = 'http://www.com/api';
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
        $token = new Token($encodeStr, $expireTime, 'reserve', 'reserve');
        return $token->getBase64Str() . Token::randomStr(16);
    }


}