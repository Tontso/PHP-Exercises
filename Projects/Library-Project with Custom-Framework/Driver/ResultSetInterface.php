<?php

namespace Driver;;

interface ResultSetInterface
{
    public function fetch($className = null) : \Generator;
}