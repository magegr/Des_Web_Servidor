<?php

namespace AP52\Views;

class FormServerView
{
    const HTML = __DIR__ . '/../../public/assets/FormServers.html';


    public function render(bool $update, $server): void
    {
        require_once self::HTML;
    }
}