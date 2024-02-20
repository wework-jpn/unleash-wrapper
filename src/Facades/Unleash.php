<?php

namespace UnleashWrapper\Facades;

use Illuminate\Support\Facades\Facade;

class Unleash extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Unleash\Client\Unleash::class;
    }

    public static function isEnabled($featureName, $context = null, $default = false)
    {
        return static::getFacadeRoot()->isEnabled($featureName, $context, $default);
    }
}
