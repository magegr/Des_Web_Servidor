<?php

namespace AP52\Views;


class FormUserView
{
    const HTML = __DIR__ . '/../../public/assets/FormUsers.html';

    public function render(bool $update, $user)
    {
        require_once self::HTML;
    }
}