<?php

namespace Xyz\Obp\Response;

use Xyz\Obp\Config\Config;
use Xyz\Obp\Exception\ObpException;
use Xyz\Obp\Util\Encrypt;
use Xyz\Obp\Util\Sign;

/**
 * @property mixed|string $responseMsg
 * @property mixed|string responseCode
 */
class PublicResponse
{
    private $raw_data;
    private $config;
    private $data = [];

    public function __construct($raw_data, Config $config)
    {
        $this->raw_data = json_decode($raw_data, true);
        $this->config = $config;
    }

    /**
     * 验签
     * @throws ObpException
     */
    public function verifySign(){
        $strParam = 'bizResponse='. $this->raw_data['bizResponse'];
        try {
            Sign::verifySign($strParam, $this->raw_data['sign'], $this->config->getBankPublicKey(), $this->config->getSignType());
        } catch (\Exception $e) {
            throw new ObpException('验签失败');
        }
    }

    /**
     * 解密
     * @throws ObpException
     */
    public function decrypt(){
        try {
            $bizContent = Encrypt::decrypt($this->raw_data['bizResponse'], $this->config->getEncryptKey(), $this->config->getEncryptType());
            $this->data = json_decode($bizContent, true);
        }catch (\Exception $exception){
            throw new ObpException('解密失败');
        }
    }

    /**
     * 请求是否成功
     * @return bool
     */
    public function isSuccess(): bool
    {
        return (isset($this->data['responseCode'])
            && $this->data['responseCode'] === '000000');
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->data;
    }

    /**
     * @param $key
     * @param string $default
     * @return bool|mixed|string
     */
    public function get($key, $default = ''){
        return ((isset($this->data[$key]) && $this->data[$key]) ? $this->data[$key] : $default);
    }

    public function __get($name)
    {
        // TODO: Implement __get() method.
        return $this->get($name);
    }
}