<?php
namespace RPC\Client;

use \RPC\Contracts\Client\Client as ClientContract;

class Client implements ClientContract
{
    /**
     * A real RPC client
     * @var
     */
    public $client;
    
    /**
     * Client constructor.
     *
     * @param null $name
     */
    public function __construct($name = null)
    {
        $this->client = app(Factory::class)->make($name);
    }
    
    /**
     * Execute a RPC server method
     *
     * @param  string $method
     * @param  array  $parameters
     *
     * @return mixed
     */
    public function execute($method, $parameters)
    {
        return call_user_func_array([$this->client, $method], $parameters);
    }
    
    /**
     * Use __call to execute a RPC server method
     *
     * @param  string $method
     * @param  array  $parameters
     *
     * @return mixed
     */
    public function __call($method, $parameters = null)
    {
        $this->execute($method, $parameters);
    }
}