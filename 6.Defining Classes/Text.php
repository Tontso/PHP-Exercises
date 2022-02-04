<?php

class Text
{
    private $chars;

    public function __construct (array $chars = [])
    {
        $this->chars = $chars;
    }

    public function substring(int $start, int $length = -1) : Text
    {
        $result = [];
        $start = max(0, $start);
        $start = min(count($this->chars), $start);

        if($length < 0 || $length >= count($this->chars)){
            $length = count($this->chars) - $start;
        }

        for ($i = $start; $i < $start + $length; $i++) { 
            $result = $this->chars[$i];
        }

        $substring = new Text($result);
        return $substring;

    }

    public function __toString() : string
    {
        $result = '';
        foreach($this->chars as $char){
            $result .= $char;
        }
        return $result;
    }
}


$name = new Text(['t','o','m','m','y','t']);
echo $name;
echo PHP_EOL;
$name->substring(3, 3);