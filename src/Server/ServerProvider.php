<?php
namespace RPC\Server;

use Illuminate\Support\ServiceProvider;

class ServerProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->alias(Client::class, 'rpc.server');
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
        
        $this->app->singleton(Server::class, function () {
            return new Server();
        });
    }
}