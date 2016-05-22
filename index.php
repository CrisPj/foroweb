<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */
ini_set('display_errors', 'On');
include('includes/sistema.php');
$web->router = new Ruta($web);
$web->router->establecer(".");
$web->router->cargar();

