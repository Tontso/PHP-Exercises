<?php

namespace Controllers;

use ViewEngine\ViewInterface;

class Home
{

    public function home(ViewInterface $view)
    {
        $view->render();
    }
}