<?php

/**
 * Copyright (c) 2016 Cristian Perez
 */
include 'modelos/Usuario.php';
class guardarControl extends controlador_base
{
    function index()
    {
        if (isset($_SESSION['email']))
        {
            $id_usuario = Usuario::obtenerid($_SESSION['email']);
        }
        else
        {
            header('Location: index.php?r=index&mensaje="Necesitas iniciar sesión"');
        }
    }
}