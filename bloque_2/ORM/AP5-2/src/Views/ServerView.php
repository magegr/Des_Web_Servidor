<?php

namespace AP52\Views;

class ServerView
{
    const HTML = __DIR__ . '/../../public/assets/Server.html';

    public function render($Servers)
    {
        require_once self::HTML;
    }
}