<?php

use Illuminate\Support\Facades\Facade;

class Timezones extends Facade
{
    /**
     * Get the registered name of the component 11.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Imenso\Timezones\Timezones';
    }
}
