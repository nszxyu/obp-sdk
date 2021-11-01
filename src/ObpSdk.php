<?php

namespace Xyz\Obp;

use Xyz\Obp\Config\Config;
use Xyz\Obp\Exception\ObpException;
use Xyz\Obp\Request\PublicRequest;
use Xyz\Obp\Response\PublicResponse;
use Xyz\Obp\Util\UrlPost;

class ObpSdk{

    private $config;

    public function __construct(Config $config){
        $this->config = $config;
    }

    /**
     * 获取实例
     * @param Config $config
     * @return ObpSdk
     */
    public static function get(Config $config): ObpSdk
    {
        return new self($config);
    }

    /**
     * @param PublicRequest $request
     * @return PublicResponse
     * @throws ObpException
     */
    public function exec(PublicRequest $request): PublicResponse
    {
        $paramsPost = $request->get();

        ksort($paramsPost);
        $postData = http_build_query($paramsPost);

        $curl = new UrlPost($this->config->getGateway(), $postData);
        $resData = $curl->postUrl();
        $response = new PublicResponse($resData, $this->config);
        $response->verifySign();
        $response->decrypt();
        
//        if(!$response->isSuccess()){
//            throw new ObpException($response->responseMsg, $response->responseCode);
//        }
        return $response;
    }

}