<?php

namespace Xyz\Obp\Request;

use Xyz\Obp\Request\Traits\WithBusinessNo;
use Xyz\Obp\Request\Traits\WithInstance;

/**
 * 查询账号信息请求参数
 */
class IbankAccQueryAccountRequest extends PublicRequest
{
    use WithBusinessNo, WithInstance;

    protected $method = 'obp-api-ibank-acct.queryAccount';

    /**
     * 第三方id
     * @param $thirdId
     * @return $this
     */
    public function thirdId($thirdId): IbankAccQueryAccountRequest
    {
        $this->paramsData['thirdId'] = $thirdId;
        return $this;
    }

    /**
     * 账号类型
     * @param string $type
     * @return $this
     */
    public function accountType(string $type = '3'): IbankAccQueryAccountRequest
    {
        $this->paramsData['accountType'] = $type;
        return $this;
    }

    /**
     * 真实姓名
     * @param $name
     * @return $this
     */
    public function trueName($name): IbankAccQueryAccountRequest
    {
        $this->paramsData['trueName'] = $name;
        return $this;
    }

    /**
     * 证件号
     * @param $idNo
     * @return $this
     */
    public function idNo($idNo): IbankAccQueryAccountRequest
    {
        $this->paramsData['idNo'] = $idNo;
        return $this;
    }

//    /**
//     * 证件类型
//     * @param string $type
//     * @return $this
//     */
//    public function idType(string $type = '1'): IbankAccQueryAccountRequest
//    {
//        $this->paramsData['idType'] = $type;
//        return $this;
//    }
}