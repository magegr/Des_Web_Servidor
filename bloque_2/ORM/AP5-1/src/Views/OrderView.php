<?php

namespace AP51\Views;

class OrderView
{
    const HTML = __DIR__ . '/../../public/assets/Order.html';


    public function render(array $Order = []): void
    {
        require_once self::HTML;
    }
}