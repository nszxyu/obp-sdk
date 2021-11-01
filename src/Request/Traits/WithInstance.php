<?php

namespace Xyz\Obp\Request\Traits;

trait WithInstance
{
    public static function instance(){
        return new self();
    }
}