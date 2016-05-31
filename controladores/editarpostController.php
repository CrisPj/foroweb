<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */
include "modelos/Post.php";
include "modelos/Usuario.php";
class editarpostControl extends controlador_base
{
    function index()
    {

        if (isset($_SESSION['email']))
        {
            $id_post = $_GET['id'];
            $id_usuario = Usuario::obtenerid($_SESSION['email']);
            if (Usuario::tienePermiso("editar_post",$id_usuario) or Usuario::esmiPost($id_post,$id_usuario))
            {
                $template = new Template();
                $post = Post::obtenerPost($id_post);
                $template->post = array("nombre"=>"post","valores"=>$post);
                $template->mostrar('common/editar_post');
            }
            else
            {
                header('Location: index.php?r=index&mensaje="Acceso no autorizado"');
            }
        }
        else
        {
            header('Location: index.php?r=login&mensaje="Debes Iniciar Sesión"');
        }
    }
}