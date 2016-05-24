<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */

include "modelos/Usuario.php";
class mensajeControl extends controlador_base
{
    function index()
    {
        if (isset($_POST['email']))
        {
            $email = $_POST['email'];
            $clave = Usuario::obtenerClave();

            if ((!Usuario::obtenerCorreo($email)))
            {
                die("No existe el correo");
            }
            Usuario::mandarMail($email,"Recuperacion de Cuenta Ferreweb","Tu nueva contraseña es $clave",Usuario::obtenerNombre($email));
            //almacenar en la base de dato sla contraseña temporal encriptada, y  no voy a sobrescibir la contraseña
            // vieja del usuario
            $claveTemporal = md5($clave);
            // aqui voy a insertar la contraseña temporal
            Usuario::insertarClaveTemporal($claveTemporal,$email);
        }
        else
        {
            die("Debe especificar un correo electronico");
        }
        header('Location:index.php?r=login');
    }
}