<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */
include 'modelos/Usuario.php';
class editardatosControl extends controlador_base
{
    function index()
    {
        $template = new Template();
        if (isset($_SESSION['email']))
        {
            $email = $_SESSION['email'];
            $datos = Usuario::obtenerDatos($email);
            $template->datos = array("nombre"=>"datos","valores"=>$datos);
            $template->mostrar('home/editardatos');
        }
    }
}