<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */
include 'modelos/Usuario.php';
class nuevacategoriaControl extends controlador_base
{
    function index()
    {
        if (isset($_SESSION['email']))
        {
            $id_usuario = Usuario::obtenerid($_SESSION['email']);
            if (Usuario::tienePermiso("crear_categoria",$id_usuario))
            {
                $template = new Template();
                $roles = Usuario::obtenerRoles();
                $template->va= array("nombre"=>"valor","valores"=>$roles);
                $template->mostrar('common/nueva_categoria');
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