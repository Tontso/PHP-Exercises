<?php

namespace Repository\DataBinder;

interface DataBinderInterface
{
    public function bind($formData, $className);
    
}