<?php
namespace RPC\Server;

use JsonRPC\Server as JsonRPCServer;
use \RPC\Contracts\Factory as FactoryContract;

class Factory implements FactoryContract
{
    /**
     * make a server instance by name.
     *
     * @param  string $name
     *
     * @return \RPC\Contracts\Client\Client
     */
    public function make($name = null)
    {
        $method = 'create' . studly_case($name) . 'Driver';
        if (is_null($name)) {
            $name = config('rpc.default');
        }
        $config = config('rpc.server.' . $name);
        return $this->$method($config);
    }
    
    public function createJsonDriver()
    {
        return new JsonRPCServer();
    }
}