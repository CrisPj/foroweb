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
        return $db->obtenerDatos("select id_categoria,id_tema,tema,descripcion from temas");
    }
}