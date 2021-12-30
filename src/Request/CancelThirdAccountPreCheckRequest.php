<?php

namespace Xyz\Obp\Request;

use Xyz\Obp\Request\Traits\WithBusinessNo;
use Xyz\Obp\Request\Traits\WithInstance;

/**
 * 销户前置校验
 */
class CancelThirdAccountPreCheckRequest extends PublicRequest
{
    use WithBusinessNo, WithInstance;

    protected $method = 'obp-api-ibank-acct.cancelThirdAccountPreCheck';

    /**
     * 第三方id
     * @param $thirdId
     * @return $this
     */
    public function thirdId($thirdId): CancelThirdAccountPreCheckRequest
    {
        $this->paramsData['thirdId'] = $thirdId;
        return $this;
    }

    /**
     * 待销户卡号
     * @param $accountNo
     * @return $this
     */
    public function accountNo($accountNo): CancelThirdAccountPreCheckRequest
    {
        $this->paramsData['accountNo'] = $accountNo;
        return $this;
    }
}