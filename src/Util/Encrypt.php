<?php

namespace Xyz\Obp\Util;

use Xyz\Obp\Ecc\MySm4;

class Encrypt
{
    /**
     * 加密方法
     * @param string $str
     * @return string
     */
    public static function encrypt($str, $secretKey, $encryptType="AES")
    {

        $str = trim($str);
        if($encryptType=='AES'){
            //AES, 256 模式加密数据
            $encrypted = @openssl_encrypt(trim($str), 'aes-256-cbc', base64_decode($secretKey), OPENSSL_RAW_DATA );
            return base64_encode($encrypted);
        }else{
            // sm4-ecb算法
            //目前如果服务器配套的使用的是openssl 1.1.1x, 目前到1.1.1k ,都可以直接用以下代码替代29-31行
            //$encrypted =openssl_encrypt($str, "sm4-ecb", hex2bin($secretKey), 0);
            $sm4 = new MySm4();
            $encrypted = $sm4->encrypt(hex2bin($secretKey), $str); //ecb
            return $encrypted;
        }

    }

    /**
     * 解密方法
     * @param string $str
     * @return string
     */
    public static function decrypt($str, $secretKey, $encryptType="AES")
    {

        if($encryptType=='AES'){
            //AES, 256 模式加密数据 CBC
            $decrypted = @openssl_decrypt( base64_decode($str) , 'aes-256-cbc', base64_decode($secretKey), OPENSSL_RAW_DATA);
        }else{
            // sm4-ecb算法
            //目前如果服务器配套的使用的是openssl 1.1.1x, 目前到1.1.1k ,都可以直接用51行代码替代48-50行
            //$decrypted = openssl_decrypt($str, "sm4-ecb", hex2bin($secretKey), 0);
            $sm4 = new MySm4();
            $decrypted = $sm4->decrypt(hex2bin($secretKey), $str);
        }
        return $decrypted;
    }
}