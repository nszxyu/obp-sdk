<?php

namespace Xyz\Obp\Request;

use Xyz\Obp\Request\Traits\WithBizkey;
use Xyz\Obp\Request\Traits\WithBusinessNo;
use Xyz\Obp\Request\Traits\WithInstance;

/**
 * 通用请求
 */
class CommonRequest extends PublicRequest
{
    use WithBusinessNo, WithInstance, WithBizkey;

    protected $method = '';

    public function __construct($method)
    {
        $this->method = $method;
    }

}