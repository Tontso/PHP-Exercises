<?php

namespace Core;

use Core\Mvc\MvcContextInterface;
use Reflection;
use ReflectionClass;
use ReflectionMethod;

class Application
{

    /**
     * @var MvcContext
     */
    private $mvcContext;

    /**
     * @var string[]
     */
    private $dependencies = [];

    /**
     * @var object[]
     */
    private $resolvedDependencies = [];

    public function __construct($mvcContext)
    {
        $this->mvcContext = $mvcContext;
        $this->dependencies[MvcContextInterface::class] = get_class($mvcContext);
        $this->resolvedDependencies[get_class($mvcContext)] = $mvcContext;
    }

    public function registerDependency(string $abstraction, string $implementation)
    {
        $this->dependencies[$abstraction] = $implementation;
    }


    public function start()
    {
        $controllerFullQualifiedName = "Controllers\\" . ucfirst($this->mvcContext->getControllerName());
        $controller = $this->resolve($controllerFullQualifiedName);

        $params = $this->mvcContext->getParams();

        $refMethod = new ReflectionMethod($controller, $this->mvcContext->getActionName());
        $refParams = $refMethod->getParameters();
        $count = count($this->mvcContext->getParams());
        for ($i = $count; $i < count($refParams); $i++) { 
            $argument = $refParams[$i];
            $argumentInterface = $argument->getClass()->getName();
            if(array_key_exists($argumentInterface, $this->dependencies)) {
                $argumentClass = $this->dependencies[$argumentInterface];
                $params[] = $this->resolve($argumentClass);
            } else {
                $bindingModel = new $argumentInterface;
                $this->bindData($_POST, $bindingModel);
                $params[] = $bindingModel;
            }
        }
        call_user_func_array([$controller, $this->mvcContext->getActionName()], $params);
    }

    public function resolve($className)
    {
        if(array_key_exists($className, $this->resolvedDependencies)){
            return $this->resolvedDependencies[$className];
        }
        $refClass = new ReflectionClass($className);
        $constructor = $refClass->getConstructor();
        if($constructor === null){
            $object = new $className;
            $this->resolvedDependencies[$className] = $object;
            return $object;
        } else {
            $parameters = $constructor->getParameters();
            $arguments = [];
            foreach($parameters as $parameter){
                $dependencyInterface = $parameter->getClass();
                $dependencyClass = $this->dependencies[$dependencyInterface->getName()];
                $arguments[] = $this->resolve($dependencyClass);
            }
            $object = $refClass->newInstanceArgs($arguments);
            $this->resolvedDependencies[$className] = $object;
            return $object;
        }
    }

    public function bindData(array $data, $object)
    {
        $refClass = new ReflectionClass($object);
        $fields = $refClass->getProperties();
        foreach ($fields as $field) {
            $field->setAccessible(true);
            if(array_key_exists($field->getName(), $data)) {
                $field->setValue($object, $data[$field->getName()]);
            }
        }
    }

    public function addBean(string $abstaction, $object)
    {
        $this->dependencies[$abstaction] = get_class($object);
        $this->resolvedDependencies[get_class($object)] = $object;
    }
}