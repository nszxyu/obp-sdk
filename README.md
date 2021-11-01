# 环境要求
* 要求PHP７+,64位

### RSA加签验签、AES加密解密
* 要求打开openssl扩展
### SM2加签验签、SM4加密解密
* 要求打开gmp扩展
* 该算法直接使用 https://github.com/lpilp/phpsm2sm3sm4, 稍做修改

### 引入

`composer require nszxyu/obp-sdk`

### 调用demo
```
//组装数据
$arrParam = array(
    //应用ID
    "app_id" => "",
    //应用私钥（开发者中心-》零售应用中心-》开发设置-》接口加签方式-》修改-》“平安银行在线密钥生成器”生成的私钥）
    "app_private_key" => "",
    //密钥（开发者中心-》零售应用中心-》开发设置-》银行密钥管理-》修改-》密钥）
    "encrypt_key" => "",
    //银行公钥（开发者中心-》零售应用中心-》开发设置-》银行密钥管理-》修改-》银行公钥）
    "bank_public_key" => "",
);

try {
    $config = Config::load($arrParam);
    $request = IbankAccQueryAccountRequest::instance()
        ->config($config)
        ->businessNo()
        ->thirdId('')
        ->accountType('3')
        ->trueName('')
        ->idNo('')
        ->idType('1');

    $response = ObpSdk::get($config)->exec($request);
} catch (ObpException $e) {

}
