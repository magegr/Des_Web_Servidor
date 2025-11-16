<?php

namespace AP51\Views;

class ProductDeleteview
{
    const HTML = __DIR__ . '/../../public/assets/DeleteProducts.html';

    public function render($products, $error = ""): void
    {
        require_once self::HTML;
    }
}