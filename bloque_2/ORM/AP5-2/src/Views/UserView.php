<?php

namespace AP52\Views;

class UserView
{
    const HTML = __DIR__ . '/../../public/assets/User.html';

    public function render($users)
    {
        require_once self::HTML;
    }
}