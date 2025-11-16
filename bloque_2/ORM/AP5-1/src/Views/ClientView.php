<?php

namespace AP51\Views;

use AP51\Entity\Client;

class ClientView
{
    const HTML = __DIR__ . '/../../public/assets/Client.html';


    public function render(array $Customer = []): void
    {
        require_once self::HTML;
    }
}