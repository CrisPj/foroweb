<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */
include 'modelos/Usuario.php';
class nuevotemaControl extends controlador_base
{
    function index()
    {
        if (isset($_SESSION['email']))
        {
            $id_usuario = Usuario::obtenerid($_SESSION['email']);
            if (Usuario::tienePermiso("crear_tema",$id_usuario))
            {
                $template = new Template();
                $moderadores = Usuario::obtenerModeradores();
                $template->mode = array("nombre"=>"valor","valores"=>$moderadores);
                $template->mostrar('common/nueva_tema');
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