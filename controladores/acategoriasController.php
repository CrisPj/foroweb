<?php

/**
 * Copyright (c) 2016 Cristian Perez
 */
include "modelos/Categorias.php";
class acategoriasControl extends controlador_base
{
    function index()
    {
        $template = new Template();
        $categorias = Categorias::obtenerTodas();
        $template->categorias = array("nombre"=>"datos","valores"=>$categorias);
        $template->tipo = array("nombre"=>"tipo","valores"=>"categorias");
        $template->nc = array("nombre"=>"nombrecolumnas","valores"=>array("id_categoria","categoria","descripcion"));
        $template->mostrar('admin/mostrarTabla');
    }
}