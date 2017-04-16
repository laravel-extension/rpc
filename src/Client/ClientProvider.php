<?php
namespace RPC\Client;

use Illuminate\Support\ServiceProvider;

class ClientProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->alias(Client::class, 'rpc.client');
    }
    
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Factory::class, function () {
            return new Factory();
        });
        
        $this->app->singleton(Client::class, function () {
            return new Client();
        });
    }
}