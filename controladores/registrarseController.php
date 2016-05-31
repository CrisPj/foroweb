<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */

class registrarseControl extends controlador_base
{
    function index()
    {
        $template = new Template();
        $template->mostrar('home/datosNuevo');
    }
}