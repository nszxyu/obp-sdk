# 环境要求
* 要求PHP７+,64位

### RSA加签验签、AES加密解密
* 要求打开openssl扩展
### SM2加签验签、SM4加密解密
* 要求打开gmp扩展
* 该算法直接使用 https://github.com/lpilp/phpsm2sm3sm4, 稍做修改

### 调用示例
* 详见test/http_test.php
```
//引入
require_once ROOT_PATH."obpsdk.class.php";

//组装数据
$arrParam = array(
    //网关地址
    "gatewayUrl" => "https://openapi-test.pingan.com.cn/obp/api/gateway.do",
    //应用ID
    "appId" => "fd93a3b5da",
    //请求接口
    "method" => "obp-api-ibank-aum.getFundPrdInfo",
    //签名类型
    "signType" => "SM2",
    //加密类型
    "encryptType" => "SM4",
    //应用私钥（开发者中心-》零售应用中心-》开发设置-》接口加签方式-》修改-》“平安银行在线密钥生成器”生成的私钥）
    "appPrivateKey" => "00856CC78FC42959D010D39FA801D6ED460D4A7DB145AACAACD4E7719DC8A2F7AB",
    //密钥（开发者中心-》零售应用中心-》开发设置-》银行密钥管理-》修改-》密钥）
    "encryptKey" => "51949f0dd1c3cf5aa948eaa4a786227c",
    //银行公钥（开发者中心-》零售应用中心-》开发设置-》银行密钥管理-》修改-》银行公钥）
    "bankPublicKey" => "C7C45BC918F2632D51F57CFEAA865443762E7E2E6B41C493B43A689369A8055566A3480B8B56DE8AB09276278417BAF75313E4B15486A831C96C4EADFD8A3F1D",
    //业务参数
    "paramsData" => array(
        "prdCode" => "OB00o4320oyhdu20210303104855"
    )
);
$os = new ObpSdk($arrParam);
//执行
$result = $os->exec();
```
### 上传文件
* 1、先通过接口获取影像上传token，详见/test/http_test_wefileid.php
  *返回示例
```

{
    "bizMsg":"获取上传影像token成功",
    "bizCode":"000000",
    "project":"BOBS-OBP",
    "wefileToken":"cvBffHwOAr+NIRAOQMeqCLXA89j3jh4vL1tekTiC/O5/18tF4kI4hxfvke/NfH5tYy/cL33nKtLcfpml3iradp0dnxjF8D6SvlgPIjGvR7GPnvlzl/RYeFc8DH8swY9KFUiRvn8mJ1RlTRkWz8APczKettF2Q6NBV6mMJiqEDziwMbg3Qs1KGOWZPZ5cqEglCJo//JN67q1D7sDNacnakn4Yc114/pqJNAcF3Rn6UXEXS/501Taw2fjZbSzFNvYgra5I25T2uByc0ustz1M4bvW+QyfMR1tBQmCVQKZZwerNKqC29bM3Bq2RE34A4zIMJddye5YTUwoeHSCWftfX1Q==",
    "wefileUrl":"https://bfiles-stg.pingan.com.cn/brcp/secfile/sec_wefiles_udmp_upload.do",
    "uuid":"f0d073a9e30d4ffeb71ade6850e8998d",
    "expiredTime":"1626246095289",
    "responseMsg":"成功",
    "responseCode":"000000"
}
```
* 2、替换对应参数，详见/test/file_upload.php
  *正确返回示例
```
{
	"responseCode": "000000",
	"responseMsg": "success",
	"requestId": "J0NgZp48VGBF9s6B",
	"data": {
		"fileSize": "9728",
		"docId": "UDMP-e74b56c5a4569f8db0463d039cf892fb8fa865b8f2-f5ca0e93-20210714065510-00000001",
		"isCover": "1",
		"fileId": "F27f304c2746d418f9827cfa8713597e3"
	}
}
```
