<?php

namespace AP42\Controllers;

use AP42\Views\MainView;

class MainController
{
    public function noRuta(): void
    {
        $vista = new MainView();
        $vista->error();
    }
}