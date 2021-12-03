<?php

namespace Xyz\Obp\Request;

use Xyz\Obp\Request\Traits\WithBusinessNo;
use Xyz\Obp\Request\Traits\WithInstance;

/**
 * otp短信验证码发送接口
 */
class CommonSendOtpRequest extends PublicRequest
{
    use WithBusinessNo, WithInstance;

    protected $method = 'obp-api-ibank.commonSendOtp';

    /**
     * 第三方id
     * @param $thirdId
     * @return $this
     */
    public function thirdId($thirdId): CommonSendOtpRequest
    {
        $this->paramsData['thirdId'] = $thirdId;
        return $this;
    }

    /**
     * OA：代表开户
     * TI001：代表代扣
     * BC001：代表转账
     * BC：绑卡
     * CM3：修改三类户手机号
     * RB：解除绑卡
     * CA：销户
     * RH: 去除半年无交易
     * @param $scene
     * @return $this
     */
    public function scene($scene): CommonSendOtpRequest
    {
        $this->paramsData['scene'] = $scene;
        return $this;
    }

    /**
     * 二、三类户卡号，开户场景不用填
     * @param $accountNo
     * @return $this
     */
    public function accountNo($accountNo): CommonSendOtpRequest
    {
        $this->paramsData['accountNo'] = $accountNo;
        return $this;
    }

    /**
     * 二、三类户卡号预留手机号，新手机号码。必须为绑定卡预留手机号码
     * @param $mobileNo
     * @return $this
     */
    public function mobileNo($mobileNo): CommonSendOtpRequest
    {
        $this->paramsData['mobileNo'] = $mobileNo;
        return $this;
    }

    /**
     *  必输，不同场景需要传的参数不一样
        OA开户、BC绑卡、CM3变更手机号：
        {
        "trueName":"客户姓名",
        "idNo":"证件号码",
        "idType":"证件类型",
        "bindCardNo":"绑卡卡号",
        "mobileNo":"绑定卡预留手机号码"
        }

        转账：
        {
        "fromAccountNo":"转出卡号（互联网账户卡号）",
        "toAccountNo":"收款方卡号（绑定卡卡号）",
        "amount":"转账金额",
        "fromAccountName":"转出户名",
        "accountName":"收款方户名"
        }

        TI代扣：
        {
        "idNo":"证件号码",
        "trueName":"客户姓名",
        "mobileNo":"预留手机号码",
        "fromAccNo":"扣款账号（绑定卡卡号）",
        "toAccNo":"收款账号（互联网账户卡号）",
        "transAmt":"交易金额"
        }

        RB解除绑卡：
        {
        "accountNo":"互联网账户卡号",
        "unBindCardNo":"解绑卡号",
        "trueName":"客户姓名",
        "idNo":"证件号码",
        "idType":"证件类型"
        }

        CA销户：
        {
        "accountNo":"互联网账户卡号"
        }

        RH去除半年无交易：
        {
        "trueName":"客户姓名",
        "idNo":"证件号码",
        "idType":"证件类型",
        "bindCardNo":"绑卡卡号",
        "mobileNo":"绑定卡预留手机号码"
        }
     * @param array $bizKeyArray
     * @return $this
     */
    public function bizKey(array $bizKeyArray = []): CommonSendOtpRequest
    {
        $this->paramsData['bizKey'] = json_encode($bizKeyArray, JSON_UNESCAPED_UNICODE);
        return $this;
    }
}