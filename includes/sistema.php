<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */
session_start();
if (!isset($_SESSION['rol']))
{
    $_SESSION['rol'] = 'Visitante';
}
if (!isset($_SESSION['rango']))
{
    $_SESSION['rango'] = 'Visitante';
}
include 'config.php';
// Include las librerias
//require_once(PATHLIB.'/html2pdf/vendor/autoload.php');
require_once('ruta.php');
require_once('controlador_base.php');
require_once('registro.php');
require_once('template.php');

$web = new Registro();