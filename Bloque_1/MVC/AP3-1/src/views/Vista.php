<?php
class View {
        public function mostrar($datos) {
            foreach ($datos as $dato) {
                echo $dato;
            }
        }
}
