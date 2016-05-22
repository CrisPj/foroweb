<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */

include_once 'modelo_base.php';
class Categorias extends BaseModel
{
    public static function obtenerCategorias()
    {
        $db = Datos::getDB();
        return $db->obtenerDatos("select id_categoria,categoria,descripcion from categorias");
    }
}