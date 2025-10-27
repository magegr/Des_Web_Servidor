<?php

namespace AP42\Views;

use AP42\Entity\User;

class ListadoUsuarios
{
    const HTML = __DIR__ . '/../../public/assets/Usuarios.html';

    /**
     * Renderiza la vista de usuarios.
     * @param User[]|null $User //lo he tenido que cambiar porque yo le paso un array
     * @return void
     */
    public function render(array $User = []): void //aqui igual $user es un array no un objeto por eso he tenido que especificar que es un array
    {
        require_once self::HTML;
    }

}