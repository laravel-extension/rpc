<?php
namespace RPC\Server;

use \RPC\Contracts\Server\Server as ServerContract;

class Server implements ServerContract
{
    public $server;
    
    public $handler;
    
    /**
     * Server constructor.
     *
     * @param null $name
     */
    public function __construct($name = null)
    {
        $this->server = app(Factory::class)->make($name);
        $this->handler = $this->server->getProcedureHandler();
    }
    /**
     * Add a RPC server class by an instance
     *
     * @param $object
     *
     * @return mixed
     */
    public function addObject($object)
    {
        return $this->handler->withObject($object);
    }
    
    /**
     * Add a RPC server class by a class
     *
     * @param string $className
     *
     * @return mixed
     */
    public function addClass(string $className)
    {
        $object = new $className;
        return $this->handler->withObject($object);
    }
    
    /**
     * Add a RPC server method by a function
     *
     * @param $exportMethodName
     * @param $func
     *
     * @return mixed
     */
    public function addCallback($exportMethodName, $func)
    {
        return $this->handler->withCallback($exportMethodName, $func);
    }
    
    /**
     * Add a RPC server method by class and method
     *
     * @param $exportMethodName
     * @param $className
     * @param $methodName
     *
     * @return mixed
     */
    public function addClassAndMethod($exportMethodName, $className, $methodName)
    {
        return $this->handler->withClassAndMethod($exportMethodName, $className, $methodName);
    }
    
    /**
     * Execute to start server
     *
     * @return mixed
     */
    public function execute()
    {
        return $this->server->execute();
    }
}