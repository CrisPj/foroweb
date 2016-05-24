<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */
include 'modelos/Usuario.php';
class editardatosControl extends controlador_base
{
    function index()
    {
        $this->registro->template = new Template();
        if (isset($_SESSION['email']))
        {
            $email = $_SESSION['email'];
            $datos = Usuario::obtenerDatos($email);
            var_dump($datos);
            $this->registro->template->datos = array("nombre"=>"datos","valores"=>$datos);
            $this->registro->template->mostrar('home/editardatos');
        }
    }
}