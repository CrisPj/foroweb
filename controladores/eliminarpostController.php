<?php

/**
 * Copyright (c) 2016 Cristian Perez
 */
include "modelos/Post.php";
include "modelos/Usuario.php";
class eliminarpostControl extends controlador_base
{
    /**
     *
     */
    function index()
    {

        if (isset($_SESSION['email']))
        {
            $id_post = $_GET['id'];
            $id_usuario = Usuario::obtenerid($_SESSION['email']);
            if (Usuario::tienePermiso("eliminar_post",$id_usuario) or Usuario::esmiPost($id_post,$id_usuario))
            {
                Post::eliminarPost($id_post);
                header('Location: index.php?r=index&mensaje="Post eliminado correctamente"');

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