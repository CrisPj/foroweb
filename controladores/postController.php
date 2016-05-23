<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */
include 'modelos/Post.php';
class postControl extends controlador_base
{
    function index()
    {
        $id_post = $_GET['post'];
        $post = Post::obtenerPost($id_post);
        $this->registro->template = new Template($this->registro);
        $this->registro->template->post = array("nombre"=>"post","valores"=>$post);
        $this->registro->template->mostrar('common/post');
    }
}