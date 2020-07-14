<?php

class Token
{
    private $token;
    private $timestamp;
    private $userAccount;
    private $role;

    public function __construct($token, $timestamp, $userAccount, $role)
    {
        $this->token = $token;
        $this->timestamp = $timestamp;
        $this->userAccount = $userAccount;
        $this->role = $role;
    }

    public function getBase64Str()
    {
        $tokenArr = [
            'token' => $this->token,
            'timestamp' => $this->timestamp,
            'useraccount' => $this->userAccount,
            'role' => $this->role
        ];
        $encodeStr = json_encode($tokenArr);
        return base64_encode($encodeStr);
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