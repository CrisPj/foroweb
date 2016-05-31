<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */

class loginControl extends controlador_base
{
    function index()
    {
        $template = new Template();
        if (isset($_GET['mensaje']))
        {
            $template->bien = array("nombre"=>"bien","valores"=>$_GET['mensaje']);
        }
        $template->mostrar('home/login');
    }
}