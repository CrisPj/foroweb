<?php

/**
 * Copyright (c) 2016 Cristian Perez
 */
include 'modelos/Usuario.php';
class datoseditadosControl extends controlador_base
{
    function index()
    {
        $template = new Template();
        if (isset($_SESSION['email']))
        {
            var_dump($_POST);
            if (isset($_POST['user'],$_POST['apaterno'],$_POST['amaterno'],$_POST['nombre']))
            {
                $user = $_POST['user'];
                $apaterno = $_POST['apaterno'];
                $amaterno = $_POST['amaterno'];
                $nombre = $_POST['nombre'];
                $foto = $_POST['foto'];
                $email = $_SESSION['email'];
                Usuario::editarDatos($user,$apaterno,$nombre,$amaterno,$foto,$email);
            }
            header('Location: index.php?r=index&mensaje="Datos Actualizados Correctamente"');
        }
    }
}