<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */
include 'modelos/Post.php';
include 'modelos/Usuario.php';
class crearPostControl extends controlador_base
{
    function index()
    {
        $this->registro->template = new Template($this->registro);
        var_dump($_POST);
        $id_tema = $_GET['id_tema'];
        $titulo = $_POST['titulo'];
        $contenido = $_POST['contenido'];
        $email = $_SESSION['email'];
        $id_usuario = Usuario::obtenerid($email);
        Post::nuevo($id_tema,$titulo,$contenido,date('y-m-d'),$id_usuario);
        header('Location: index.php');
    }
}