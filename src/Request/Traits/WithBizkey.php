<?php

namespace Xyz\Obp\Request\Traits;

trait WithBizkey
{
    /**
     * @param array $bizKeyArray
     * @return $this
     */
    public function bizKey(array $bizKeyArray = [])
    {
        $this->paramsData['bizKey'] = json_encode($bizKeyArray, JSON_UNESCAPED_UNICODE);
        return $this;
    }
}