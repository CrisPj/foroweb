<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */
class configControl extends controlador_base
{
    function index()
    {
        $this->registro->template = new Template();
        $this->registro->template->mostrar("common/password");
    }
}