<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */
Abstract class controlador_base
{
    function __construct($registro)
    {
        $this->registro = $registro;
    }
    abstract function index();
}