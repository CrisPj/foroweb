<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */

class addcomControl extends controlador_base
{
    function index()
    {
        $id_post = $_GET['id_post'];
        $comment = $_POST['comment'];
        $id_usuario = Usuario::obtenerid($_POST['email']);
        Post::addcomentario($id_post,$comment,$id_usuario);
        $template = new Template();
        $template->mostrar('home/login');
    }
}