<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */
class Ruta
{
    private $registro;
    private $ruta;
    public $archivo;
    public $controlador;
    public $action;

    function __construct($registro)
    {
        $this->registro = $registro;
    }

    function establecer($pRuta)
    {
        if (is_dir($pRuta) == false)
        {
            throw new Exception ('Ruta invalida: `' . $pRuta . '`');
        }
        $this->path = $pRuta;
    }

    function cargar()
    {
        $this->obtenerControlador();
        if (is_readable($this->archivo) != true)
        {
            die("Controlador no puede ser leido");
        }


        include $this->archivo;
        $className =  $this->controlador . 'Control';
        $controlador = new $className($this->registro);
        if (is_callable(array($controlador, $this->action)) == false)
        {
            $action = 'index';
        }
        else
        {
            $action = $this->action;
        }
        $controlador->$action();
    }

    private function obtenerControlador()
    {

            $ruta = (empty($_GET['r'])) ? '' : $_GET['r'];
        
        if (empty($ruta))
        {
            $ruta = 'index';
        }
        else
        {
            $parts = explode('/', $ruta);
            $this->controlador = $parts[0];
            if (isset( $parts[0]))
                $this->action = $parts[0];

        }
        if (empty($this->controlador)) {
            $this->controlador = 'index';
        }
        $this->archivo = PATHCONTROLLERS . '/'. $this->controlador . 'Controller.php';
    }

}