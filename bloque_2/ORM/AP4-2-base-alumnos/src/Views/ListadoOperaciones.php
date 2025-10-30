<?php

namespace AP42\Views;

use AP42\Entity\Operation;


class ListadoOperaciones
{
    const HTML = __DIR__ . '/../../public/assets/Operaciones.html';

    /**
     * Renderiza la vista de usuarios.
     * @param Operation[]|null $Operation
     * @return void
     */
    public function render(array $Operation = []): void
    {
        require_once self::HTML;
    }

}