<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */
session_start();
if (!isset($_SESSION['rol']))
{
    $_SESSION['rol'] = 9;
}
include 'config.php';
// Include las librerias
//require_once(PATHLIB.'/html2pdf/vendor/autoload.php');
require_once('ruta.php');
require_once('controlador_base.php');
require_once('template.php');