<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */

include_once 'modelo_base.php';
class Temas extends BaseModel
{
    public static function obtenerTemas()
    {
        //agregar Foto
        $db = Datos::getDB();
        return $db->obtenerDatos("select t.id_categoria,t.id_tema,tema,usuario from categorias c join temas t on c.id_categoria = t.id_categoria
join tema_moderador tm on tm.id_tema = t.id_tema
join miembro m on m.id_usuario = tm.id_miembro
join usuario u on u.id_usuario = m.id_usuario;");
    }

    public static function obtenerDatosTema()
    {
        $db = Datos::getDB();
        return $db->obtenerDatos("
select t.id_tema, count(p.id_post) as cant,max(fecha_creado) as max from posts p join temas t on p.id_tema = t.id_tema");
    }

    public static function obtenerPost($id_tema)
    {
        $db = Datos::getDB();
        return $db->obtenerDatos("select p.id_post,p.post,u.usuario from posts p join usuario u on p.id_usuario=u.id_usuario where id_tema=$id_tema");
    }
}