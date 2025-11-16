<?php

namespace AP51\Views;

class ProductFormview
{

    const HTML = __DIR__ . '/../../public/assets/FormProducts.html';


    public function render(bool $update, $product): void
    {
        require_once self::HTML;
    }
}