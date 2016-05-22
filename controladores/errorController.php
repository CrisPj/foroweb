<?php

/**
 * Copyright (c) 2016 Cristian Perez
 */
include 'modelos/Categorias.php';
include 'modelos/Temas.php';
class errorControl extends controlador_base
{
    function index()
    {

        $this->registro->template = new Template($this->registro);

            $this->registro->template->mostrar('common/404');
    }
}