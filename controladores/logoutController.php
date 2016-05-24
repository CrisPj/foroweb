<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */

class logoutControl extends controlador_base
{
    function index()
    {
        unset($_SESSION);
        session_destroy();
        session_start();
        $_SESSION['rol'] = 'visitante';
        var_dump($_SESSION);
        header('Location: index.php');
    }
}