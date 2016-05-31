<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */
ini_set('display_errors', 'On');
include('includes/sistema.php');
$router = new Ruta();
$router->establecer(".");
$router->cargar();
