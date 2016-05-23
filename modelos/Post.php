<?php
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

    public static function obtenerPost($id_post)
    {
        $db = Datos::getDB();
        return $db->obtenerFila("select id_post,post,contenido,usuario from posts join usuario on posts.id_usuario=usuario.id_usuario where posts.id_post=$id_post");
    }

    public static function nuevo($id_tema, $titulo, $contenido, $date,$id_usuario)
    {
        $db= Datos::getDB();
        $db->ejecutar("insert into posts(id_usuario, post, contenido, id_tema, fecha_creado) values($id_usuario,'$titulo','$contenido',$id_tema,'$date')");
    }
}