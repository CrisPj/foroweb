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
  join miembro m on m.id_miembro = tm.id_miembro
  join usuario u on u.id_usuario = m.id_usuario;");
    }

    public static function obtenerDatosTema()
    {
        $db = Datos::getDB();
        return $db->obtenerDatos("select t.id_tema, count(p.id_post) as cant,max(fecha_creado) as max from posts p right join temas t on p.id_tema = t.id_tema
GROUP BY id_tema;");
    }

    public static function obtenerPost($id_tema)
    {
        $db = Datos::getDB();
        return $db->obtenerDatos("select p.id_post,p.post,u.usuario,vistas from posts p join usuario u on p.id_usuario=u.id_usuario where id_tema=$id_tema");
    }

    public static function nuevo($id_categoria, $tema, $descripcion, $id_usuario)
    {
        $db = Datos::getDB();
        $db->ejecutar("insert into temas(id_categoria, tema, descripcion) VALUES ($id_categoria,'$tema','$descripcion')");
        $id_tema = $db->obtenerDato("select id_tema from temas where tema = '$tema'");
        $id_miembro = $db->obtenerDato("select id_miembro from usuario u join miembro m on u.id_usuario = m.id_usuario where u.id_usuario=$id_usuario");
        $db->ejecutar("insert into tema_moderador(id_miembro, id_tema) VALUES ($id_miembro,$id_tema)");
    }

    public static function obtenerNombre($id_tema)
    {
        $db = Datos::getDB();
        return $db->obtenerDato("select tema from temas where id_tema=$id_tema");
    }

    public static function obteneridTema($id_post)
    {
        $db = Datos::getDB();
        return $db->obtenerDato("select t.id_tema from temas t join posts p on t.id_tema = p.id_tema where p.id_post=$id_post");
    }

    public static function obtenermisPost($id_tema,$id_usuario)
    {
        $db = Datos::getDB();
        return $db->obtenerDatosAssoc1("select id_post from posts p join usuario u on p.id_usuario = u.id_usuario where u.id_usuario=$id_usuario and p.id_tema=$id_tema");
    }
}