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
        $rango = $_SESSION['rango'];
        $categorias = Categorias::obtenerCategorias($rango);
        $temas = Temas::obtenerTemas();
        $datosTema = Temas::obtenerDatosTema();
        $this->registro->template = new Template($this->registro);
        $this->registro->template->categorias = array("nombre"=>"categorias","valores"=>$categorias);
        $this->registro->template->temas = array("nombre"=>"temas","valores"=>$temas);
        if (isset($_GET['mensaje']))
        {
            $this->registro->template->bien = array("nombre"=>"bien","valores"=>$_GET['mensaje']);
        }
        $this->registro->template->dtemas = array("nombre"=>"dtema","valores"=>$datosTema);
        if ($_SESSION['rol'] == 'Administrador')
        {
            $this->registro->template->mostrar('admin/index');
        }
        else
        {
            $this->registro->template->mostrar('home/index');
        }
    }
}