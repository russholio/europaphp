<?php

namespace Europa\App;

/**
 * Allows multiple bootstrappers to be chained together.
 * 
 * @category App
 * @package  Europa
 * @author   Trey Shugart <treshugart@gmail.com>
 * @license  Copyright (c) 2011 Trey Shugart http://europaphp.org/license
 */
class BootChain implements BootstrapperInterface
{
    /**
     * The chain of bootstrappers to boot with.
     * 
     * @var array
     */
    private $boots = [];
    
    /**
     * Adds a bootstrapper to the chain.
     * 
     * @param BootInterface $boot The bootstrapper to add.
     * 
     * @return BootChain
     */
    public function add(BootInterface $boot)
    {
        $this->boots[] = $boot;
        return $this;
    }
    
    /**
     * Bootstraps the app.
     * 
     * @return BootInterface
     */
    public function boot()
    {
        foreach ($this->boots as $boot) {
            $boot->boot();
        }
        return $this;
    }
}