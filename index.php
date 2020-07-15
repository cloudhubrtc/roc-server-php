<?php
require_once './roc/Client.php';

$authKey = 'Wbyk*****Q8pwd3';
$secretKey = '234****3sdfsfs';
$channelName = '1234****9qiushao';
$userId = '15947****766-101726';
$timestamp = time() + 60 * 60 * 2; //2小时

/**
 * Demo Only
 * 请使用自己的 AuthKey 和 SecretKey
 * AuthKey: WbykCN****8pwd3
 * SecretKey: 23423****dfsfs
 * ChannelName: 1234567****shao
 * UserId: 159****91766-10**26
 * ExpireTime: 1594704891
 * AuthToken: eyJ0b2tlbiI6ImZlNTdkNzUzMDI1ZDIwMzdlNGZjMDdhMmRkYTBhZmMxIiwidGltZXN0YW1wIjoxNTk0NzA0ODkxLCJ1c2VyYWNjb3VudCI6InJlc2VydmUiLCJyb2xlIjoicmVzZXJ2ZSJ9lADPXbcGTTuoSBvn
 */


$client = new Client($authKey, $secretKey);
$authToken = $client->getToken($channelName, $userId, $timestamp);
var_dump($authToken);

