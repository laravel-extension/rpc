<?php

namespace RPC\Contracts;

interface Factory
{
    /**
     * make a client/server instance by name.
     *
     * @param  string  $name
     * @return mixed
     */
    public function make($name = null);
}