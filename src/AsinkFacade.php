<?php namespace Asink\Component;

/**
 * asink-php v0.0.1-dev
 *
 *
 * (c) Ground Six
 *
 * @package asink-php
 * @version 0.0.1-dev
 *
 * @author Harry Lawrence <http://github.com/hazbo>
 *
 * Supported for Asink v0.1.1
 *
 * License: MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
