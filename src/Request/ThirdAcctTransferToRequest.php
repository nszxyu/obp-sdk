<?php

namespace Xyz\Obp\Request;

use Xyz\Obp\Request\Traits\WithBusinessNo;
use Xyz\Obp\Request\Traits\WithIdNo;
use Xyz\Obp\Request\Traits\WithInstance;
use Xyz\Obp\Request\Traits\WithOtp;

/**
 * 提现
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

    /**
     * 转账渠道
     * 填固定值：H5
     * @param $channelType
     * @return $this
     */
    public function channelType($channelType): ThirdAcctTransferToRequest
    {
        $this->paramsData['channelType'] = $channelType;
        return $this;
    }

    /**
     * 币种
     * 必填：RMB
     * @param $currType
     * @return $this
     */
    public function currType($currType): ThirdAcctTransferToRequest
    {
        $this->paramsData['currType'] = $currType;
        return $this;
    }

    /**
     * 重复转账确认
     * 必填。用于判断是否是重复转账。当天内有终态的，或者8天内是“处理中”状态的，同一个收款卡号第二次提现相同的金额时需要上送为Y。（当天内有终态的，或者8天内是“处理中”状态的，同一个转出卡号向同一个收款卡号转账相同金额时，如果需要继续转账，则上送Y，否则上送N。）。如果商户自己有防重复提交判断，则可以直接传Y。
     * @param $duplicateConfirmFlag
     * @return $this
     */
    public function duplicateConfirmFlag($duplicateConfirmFlag): ThirdAcctTransferToRequest
    {
        $this->paramsData['duplicateConfirmFlag'] = $duplicateConfirmFlag;
        return $this;
    }

    /**
     * 转账方式
     * 默认填：3，实时到账
     * @param $executeType
     * @return $this
     */
    public function executeType($executeType): ThirdAcctTransferToRequest
    {
        $this->paramsData['executeType'] = $executeType;
        return $this;
    }

    /**
     * 转账金额
     * 即提现金额，最多保留两位小数。需要和OTP发送接口中bizKey中的amount的值一样。
     * @param $amount
     * @return $this
     */
    public function amount($amount): ThirdAcctTransferToRequest
    {
        $this->paramsData['amount'] = $amount;
        return $this;
    }

    /**
     * 转出卡号
     * 需要和OTP发送接口中bizKey中的fromAccountNo的值一样。
     * @param $fromAccountNo
     * @return $this
     */
    public function fromAccountNo($fromAccountNo): ThirdAcctTransferToRequest
    {
        $this->paramsData['fromAccountNo'] = $fromAccountNo;
        return $this;
    }

    /**
     * 转出户名
     * 需要和OTP发送接口中bizKey中的fromAccountName的值一样。
     * @param $fromAccountName
     * @return $this
     */
    public function fromAccountName($fromAccountName): ThirdAcctTransferToRequest
    {
        $this->paramsData['fromAccountName'] = $fromAccountName;
        return $this;
    }

    /**
     * ip地址
     * @param $ipAddr
     * @return $this
     */
    public function ipAddr($ipAddr): ThirdAcctTransferToRequest
    {
        $this->paramsData['ipAddr'] = $ipAddr;
        return $this;
    }

    /**
     * 30w确认标识
     * 必填，转账超过30w时，填Y，否则填N。商户后端自己做逻辑判断
     * @param $limitConfirmFlag
     * @return $this
     */
    public function limitConfirmFlag($limitConfirmFlag): ThirdAcctTransferToRequest
    {
        $this->paramsData['limitConfirmFlag'] = $limitConfirmFlag;
        return $this;
    }


}