<?php

namespace AP51\Views;

use AP51\Entity\Orderdetail;

class OrderDetailView
{
    const HTML = __DIR__ . '/../../public/assets/OrderDetail.html';

    public function render($details): void
    {
        require_once self::HTML;
    }
}