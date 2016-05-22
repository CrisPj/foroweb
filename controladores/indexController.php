<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */
include 'modelos/Categorias.php';
include 'modelos/Temas.php';
class indexControl extends controlador_base
{
    function index()
    {
        $categorias = Categorias::obtenerCategorias();
        $temas = Temas::obtenerTemas();

        $this->registro->template = new Template($this->registro);
        $this->registro->template->categorias = array("nombre"=>"categorias","valores"=>$categorias);
        $this->registro->template->temas = array("nombre"=>"temas","valores"=>$temas);
        if ($_SESSION['rol'] == 'admin')
        {
            $this->registro->template->mostrar('admin/index');
        }
        else
        {
            $this->registro->template->mostrar('home/index');
        }
    }
}