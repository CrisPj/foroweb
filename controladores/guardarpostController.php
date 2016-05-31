<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */
include "modelos/Post.php";
include "modelos/Usuario.php";
class guardarpostControl extends controlador_base
{
    function index()
    {

        if (isset($_SESSION['email']))
        {
            $titulo = $_POST['titulo'];
            $contenido = $_POST['contenido'];
            $id_post = $_GET['id_post'];

            $id_usuario = Usuario::obtenerid($_SESSION['email']);
            if (Usuario::tienePermiso("editar_post",$id_usuario) or Usuario::esmiPost($id_post,$id_usuario))
            {
                Post::editarPost($id_post,$titulo,$contenido);
                header('Location: index.php?r=index&mensaje="Post editado correctamente"');
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