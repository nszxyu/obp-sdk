<?php

namespace Xyz\Obp\Request;

use Xyz\Obp\Request\Traits\WithBusinessNo;
use Xyz\Obp\Request\Traits\WithInstance;

/**
 * 三类户开户
 */
class OpenThirdAcctRequest extends PublicRequest
{
    use WithBusinessNo, WithInstance;

    protected $method = 'obp-api-ibank-acct.openThirdAcct';

    /**
     * 第三方id
     * @param $thirdId
     * @return $this
     */
    public function thirdId($thirdId): OpenThirdAcctRequest
    {
        $this->paramsData['thirdId'] = $thirdId;
        return $this;
    }

    /**
     * 姓名
     * 需要和OTP发送接口中bizKey中的trueName的值一样。
     * @param $name
     * @return $this
     */
    public function trueName($name): OpenThirdAcctRequest
    {
        $this->paramsData['trueName'] = $name;
        return $this;
    }

    /**
     * 证件号码
     * 必须为二代身份证号码，必须为18位，字母X必须大写。需要和OTP发送接口中bizKey中的idNo的值一样。
     * @param $idNo
     * @return $this
     */
    public function idNo($idNo): OpenThirdAcctRequest
    {
        $this->paramsData['idNo'] = $idNo;
        return $this;
    }

    /**
     * 证件类型
     * 1：身份证，暂时只支持身份证
     * @param string $type
     * @return $this
     */
    public function idType(string $type = '1'): OpenThirdAcctRequest
    {
        $this->paramsData['idType'] = $type;
        return $this;
    }

    /**
     * 手机号
     * 必须为待绑定的银行卡号的预留手机号码。需要和OTP发送接口中bizKey中的mobileNo的值一样。
     * @param string $mobileNo
     * @return $this
     */
    public function mobileNo(string $mobileNo): OpenThirdAcctRequest
    {
        $this->paramsData['mobileNo'] = $mobileNo;
        return $this;
    }

    /**
     * 待绑定的银行卡号
     * 需要和OTP发送接口中bizKey中的bindCardNo的值一样
     * @param string $bindCardNo
     * @return $this
     */
    public function bindCardNo(string $bindCardNo): OpenThirdAcctRequest
    {
        $this->paramsData['bindCardNo'] = $bindCardNo;
        return $this;
    }

    /**
     * 场景号
     * 必输，固定值：OA。代表开户
     * @param string $scene
     * @return $this
     */
    public function scene(string $scene = 'OA'): OpenThirdAcctRequest
    {
        $this->paramsData['scene'] = $scene;
        return $this;
    }

    /**
     * OTP流水号
     * OTP短信验证码发送接口返回的OTP订单号
     * @param string $otpOrderNo
     * @return $this
     */
    public function otpOrderNo(string $otpOrderNo): OpenThirdAcctRequest
    {
        $this->paramsData['otpOrderNo'] = $otpOrderNo;
        return $this;
    }

    /**
     * 短信验证码
     * 生产环境会发送到用户手机上，测试环境短信验证码查询地址（登录账号和密码待银行分配）：https://test-b-fat.pingan.com.cn/bbc/otp/index.html
     * @param string $otpValue
     * @return $this
     */
    public function otpValue(string $otpValue): OpenThirdAcctRequest
    {
        $this->paramsData['otpValue'] = $otpValue;
        return $this;
    }

    /**
     * 开户渠道类型
     * 默认值填：07，非银行第三方渠道
     * @param string $openChannelType
     * @return $this
     */
    public function openChannelType(string $openChannelType = '07'): OpenThirdAcctRequest
    {
        $this->paramsData['openChannelType'] = $openChannelType;
        return $this;
    }

    /**
     * 是否授权客户信息给到平安集团使用
     * 1：同意授权给到平安集团使用客户信息；0：不同意授权给到平安集团使用客户信息
     * @param string $enableAuthorization
     * @return $this
     */
    public function enableAuthorization(string $enableAuthorization = '1'): OpenThirdAcctRequest
    {
        $this->paramsData['enableAuthorization'] = $enableAuthorization;
        return $this;
    }

    /**
     * 终端类型
     * PC、IOS、Android、HTML5
     * @param string $terminalType
     * @return $this
     */
    public function terminalType(string $terminalType = 'PC'): OpenThirdAcctRequest
    {
        $this->paramsData['terminalType'] = $terminalType;
        return $this;
    }

    /**
     * 交易发起应用名称
     * 必输，用户申请开户时发起交易所的应程序（或渠道）名称，该域由发起应用类型、具体应用名称两部分组成 ，格式为“发起应用类型”（2位前缀）+“具体应用名称”(某某公司某某应用程序名称）。其中：
        1、“发起应用类型”为2字节，取值及含义如下：
        00 ：缺省渠道
        01 ：手机APP
        02 ：网上银行软件版
        03 ：网上银行页版
        04 ：小程序
        05 ：公众号
        2、“具体应用名称”为发起应用程序或渠道对户展示的名称，最长 38 字节。
        示例值：01某某公司某某APP、04某某公司某某小程序
     * @param string $appName
     * @return $this
     */
    public function appName(string $appName): OpenThirdAcctRequest
    {
        $this->paramsData['appName'] = $appName;
        return $this;
    }

    /**
     * 调用方IP
     * 必填，IP地址
     * @param string $sourceIP
     * @return $this
     */
    public function sourceIP(string $sourceIP): OpenThirdAcctRequest
    {
        $this->paramsData['sourceIP'] = $sourceIP;
        return $this;
    }

    /**
     * IP版本号
     *  04：IPV4
        06：IPV6
     * @param string $ipType
     * @return $this
     */
    public function ipType(string $ipType = '04'): OpenThirdAcctRequest
    {
        $this->paramsData['ipType'] = $ipType;
        return $this;
    }

    /**
     * 桌面系统采集硬盘序列号（监管需要）
     * 安卓系统采集IMEI、IOS系统采集IDFV
     * @param string $deviceId
     * @return $this
     */
    public function deviceId(string $deviceId): OpenThirdAcctRequest
    {
        $this->paramsData['deviceId'] = $deviceId;
        return $this;
    }

    /**
     * 设备类型（监管需要）
     *  1：手机
        2：平板
        3：手表
        4：PC
        0：其他
     * @param string $deviceType
     * @return $this
     */
    public function deviceType(string $deviceType): OpenThirdAcctRequest
    {
        $this->paramsData['deviceType'] = $deviceType;
        return $this;
    }

    /**
     * 交易报文采集持卡人使用手机支付时所设备的手机号（监管需要）
     * 格式要求：遵守E.164 E.164 要求例如：国家代码 -手机号码 +14168362570、+86137xxxxxxxx
     * @param string $fullDeviceNumber
     * @return $this
     */
    public function fullDeviceNumber(string $fullDeviceNumber): OpenThirdAcctRequest
    {
        $this->paramsData['fullDeviceNumber'] = $fullDeviceNumber;
        return $this;
    }

    /**
     * 可以采集到的设备型号（监管需要）
     * 如 iPhone， Sagit( 小 米 6) ，MT -TL00（华为 Mate7）等
     * @param string $deviceName
     * @return $this
     */
    public function deviceName(string $deviceName): OpenThirdAcctRequest
    {
        $this->paramsData['deviceName'] = $deviceName;
        return $this;
    }

    /**
     * 经纬度（监管需要）
     * 经纬度，格式为纬度/经度，+表示北纬、东经，-表示南纬、西经。小数点后保留两位。举例：+37.12/121.23，37.12/-121.23
     * @param string $lbs
     * @return $this
     */
    public function lbs(string $lbs): OpenThirdAcctRequest
    {
        $this->paramsData['lbs'] = $lbs;
        return $this;
    }

    /**
     * SIM卡张数（监管需要）
     *  0：未插SIM卡
        1：1张SIM卡
        2：2张SIM卡
        3：其他
     * @param string $simCardCount
     * @return $this
     */
    public function simCardCount(string $simCardCount): OpenThirdAcctRequest
    {
        $this->paramsData['simCardCount'] = $simCardCount;
        return $this;
    }

    /**
     * MAC地址（监管需要）
     * 例如：00-23-5A-15-99-42，格式要求：每2位之间用 -连接
     * @param string $macAddr
     * @return $this
     */
    public function macAddr(string $macAddr): OpenThirdAcctRequest
    {
        $this->paramsData['macAddr'] = $macAddr;
        return $this;
    }


}