<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */
include_once 'modelo_base.php';
class Rol extends BaseModel
{
    public static function obtenerRol($id_usuario)
    {
        $db = Datos::getDB();
        return $db->obtenerDato("select rol from usuario u join rol_usuario ru on u.id_usuario = ru.id_usuario join rol r on ru.id_rol = ru.id_rol where u.id_usuario=$id_usuario");
    }

    public static function obtenerPermisos($id_usuario)
    {
        $db = Datos::getDB();
        return $db->obtenerDatos("select permisos from usuario u join rol_usuario ru on ru.id_usuario = u.id_usuario join rol privilegio rp on ru.id_rol = rp.id_rol join privilegio p on rp.id_privilegio = p.id_privilegio where u.id_usuario = $id_usuario");
    }
}