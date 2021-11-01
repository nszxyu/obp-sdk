<?php

namespace Xyz\Obp\Request;

use Xyz\Obp\Config\Config;
use Xyz\Obp\Util\Encrypt;
use Xyz\Obp\Util\Helper;
use Xyz\Obp\Util\Sign;

class PublicRequest
{

    protected $config = null;
    //调用接口
    protected $method;
    //请求ID
    protected $requestId;
    //签名
    protected $sign;
    //时间戳
    protected $timestamp;
    //请求参数
    protected $paramsData = [];
    //请求参数加密
    protected $bizContent;

    /**
     * 构建对象
     * @param Config $config
     * @return $this
     */
    public function config(Config $config): PublicRequest
    {
        $this->config = $config;
        return $this;
    }


    /**
     * 生成RequestId
     * @return $this
     */
    public function makeRequestId(): PublicRequest
    {
        $str = $this->config->getAppId() .Helper::generateRand(). $this->timestamp;
        $this->requestId = sha1($str, false);
        return $this;
    }

    /**
     * 设置当前时间戳
     * @return $this
     */
    public function setTimestamp(): PublicRequest
    {
        $this->timestamp = Helper::currentTimestamp();
        return $this;
    }

    /**
     * 业务参数加密
     * @return $this
     */
    public function getBizContent(): PublicRequest
    {
        $jsonParam = json_encode($this->paramsData, JSON_HEX_QUOT);
        $this->bizContent = Encrypt::encrypt($jsonParam, $this->config->getEncryptKey(), $this->config->getEncryptType());
        return $this;
    }

    /**
     *  Sign 加签
     *  appId=1f6dfaec17
     *  &bizContent=xRb/yie5l/33lrDX/7w4f4JQVT2/6+BOOz3/FETRuJs=
     *  &encryptType=AES
     *  &method=222obp-api-ibank-aum.getFundPrdInfo
     *  &requestId=1694c4af53782f6fe95336f44e3c879f0d059a38
     *  &signType=RSA2
     *  &timestamp=1593588943567
     */
    public function sign(): PublicRequest
    {
        $param = [
            'appId' => $this->config->getAppId(),
            'bizContent' => $this->bizContent,
            'encryptType' => $this->config->getEncryptType(),
            'method' => $this->method,
            'requestId' => $this->requestId,
            'timestamp' => $this->timestamp,
            'signType' => $this->config->getSignType(),
        ];
        $strParam = $this->getSignContent($param);
        $this->sign = Sign::createSign($strParam, $this->config->getAppPrivateKey(), $this->config->getSignType());
        return $this;
    }

    /**
     * 数组转换为拼接字段URL
     * @param $params array
     * @return string
     */
    public function getSignContent(array $params): string
    {
        ksort($params);
        $stringToBeSigned = "";
        $first = true;
        foreach ($params as $k => $v) {
            if ($v && "@" != substr($v, 0, 1)) {
                $v = $this->charset($v, $this->config->getPostCharset());
                $stringToBeSigned .= ($first ? '' : '&')."$k=$v";
                $first = false;
            }
        }
        return $stringToBeSigned;
    }

    /**
     * 转换字符集编码
     * @param $data
     * @param $targetCharset
     * @return string
     */
    private function charset($data, $targetCharset): string
    {
        if (!empty($data)) {
            $fileType = $this->config->getFileCharset();
            if (strcasecmp($fileType, $targetCharset) != 0) {
                $data = mb_convert_encoding($data, $targetCharset, $fileType);
            }
        }
        return $data;
    }

    /**
     * 获取请求参数
     * @return array
     */
    public function get(): array
    {
        $this->setTimestamp()
            ->makeRequestId()
            ->getBizContent()
            ->sign();

        return [
                "method" => $this->method,
                "requestId" => $this->requestId,
                "appId" => $this->config->getAppId(),
                "sign" => $this->sign,
                "bizContent" => $this->bizContent,
                "signType" => $this->config->getSignType(),
                "encryptType" => $this->config->getEncryptType(),
                "timestamp" => $this->timestamp,
            ];
    }

    /**
     *
     * @return string
     */
    public function generateBusinessNo(): string
    {
         return 'OB'
             .str_pad($this->config->getAppId(), 10, "0", STR_PAD_LEFT)
             .date('Ymd')
             .str_pad(rand(0, 999), 3, "0", STR_PAD_LEFT);
    }


}