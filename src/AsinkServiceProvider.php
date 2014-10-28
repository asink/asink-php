<?php namespace Asink\Component;

use Illuminate\Support\ServiceProvider;

class AsinkServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('asink', function()
        {
            return new Client;
        });
    }
}
