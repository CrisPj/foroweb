<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */

include 'modelos/Temas.php';
include 'modelos/Categorias.php';
include 'modelos/Usuario.php';
class verpostControl extends controlador_base
{
    function index()
    {
        $id_tema = $_GET['id_tema'];
        $id_categoria = $_GET['categoria'];
        $rol = $_SESSION['rol'];
        $id_usuario = Usuario::obtenerid($_SESSION['email']);
        if (Categorias::tengoPermiso($id_categoria,$rol))
        {
            $template = new Template();
            $categoria = Categorias::obtenerNombre($id_categoria);
            $temas = Temas::obtenerNombre($id_tema);
            $template->nombre = array("nombre"=>"categoria","valores"=>$categoria);
            $posts = Temas::obtenerPost($id_tema);
            $mispost = Temas::obtenermisPost($id_tema,$id_usuario);
            $template->posts = array("nombre"=>"posts","valores"=>$posts);
            $template->mposts = array("nombre"=>"misposts","valores"=>$mispost);
            $template->temas = array("nombre"=>"tema","valores"=>$temas);
            $template->mostrar('home/ver');
        }
        else
        {
            header('Location: index.php?r=index&mensaje="No tienes permiso para entrar"');
        }
    }
}