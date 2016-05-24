<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */

include 'modelos/Usuario.php';
class cambiarpasswordControl extends controlador_base
{
    function index()
    {
        var_dump($_POST);
        if (isset($_POST['newpass']) && isset($_POST['rnewpass']) && isset($_POST['oldpass']))
        {
            $newpass = $_POST['newpass'];
            $rnewpass = $_POST['rnewpass'];
            $oldpass = $_POST['oldpass'];
            $email = $_SESSION['email'];
            if ($newpass == $rnewpass && password_verify($oldpass,Usuario::regresarPass(Usuario::obtenerid($email))))
            {
                Usuario::cambiarPass($email,$newpass);
            }
        }
        header('Location: index.php');
    }
}