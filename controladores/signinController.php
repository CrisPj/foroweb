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
        var_dump($_POST);
        $this->registro->template = new Template($this->registro);
        if (isset($_POST['email']) && isset($_POST['password']))
        {
            $password = $_POST['password'];
            $email = $_POST['email'];

                if (filter_var($email,FILTER_VALIDATE_EMAIL) &&!empty($_POST['email']) && !empty($_POST['password'])) {
                    $hash = Usuario::regresarPass(Usuario::obtenerid($email));
                    if (password_verify($password,$hash))
                    {
                        $_SESSION['email'] = $email;
                        $_SESSION['rol'] = 'miembro';
                        $_SESSION['logueado'] = true;
                        $categorias = Categorias::obtenerCategorias();
                        $temas = Temas::obtenerTemas();
                        $datosTema = Temas::obtenerDatosTema();
                        $this->registro->template->dtemas = array("nombre"=>"dtema","valores"=>$datosTema);
                        $this->registro->template->categorias = array("nombre"=>"categorias","valores"=>$categorias);
                        $this->registro->template->temas = array("nombre"=>"temas","valores"=>$temas);
                        $this->registro->template->mostrar('home/index');
                    }
                    else
                    {
                        die("no coincide");
                    }
                }
            else
            {
                $this->registro->template->error = array('nombre' => 'error',
                    'valor' => 'Password No seguro');
                $this->registro->template->mostrar('home/login');
            }
        }
    }
}