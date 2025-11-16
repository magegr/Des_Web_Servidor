<?php

namespace AP52\Views;

class DeleteServerView
{
    const HTML = __DIR__ . '/../../public/assets/DeleteServer.html';

    public function render($server, $error = ""): void
    {
        require_once self::HTML;
    }
}