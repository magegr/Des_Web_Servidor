<?php

namespace AP52\Views;

class DeleteUserView
{
    const HTML = __DIR__ . '/../../public/assets/DeleteUsers.html';

    public function render($user, ?string $error = null): void
    {
        require_once self::HTML;
    }
}