<?php

namespace AP52\Views;

class ConnectionView
{
    const HTML = __DIR__ . '/../../public/assets/Connection.html';

    public function render($connection)
    {
        require_once self::HTML;
    }
}