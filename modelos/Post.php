<?
/**
 * Copyright (c) 2016 Cristian Perez
 */

include_once 'modelo_base.php';
class Post extends BaseModel
{
    public static function obtenerPosts($id_categoria)
    {
        $db = Datos::getDB();
        return $db->obtenerDatos("select id_categoria,categoria,descripcion from categorias");
    }
}