<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */

include_once 'modelo_base.php';
class Categorias extends BaseModel
{
    public static function obtenerCategorias($id_rol)
    {
        $db = Datos::getDB();
        return $db->obtenerDatos("select c.id_categoria,categoria,descripcion from categorias c join permisos_categoria p on c.id_categoria=p.id_categoria where  p.id_rol >= $id_rol order by c.id_categoria");
    }

    public static function tengoPermiso($id_categoria,$rol)
    {
        $db = Datos::getDB();
        if ($db->obtenerDato("select categoria from categorias c join permisos_categoria p on c.id_categoria=p.id_categoria where  p.id_rol >= $rol and c.id_categoria=$id_categoria"))
        {
            return true;
        }
        return false;
    }

    public static function nuevo($titulo, $contenido,$rol)
    {
        $db = Datos::getDB();
        $db->ejecutar("insert into categorias(categoria,descripcion) VALUES ('$titulo','$contenido')");
        $categoria = $db->obtenerDato("select id_categoria from categorias where categoria='$titulo' and descripcion = '$contenido'");
        $db->ejecutar("insert into permisos_categoria(id_rol, id_categoria) VALUES ($rol,$categoria)");
    }

    public static function obtenerNombre($id_categoria)
    {
        $db = Datos::getDB();
        return $db->obtenerDato("select categoria from categorias where id_categoria=$id_categoria");
    }

    public static function obtenerIdCategoria($id_tema)
    {
        $db = Datos::getDB();
        return $db->obtenerDato("select c.id_categoria from temas t JOIN categorias c on t.id_categoria = c.id_categoria where t.id_tema=$id_tema");
    }

    public static function obtenerTodas()
    {
        $db = Datos::getDB();
        return $db->obtenerDatos("select * from categorias");
    }
}