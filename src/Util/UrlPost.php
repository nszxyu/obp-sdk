<?php
namespace Xyz\Obp\Util;

use Xyz\Obp\Exception\ObpException;

class UrlPost
{
    private $gateway;
    private $timeout = 30;
    private $postData;

    public function __construct($gateway = '', $post_data = '')
    {
        $this->gateway = $gateway;
        $this->postData = $post_data;
    }

    /**
     *
     * @return bool|mixed|string
     * @throws ObpException
     */
    public function postUrl(){
        $ch = curl_init();
        if(substr($this->gateway, 0, 5)=='https'){
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2); //从证书中检查SSL加密算法是否存在
        }
        curl_setopt($ch, CURLOPT_URL, $this->gateway);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->timeout);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->postData);
        $response = curl_exec($ch);
        curl_close($ch);

        if($response === false){
            if (curl_errno($ch)) {
                throw new ObpException(curl_error($ch), 0);
            }
            $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if (200 !== $httpStatusCode) {
                throw new ObpException($response, $httpStatusCode);
            }
        }

        return $response;
    }
}

