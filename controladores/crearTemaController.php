<?php

/**
 * Copyright (c) 2016 Cristian Perez
 */
include 'modelos/Temas.php';
include 'modelos/Usuario.php';
class crearTemaControl extends controlador_base
{
    function index()
    {
        $id_categoria = $_GET['id'];
        $tema = $_POST['titulo'];
        $descripcion = $_POST['contenido'];
        $email = $_SESSION['email'];
        $id_usuario = Usuario::obtenerid($email);
        Temas::nuevo($id_categoria,$tema,$descripcion,$id_usuario);
        header('Location: index.php');
    }
}