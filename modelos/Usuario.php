<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */
include_once 'modelo_base.php';
class Usuario
{
    public static function crearNuevo($user,$email,$password)
    {
        $options = [
            'salt' => "u83r13375up4h4x0rm45s73r", //write your own code to generate a suitable salt
            'cost' => 12 // the default cost is 10
        ];
        $password = password_hash($password,PASSWORD_DEFAULT,$options);
        $db = Datos::getDB();
        $db->ejecutar("insert into usuario(usuario,password,email) values ('$user','$password','$email')");
        $id=self::obtenerid($email);
        $db->ejecutar("insert into miembro(id_usuario) VALUES ($id)");
    }

    public static function obtenerid($email)
    {
        $db = Datos::getDB();
        return $db->obtenerDato("select id_usuario from usuario where email='$email'");
    }

    public static function regresarPass($id_usuario)
    {
        $db = Datos::getDB();
        return $db->obtenerDato("select password from usuario where id_usuario='$id_usuario'");
    }
}