<?php

namespace Core\Mvc;

class MvcContext implements MvcContextInterface
{
    private $controllerName;
    private $actionName;
    private $params = [];

    public function __construct(string $controllerName, string $actionName, array $param)
    {
        $this->controllerName = $controllerName;
        $this->actionName = $actionName;
        $this->params = $param;
    }


    public function getControllerName(): ?string
    {
        return $this->controllerName;
    }

    public function getActionName(): ?string
    {
        return $this->actionName;
    }

    public function getParams(): ?array
    {
        return $this->params;
    }


    /**
     * Set the value of params
     *
     * @return  self
     */ 
    public function setParams($params)
    {
        $this->params = $params;

        return $this;
    }
}