<?php
namespace RPC\Contracts\Client;

interface Client
{
    /**
     * Execute a RPC server method
     *
     * @param  string $method
     * @param  array  $parameters
     * @return mixed
     */
    public function execute($method, $parameters);
    
    /**
     * Use __call to execute a RPC server method
     *
     * @param  string $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters);
}