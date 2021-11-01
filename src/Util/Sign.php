<?php

namespace Xyz\Obp\Util;

use Exception;
use Xyz\Obp\Ecc\MySm2;

class Sign
{
    /**
     * 加签
     * @param $data
     * @param $privateKey
     * @param $signType
     */
    public static function createSign($data, $privateKey, $signType = "RSA")
    {
        if("SM2" == $signType){
            //返回的签名16进制还是base64, 目前可选hex,与base64两种
            $sm2 = new MySm2('base64');
            $sign = $sm2->doSign( $data, $privateKey);
        }else{
            $pkey = "-----BEGIN RSA PRIVATE KEY-----\n" .
                wordwrap($privateKey, 64, "\n", true) .
                "\n-----END RSA PRIVATE KEY-----";

            $gkey = openssl_get_privatekey($pkey);
            if ("RSA2" == $signType) {
                openssl_sign($data, $sign, $gkey, OPENSSL_ALGO_SHA256);
            } else {
                openssl_sign($data, $sign, $gkey);
            }
            openssl_free_key($gkey);
            $sign = base64_encode($sign);
        }

        return $sign;
    }


    /**
     * 验签
     * @param $data
     * @param $sign
     * @param $publicKey
     * @param $signType
     */
    public static function verifySign($data, $sign, $publicKey, $signType = "RSA")
    {
        if(!is_string($sign)){
            throw new Exception("check sign Fail! sign is not a string!");
        }
        if("SM2" == $signType){
            $sm2 = new MySm2('base64');
            $rs = $sm2->verifySign( $data, $sign, str_replace(",", "", $publicKey));
        }else{
            $pkey = "-----BEGIN PUBLIC KEY-----\n" .
                wordwrap($publicKey, 64, "\n", true) .
                "\n-----END PUBLIC KEY-----";

            $gkey = openssl_get_publickey($pkey);
            if ("RSA2" == $signType) {
                $rs = (bool)openssl_verify($data, base64_decode($sign), $gkey, OPENSSL_ALGO_SHA256);
            } else {
                $rs = (bool)openssl_verify($data, base64_decode($sign), $gkey);
            }
            openssl_free_key($gkey);
        }
        if(!$rs){
            throw new Exception("check sign Fail! [sign=" . $sign . ", data=" . json_encode($data) . "]");
        }

        return $rs;
    }
}