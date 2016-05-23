<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */

include 'modelos/Temas.php';
class verpostControl extends controlador_base
{
    function index()
    {
        $id_tema = $_GET['id_tema'];
        $posts = Temas::obtenerPost($id_tema);
        $this->registro->template = new Template($this->registro);
        $this->registro->template->posts = array("nombre"=>"posts","valores"=>$posts);
        $this->registro->template->mostrar('home/ver');
    }
}