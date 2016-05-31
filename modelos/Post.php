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
        $vista = $db->obtenerDato("select vistas from posts where id_post=$id_post");
        $vista = $vista+1;
        $db->ejecutar("update posts set vistas=$vista WHEre id_post=$id_post");
        return $db->obtenerFila("select id_post,post,contenido,usuario from posts join usuario on posts.id_usuario=usuario.id_usuario where posts.id_post=$id_post");
    }

    public static function nuevo($id_tema, $titulo, $contenido, $date,$id_usuario)
    {
        $db= Datos::getDB();
        $db->ejecutar("insert into posts(id_usuario, post, contenido, id_tema, fecha_creado) values($id_usuario,'$titulo','$contenido',$id_tema,'$date')");
    }

    public static function obtenerComentarios($id_post)
    {
        $db = Datos::getDB();
        return $db->obtenerDatos("select id_comentario,comentario,usuario from comentarios c join usuario u on u.id_usuario=c.id_usuario where id_post=$id_post ");
    }

    public static function addcomentario($id_post, $comment, $id_usuario)
    {
        $db = Datos::getDB();
        $db->ejecutar("insert into comentarios(id_post, comentario, id_usuario) VALUES ($id_post,'$comment',$id_usuario)");
    }

    public static function editarPost($id_post, $titulo, $contenido)
    {
        $db = Datos::getDB();
        $db->ejecutar("update posts set post = '$titulo', contenido = '$contenido' where id_post=$id_post");
    }

    public static function eliminarPost($id_post)
    {
        $db = Datos::getDB();
        $db->ejecutar("delete from posts where id_post=$id_post");
    }
}