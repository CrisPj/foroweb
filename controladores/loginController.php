<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */

class loginControl extends controlador_base
{
    function index()
    {
        $this->registro->template = new Template($this->registro);
        $this->registro->template->mostrar('home/login');
    }
}