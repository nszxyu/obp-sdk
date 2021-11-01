<?php

namespace Xyz\Obp\Util;

class Helper
{
    /**
     *  检查变量是否为空
     */
    public static function checkEmpty($value)
    {
        if (!isset($value))
            return true;
        if ($value === null)
            return true;
        if (trim($value) === "")
            return true;

        return false;
    }

    public static function generateRand(): string
    {
        return "0." . rand(0, 9999999).rand(0,9999999);
    }

    /**
     * 当前毫秒时间戳
     * @return int
     */
    public static function currentTimestamp(): int
    {
        return round(microtime(true) * 1000);
    }
}