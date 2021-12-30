<?php

namespace Xyz\Obp\Request\Traits;

use Xyz\Obp\Request\TransferInRequest;

trait WithIdNo
{
    /**
     * 扣款账号证件号
     * 必输，扣款账号证件号
     * @param $idNo
     * @return $this
     */
    public function idNo($idNo): TransferInRequest
    {
        $this->paramsData['idNo'] = $idNo;
        return $this;
    }

    /**
     * 扣款账号证件类型
     * 必输，扣款账号证件类型（目前支持身份证"1"）
     * @param $idType
     * @return $this
     */
    public function idType($idType): TransferInRequest
    {
        $this->paramsData['idType'] = $idType;
        return $this;
    }
}