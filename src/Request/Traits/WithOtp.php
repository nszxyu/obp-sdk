<?php

namespace Xyz\Obp\Request\Traits;

trait WithOtp
{
    /**
     * OTP订单号
     * 发OTP接口返回的OTP订单号
     * @param $otpOrderNo
     * @return $this
     */
    public function otpOrderNo($otpOrderNo)
    {
        $this->paramsData['otpOrderNo'] = $otpOrderNo;
        return $this;
    }

    /**
     * 短信验证码
     * @param $otpValue
     * @return $this
     */
    public function otpValue($otpValue)
    {
        $this->paramsData['otpValue'] = $otpValue;
        return $this;
    }
}