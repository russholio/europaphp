<?php

namespace Test\All\Module;
use Europa\App\AppConfiguration;
use Europa\Di\ServiceContainer;
use Europa\Module\Manager;
use Europa\Module\Module;
use Exception;
use Testes\Test\UnitAbstract;

class ModuleTest extends UnitAbstract
{
    private $container;

    private $manager;

    private $modulePath;

    public function setUp()
    {
        $this->container = new ServiceContainer;
        $this->container->configure(new AppConfiguration);

        $this->manager = new Manager($this->container);

        $this->modulePath = __DIR__ . '/../../../..';
    }

    public function requiringOtherModules()
    {
        $module = new Module($this->modulePath, [
            'requiredModules' => ['non-existent-module']
        ]);

        try {
            $module($this->manager);
            $this->assert(false, 'The module should have thrown an exception.');
        } catch (Exception $e) {
            
        }
    }

    public function requiringExtensions()
    {
        $module = new Module($this->modulePath, [
            'requiredExtensions' => ['non-existent-extension']
        ]);

        try {
            $module($this->manager);
            $this->assert(false, 'The module should have thrown an exception.');
        } catch (Exception $e) {
            
        }
    }

    public function requiringClasses()
    {
        $module = new Module($this->modulePath, [
            'requiredExtensions' => ['NonExistentClass']
        ]);

        try {
            $module($this->manager);
            $this->assert(false, 'The module should have thrown an exception.');
        } catch (Exception $e) {
            
        }
    }

    public function requiringFunctions()
    {
        $module = new Module($this->modulePath, [
            'requiredFunctions' => ['non_existent_function']
        ]);

        try {
            $module($this->manager);
            $this->assert(false, 'The module should have thrown an exception.');
        } catch (Exception $e) {
            
        }
    }
}