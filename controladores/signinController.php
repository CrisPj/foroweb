<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */
include 'modelos/Usuario.php';
include 'modelos/Categorias.php';
include 'modelos/Temas.php';
class signinControl extends controlador_base
{
    function index()
    {
        if (isset($_POST['email']) && isset($_POST['password']))
        {
            $password = $_POST['password'];
            $email = $_POST['email'];

                if (filter_var($email,FILTER_VALIDATE_EMAIL) &&!empty($_POST['email']) && !empty($_POST['password'])) {
                    $hash = Usuario::regresarPass(Usuario::obtenerid($email));
                    if (password_verify($password,$hash))
                    {
                        $_SESSION['email'] = $email;
                        $_SESSION['rol'] = Usuario::obtenerRol($email);
                        $_SESSION['privilegios'] = Usuario::obtenerPrivilegiosUser($email);
                        $_SESSION['logueado'] = true;
                        header("Location: index.php?r=index");
                    }
                    else
                    {
                        header('Location: index.php?r=index&mensaje="Datos invalidos"');
                    }
                }
            else
            {
                header('Location: index.php?r=login&mensaje="Password no seguro"');
            }
        }
    }
}