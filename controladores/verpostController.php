<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */

include 'modelos/Temas.php';
include 'modelos/Categorias.php';
class verpostControl extends controlador_base
{
    function index()
    {
        $id_tema = $_GET['id_tema'];
        $id_categoria = $_GET['categoria'];
        $rango = $_SESSION['rango'];
        if (Categorias::tengoPermiso($id_categoria,$rango))
        {
            $posts = Temas::obtenerPost($id_tema);
            $this->registro->template = new Template($this->registro);
            $this->registro->template->posts = array("nombre"=>"posts","valores"=>$posts);
            $this->registro->template->mostrar('home/ver');
        }
        else
        {
            header('Location: index.php?r=index&mensaje="No tienes permiso para entrar"');
        }
    }
}