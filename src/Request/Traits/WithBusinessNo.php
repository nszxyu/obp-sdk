<?php

namespace Xyz\Obp\Request\Traits;

trait WithBusinessNo
{
    /**
     * 业务流水号
     * @param string $businessNo
     * @return $this
     */
    public function businessNo(string $businessNo = ''){
        if($businessNo == ''){
            $businessNo = $this->generateBusinessNo();
        }
        $this->paramsData['businessNo'] = $businessNo;
        return $this;
    }
}