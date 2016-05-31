<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */

include 'modelos/Usuario.php';
class registronuevoControl extends controlador_base
{
    function index()
    {
        if (isset($_POST['email']))
        {
            $email = $_POST['email'];
            $user = $_POST['user'];
            $password = $_POST['password'];
            $rpassword = $_POST['rpassword'];

            if ($password == $rpassword)
            {
                Usuario::crearNuevo($user,$email, $password);
            }
        }
        header('Location: index.php?login&mensaje="Cuentra creada exitosamente, logea para continuar"');
    }
}