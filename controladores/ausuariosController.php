<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */
include "modelos/Usuario.php";
class ausuariosControl extends controlador_base
{
    function index()
    {
        $template = new Template();
        $usuarios = Usuario::obtenerTodos();

        $template->usuarios = array("nombre"=>"datos","valores"=>$usuarios);
        $template->tipo = array("nombre"=>"tipo","valores"=>"usuarios");
        $template->nc = array("nombre"=>"nombrecolumnas","valores"=>array("id_usuario","usuario","correo","nombre","apaterno","amaterno","rol"));
        $template->mostrar('admin/mostrarTabla');
    }
}