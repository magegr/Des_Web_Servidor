<?php

namespace AP51\Views;

class ProductView
{
    const HTML = __DIR__ . '/../../public/assets/Products.html';


    public function render($products): void
    {
        require_once self::HTML;
    }
}