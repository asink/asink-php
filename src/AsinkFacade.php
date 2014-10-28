<?php namespace Asink\Component;

use Illuminate\Support\Facades\Facade;

class AsinkFacade extends Facade
{
    /**
     * Get the binding in the IoC container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'asink';
    }
}
