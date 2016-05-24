<?php

/**
 * Copyright (c) 2016 Cristian Perez
 */
include 'modelos/Usuario.php';
class misdatosControl extends controlador_base
{
    function index()
    {
        $this->registro->template = new Template($this->registro);
        if (isset($_SESSION['email']))
        {
            $email = $_SESSION['email'];
            $datos = Usuario::obtenerDatos($email);
            var_dump($datos);
            $this->registro->template->datos = array("nombre"=>"datos","valores"=>$datos);
            $this->registro->template->mostrar("common/datos");
        }
    }
}