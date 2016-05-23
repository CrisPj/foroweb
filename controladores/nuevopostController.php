<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */

class nuevopostControl extends controlador_base
{
    function index()
    {

        $this->registro->template = new Template($this->registro);
            $this->registro->template->mostrar('common/nuevo_post');
    }
}