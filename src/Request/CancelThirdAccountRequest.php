<?php

namespace Xyz\Obp\Request;

use Xyz\Obp\Request\Traits\WithBusinessNo;
use Xyz\Obp\Request\Traits\WithIdNo;
use Xyz\Obp\Request\Traits\WithInstance;

/**
 * 销户
 */
class CancelThirdAccountRequest extends PublicRequest
{
    use WithBusinessNo, WithInstance, WithIdNo;

    protected $method = 'obp-api-ibank-acct.cancelThirdAccount';

    /**
     * 第三方id
     * @param $thirdId
     * @return $this
     */
    public function thirdId($thirdId): CancelThirdAccountRequest
    {
        $this->paramsData['thirdId'] = $thirdId;
        return $this;
    }

    /**
     * 客户姓名
     * @param $customerName
     * @return $this
     */
    public function customerName($customerName): CancelThirdAccountRequest
    {
        $this->paramsData['customerName'] = $customerName;
        return $this;
    }

    /**
     * 互联网账户卡号
     * @param $accountNo
     * @return $this
     */
    public function accountNo($accountNo): CancelThirdAccountRequest
    {
        $this->paramsData['accountNo'] = $accountNo;
        return $this;
    }

    /**
     * 绑定卡卡号
     * 三类户（accountNo）的绑定卡卡号。即待结息收款卡号。有结转利息且不放弃利息时必输，且是待销户卡的绑定借记卡
     * @param $bindCardNo
     * @return $this
     */
    public function bindCardNo($bindCardNo): CancelThirdAccountRequest
    {
        $this->paramsData['bindCardNo'] = $bindCardNo;
        return $this;
    }

    /**
     * 是否有智能还款，继续销户
     * 是否有智能还款，继续销户 (1-是，0或其他-否)
     * @param $smartRepayFlag
     * @return $this
     */
    public function smartRepayFlag($smartRepayFlag): CancelThirdAccountRequest
    {
        $this->paramsData['smartRepayFlag'] = $smartRepayFlag;
        return $this;
    }

    /**
     * 场景号
     * 销户填固定值：CA
     * @param $scene
     * @return $this
     */
    public function scene($scene): CancelThirdAccountRequest
    {
        $this->paramsData['scene'] = $scene;
        return $this;
    }

    /**
     * OTP订单号
     * OTP短信验证码发送接口返回的OTP订单号
     * @param $otpOrderNo
     * @return $this
     */
    public function otpOrderNo($otpOrderNo): CancelThirdAccountRequest
    {
        $this->paramsData['otpOrderNo'] = $otpOrderNo;
        return $this;
    }

    /**
     * 短信验证码
     * 验证码发送到新手机号码上
     * @param $otpValue
     * @return $this
     */
    public function otpValue($otpValue): CancelThirdAccountRequest
    {
        $this->paramsData['otpValue'] = $otpValue;
        return $this;
    }
}