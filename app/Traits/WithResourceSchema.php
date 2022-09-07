<?php

namespace App\Traits;

trait WithResourceSchema
{
    public static function jsonSchema($except = [], $append = []):array
    {
        $keys = static::JSON_SCHEMA ?? [];
        $withoutExcepted = array_filter($keys, function ($key) use ($except) {
            return ! in_array($key, $except);
        });

        return array_merge($withoutExcepted, $append);
    }
}
