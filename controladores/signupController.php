<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */

class signupControl extends controlador_base
{
    function index()
    {
        $this->registro->template = new Template($this->registro);
        $this->registro->template->mostrar('home/registrar');
    }
}