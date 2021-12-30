<?php

namespace Xyz\Obp\Request;

use Xyz\Obp\Request\Traits\WithBusinessNo;
use Xyz\Obp\Request\Traits\WithIdNo;
use Xyz\Obp\Request\Traits\WithInstance;
use Xyz\Obp\Request\Traits\WithOtp;

/**
 * 充值
 */
class TransferInRequest extends PublicRequest
{
    use WithBusinessNo, WithInstance, WithIdNo, WithOtp;

    protected $method = 'obp-api-ibank-acct.commonTransferIn';

    /**
     * 第三方id
     * @param $thirdId
     * @return $this
     */
    public function thirdId($thirdId): TransferInRequest
    {
        $this->paramsData['thirdId'] = $thirdId;
        return $this;
    }


    /**
     * 扣款账号手机号
     * 必输，扣款账号手机号
     * @param $mobileNo
     * @return $this
     */
    public function mobileNo($mobileNo): TransferInRequest
    {
        $this->paramsData['mobileNo'] = $mobileNo;
        return $this;
    }

    /**
     * 扣款账号姓名
     * 必输，扣款账号姓名
     * @param $trueName
     * @return $this
     */
    public function trueName($trueName): TransferInRequest
    {
        $this->paramsData['trueName'] = $trueName;
        return $this;
    }

    /**
     * 扣款账号
     * 必输，扣款账号，即绑定卡卡号
     * @param $fromAccNo
     * @return $this
     */
    public function fromAccNo($fromAccNo): TransferInRequest
    {
        $this->paramsData['fromAccNo'] = $fromAccNo;
        return $this;
    }

    /**
     * 收款账号
     * 必输，收款账号，即二、三类户卡号
     * @param $toAccNo
     * @return $this
     */
    public function toAccNo($toAccNo): TransferInRequest
    {
        $this->paramsData['toAccNo'] = $toAccNo;
        return $this;
    }

    /**
     * 交易金额
     * 必输，交易金额。
     * @param $transAmt
     * @return $this
     */
    public function transAmt($transAmt): TransferInRequest
    {
        $this->paramsData['transAmt'] = $transAmt;
        return $this;
    }

    /**
     * 终端类型
     * 必输，终端类型01- PC 02- APP安卓 03- APP苹果 04- H5
     * @param $transChannelType
     * @return $this
     */
    public function transChannelType($transChannelType): TransferInRequest
    {
        $this->paramsData['transChannelType'] = $transChannelType;
        return $this;
    }

    /**
     * 备注
     * 非必输，备注
     * @param $transRemark
     * @return $this
     */
    public function transRemark($transRemark): TransferInRequest
    {
        $this->paramsData['transRemark'] = $transRemark;
        return $this;
    }

}