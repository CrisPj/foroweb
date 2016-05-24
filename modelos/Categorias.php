<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */

include_once 'modelo_base.php';
class Categorias extends BaseModel
{
    public static function obtenerCategorias($rango)
    {
        $db = Datos::getDB();
        $id_rango = $db->obtenerDato("select id_rango from rango where rango='$rango'");
        return $db->obtenerDatos("select c.id_categoria,categoria,descripcion from categorias c join permisos_categoria p on c.id_categoria=p.id_categoria 
where  p.id_rango <= $id_rango");
    }

    public static function tengoPermiso($id_categoria,$rango)
    {
        $db = Datos::getDB();
        $id_rango = $db->obtenerDato("select id_rango from rango where rango='$rango'");
        if ($db->obtenerDato("select categoria from categorias c join permisos_categoria p on c.id_categoria=p.id_categoria 
where  p.id_rango <= $id_rango and c.id_categoria=$id_categoria"))
        {
            return true;
        }
        return false;
    }
}