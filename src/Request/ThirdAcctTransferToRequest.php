<?php

namespace Xyz\Obp\Request;

use Xyz\Obp\Request\Traits\WithBusinessNo;
use Xyz\Obp\Request\Traits\WithIdNo;
use Xyz\Obp\Request\Traits\WithInstance;
use Xyz\Obp\Request\Traits\WithOtp;

/**
 * 充值
 */
class ThirdAcctTransferToRequest extends PublicRequest
{
    use WithBusinessNo, WithInstance, WithIdNo, WithOtp;

    protected $method = 'obp-api-ibank-acct.thirdAcctTransferTo';

    /**
     * 第三方id
     * @param $thirdId
     * @return $this
     */
    public function thirdId($thirdId): ThirdAcctTransferToRequest
    {
        $this->paramsData['thirdId'] = $thirdId;
        return $this;
    }

    /**
     * 收款方卡号
     * 即绑定卡卡号。测试环境请联系银行配置收款卡号（绑定卡卡号）。需要和OTP发送接口中bizKey中的toAccountNo的值一样。
     * @param $toAccountNo
     * @return $this
     */
    public function toAccountNo($toAccountNo): ThirdAcctTransferToRequest
    {
        $this->paramsData['toAccountNo'] = $toAccountNo;
        return $this;
    }

    /**
     * 收款方户名
     * 需要和OTP发送接口中bizKey中的accountName的值一样。
     * @param $accountName
     * @return $this
     */
    public function accountName($accountName): ThirdAcctTransferToRequest
    {
        $this->paramsData['accountName'] = $accountName;
        return $this;
    }

    /**
     * 发起方业务场景
     * 用商户号，即appId的值
     * @param $businessScene
     * @return $this
     */
    public function businessScene($businessScene): ThirdAcctTransferToRequest
    {
        $this->paramsData['businessScene'] = $businessScene;
        return $this;
    }


}