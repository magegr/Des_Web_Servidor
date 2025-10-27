<?php

namespace AP42\Controllers;

class MainController
{
    public function noRuta(): void
    {
        $vista = new MainView();
        $vista->error();
    }
}