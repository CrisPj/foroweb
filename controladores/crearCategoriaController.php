<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */

include 'modelos/Categorias.php';
include 'modelos/Usuario.php';
class crearCategoriaControl extends controlador_base
{
    function index()
    {
        $template = new Template();
        $titulo = $_POST['titulo'];
        $contenido = $_POST['contenido'];
        $rol = $_POST['rol'];
        $email = $_SESSION['email'];
        Categorias::nuevo($titulo,$contenido,$rol);
        header('Location: index.php');
    }
}