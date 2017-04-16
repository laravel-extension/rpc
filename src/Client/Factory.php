<?php
namespace RPC\Client;

use JsonRPC\Client as JsonRPCClient;
use \RPC\Contracts\Factory as FactoryContract;

class Factory implements FactoryContract
{
    /**
     * make a client instance by name.
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
        $config = config('rpc.client.' . $name);
//        $config['url'] = 'http://ww.baidu.com';
        return $this->$method($config);
    }
    
    public function createJsonDriver($config)
    {
        return new JsonRPCClient($config['url']);
    }
}