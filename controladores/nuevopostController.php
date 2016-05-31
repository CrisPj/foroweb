<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */

class nuevopostControl extends controlador_base
{
    function index()
    {
        $template = new Template();
        $template->mostrar('common/nuevo_post');
    }
}