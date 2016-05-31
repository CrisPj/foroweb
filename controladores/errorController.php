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
        $template = new Template();
        $template->mostrar('common/404');
    }
}