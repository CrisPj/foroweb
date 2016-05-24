<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */

class recuperarControl extends controlador_base
{
    function index()
    {
        $this->registro->template = new Template();
        $this->registro->template->mostrar('home/recuperar');
    }
}