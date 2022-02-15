<?php

namespace Driver;

interface DatabaseInterface
{
    public function query($query): StatementInterface;
}