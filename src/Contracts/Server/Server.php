<?php

namespace RPC\Contracts\Server;

interface Server
{
    /**
     * Add a RPC server method
     *
     * @param $exportMethodName
     * @param $className
     * @param $methodName
     *
     * @return mixed
     */
//    public function add($exportMethodName, $className = null, $methodName = null);
    
    /**
     * Add a RPC server class by an instance
     *
     * @param $object
     *
     * @return mixed
     */
    public function addObject($object);
    
    /**
     * Add a RPC server class by a class
     *
     * @param string $className
     *
     * @return mixed
     */
    public function addClass(string $className);
    
    /**
     * Add a RPC server method by a function
     *
     * @param $exportMethodName
     * @param $func
     *
     * @return mixed
     */
    public function addCallback($exportMethodName, $func);
    
    /**
     * Add a RPC server method by class and method
     *
     * @param $exportMethodName
     * @param $className
     * @param $methodName
     *
     * @return mixed
     */
    public function addClassAndMethod($exportMethodName, $className, $methodName);
    
    /**
     * Execute to start server
     *
     * @return mixed
     */
    public function execute();
}