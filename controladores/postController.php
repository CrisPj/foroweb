<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */
include 'modelos/Post.php';
include 'modelos/Temas.php';
include 'modelos/Categorias.php';
class postControl extends controlador_base
{
    function index()
    {
        $id_post = $_GET['post'];
        $post = Post::obtenerPost($id_post);
        $id_tema = Temas::obteneridTema($id_post);
        $id_categoria = Categorias::obtenerIdCategoria($id_tema);
        $rol = $_SESSION['rol'];
        if (Categorias::tengoPermiso($id_categoria,$rol))
        {
            $temas = Temas::obtenerNombre($id_tema);
            $comentarios = Post::obtenerComentarios($id_post);
            $categoria = Categorias::obtenerNombre($id_categoria);
            $template = new Template();
            $template->nombre = array("nombre"=>"categoria","valores"=>$categoria);
            $template->post = array("nombre"=>"post","valores"=>$post);
            $template->temas = array("nombre"=>"tema","valores"=>$temas);
            $template->coment = array("nombre"=>"comentarios","valores"=>$comentarios);
            $template->mostrar('common/post');
        }
        else
        {
            header('Location: index.php?r=index&mensaje="No tienes permiso para entrar"');
        }

    }
}