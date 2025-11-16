<?php

namespace AP52\Views;

class  FormConnectionView
{
    const HTML = __DIR__ . '/../../public/assets/FormConnection.html';

    public function render(array $users, array $servers)
    {
        require_once self::HTML;
    }
}