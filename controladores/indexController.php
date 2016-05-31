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
        $rol = $_SESSION['rol'];
        $categorias = Categorias::obtenerCategorias($rol);
        $temas = Temas::obtenerTemas();
        $datosTema = Temas::obtenerDatosTema();

        $template = new Template();
        $template->categorias = array("nombre"=>"categorias","valores"=>$categorias);
        $template->temas = array("nombre"=>"temas","valores"=>$temas);
        if (isset($_GET['mensaje']))
        {
            $template->bien = array("nombre"=>"bien","valores"=>$_GET['mensaje']);
        }
        $template->dtemas = array("nombre"=>"dtema","valores"=>$datosTema);
        if ($_SESSION['rol'] == 1)
        {
            $template->mostrar('admin/index');
        }
        else
        {
            $template->mostrar('home/index');
        }
    }
}