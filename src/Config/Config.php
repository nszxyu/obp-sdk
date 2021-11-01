<?php

namespace Xyz\Obp\Config;

use Xyz\Obp\Exception\ObpException;

class Config
{
    //网关
    protected $gateway = 'https://openapi.pingan.com.cn/obp/api/gateway.do';
    //应用ID
    protected $appId;
    //应用私钥
    protected $appPrivateKey;
    //签名加密类型
    protected $signType = "SM2";
    //加密算法类型，必填
    protected $encryptType = "SM4";
    //encrypt 密钥
    protected $encryptKey;
    //银行公钥
    protected $bankPublicKey;
    //字符集编码
    protected $postCharset = "UTF-8";
    //文件字符集编码
    protected $fileCharset = "UTF-8";

    public function __construct($config = [])
    {
        $this->appId         = $config['app_id'];
        $this->appPrivateKey = $config['app_private_key'];
        $this->encryptKey    = $config['encrypt_key'];
        $this->bankPublicKey = $config['bank_public_key'];

        $this->gateway       = (isset($config['gateway']) && $config['gateway']) ?  $config['gateway'] : $this->gateway;
        $this->signType      = (isset($config['sign_type']) && $config['sign_type']) ? $config['sign_type'] : $this->signType;
        $this->encryptType   = (isset($config['encrypt_type']) && $config['encrypt_type']) ? $config['encrypt_type'] : $this->encryptType;
    }

    /**
     * 加载配置
     * @param array $config
     * @return Config
     * @throws ObpException
     */
    public static function load(array $config = []): Config
    {
        $fields = [
            'app_id', 'app_private_key', 'encrypt_key', 'bank_public_key'
        ];
        $error_fields = [];
        foreach ($fields as $field){
            if(!isset($config[$field]) || !$config[$field]){
                $error_fields[] = $field;
            }
        }
        if(!empty($error_fields)){
            throw new ObpException(implode('&', $error_fields)." is not in config");
        }

        return new self($config);
    }

    /**
     * @return mixed
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     * @return mixed
     */
    public function getAppPrivateKey()
    {
        return $this->appPrivateKey;
    }

    /**
     * @return mixed
     */
    public function getBankPublicKey()
    {
        return $this->bankPublicKey;
    }

    /**
     * @return mixed
     */
    public function getEncryptKey()
    {
        return $this->encryptKey;
    }

    /**
     * @return mixed|string
     */
    public function getEncryptType()
    {
        return $this->encryptType;
    }

    /**
     * @return string
     */
    public function getFileCharset(): string
    {
        return $this->fileCharset;
    }

    /**
     * @return mixed|string
     */
    public function getGateway()
    {
        return $this->gateway;
    }

    /**
     * @return string
     */
    public function getPostCharset(): string
    {
        return $this->postCharset;
    }

    /**
     * @return mixed|string
     */
    public function getSignType()
    {
        return $this->signType;
    }
}