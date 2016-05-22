<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */

include 'modelos/Usuario.php';
class registronuevoControl extends controlador_base
{
    function index()
    {
        var_dump($_POST);
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            $user = $_POST['user'];
            $password = $_POST['password'];
            $rpassword = $_POST['rpassword'];

            if ($password == $rpassword)
            {
                Usuario::crearNuevo($user,$email, $password);
            }
        }

        $this->registro->template = new Template($this->registro);
            $this->registro->template->mostrar('home/index');
    }
}