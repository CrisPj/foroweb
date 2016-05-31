<?php
/**
 * Copyright (c) 2016 Cristian Perez
 */
include "libs/phpmailer/PHPMailerAutoload.php";
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
        $db->ejecutar("insert into rol_usuario(id_usuario,id_rol) VALUES ($id,8)");
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

    public static function obtenerClave()
    {
        return strtolower(substr(md5(rand(0, 100000)), 0, 8));
    }

    public static function obtenerCorreo($email)
    {
        $db = Datos::getDB();
        return $db->obtenerDato("SELECT email FROM usuario WHERE email = '$email'");
    }

    public static function mandarMail($destino, $asunto, $mensaje, $nombre)
    {
        $mail = new PHPMailer();
        $mail->isSMTP();

        try
        {
            $mail->SMTPDebug  = MAIL_SMTPDEBUG;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = MAIL_SECURE;
            $mail->Host = MAIL_HOST;
            $mail->Port = MAIL_PORT;
            $mail->Username = MAIL_USERNAME;
            $mail->Password = MAIL_PASSWORD;
//            $mail->addReplyTo('name@yourdomain.com', 'First Last');
            $mail->addAddress($destino, $nombre);
            $mail->setFrom(MAIL_USERNAME, 'Servicio Foroweb');
            $mail->Subject = $asunto;
            $mail->msgHTML($mensaje);
            $mail->send();
        }
        catch (phpmailerException $e)
        {
            echo $e->errorMessage();
        }
    }
    public static function insertarClaveTemporal($claveTemporal, $email)
    {
        $db = Datos::getDB();
        $db->ejecutar("update usuario set clave='$claveTemporal' WHERE email='$email'");
    }

    public static function obtenerDatos($email)
    {
        $db = Datos::getDB();
        return $db->obtenerFila("select u.id_usuario,usuario,nombre,apaterno,amaterno,domicilio,foto,rol from usuario u join miembro m on u.id_usuario = m.id_usuario 
              join rol_usuario ru on u.id_usuario = ru.id_usuario join rol r on ru.id_rol = r.id_rol where u.email='$email'");
    }

    public static function cambiarPass($email, $newpass)
    {
        $options = [
            'salt' => "u83r13375up4h4x0rm45s73r", //write your own code to generate a suitable salt
            'cost' => 12 // the default cost is 10
        ];
        $password = password_hash($newpass,PASSWORD_DEFAULT,$options);
        $db = Datos::getDB();
        $db->ejecutar("update Usuario set password='$password'");
    }

    public static function editarDatos($user, $apaterno, $nombre, $amaterno, $foto, $email)
    {
        $db = Datos::getDB();
        $id = Usuario::obtenerid($email);
        $db->ejecutar("update usuario set usuario='$user' where id_usuario = '$id'");
        $db->exec("update miembro set apaterno='$apaterno',amaterno = '$amaterno', nombre='$nombre',foto = '$foto' where id_usuario=$id");
    }

    public static function obtenerRol($email)
    {
        $db = Datos::getDB();
        return $db->obtenerDato("select r.id_rol from usuario u join rol_usuario rs on u.id_usuario=rs.id_usuario
                                                                  join rol r on rs.id_rol=r.id_rol where email='$email'");
    }

    public static function obtenerTodos()
    {
        $db = Datos::getDB();
        return $db->obtenerDatos("select u.id_usuario,usuario,email,nombre,amaterno,apaterno,rol from usuario u join miembro m on u.id_usuario = m.id_usuario
join rol_usuario ru on m.id_usuario = ru.id_usuario join rol r2 on r2.id_rol = ru.id_rol");
    }

    public static function obtenerRoles()
    {
        $db = Datos::getDB();
        return $db->obtenerDatosAssoc2("select id_rol, rol from rol","id_rol","rol");
    }

    public static function obtenerPrivilegios()
    {
        $db = Datos::getDB();
        return $db->obtenerDatosAssoc2("select id_rol, rol from rol","id_rol","rol");
    }

    public static function tieneRol($rol,$id_usuario)
    {
        $db = Datos::getDB();
        return $db->obtenerDato("select rol from rol r join rol_usuario ru on r.id_rol=ru.id_rol join usuario u on ru.id_usuario = u.id_usuario where u.id_usuario =$id_usuario") == $rol;
    }

    public static function tienePermiso($permiso,$id_usuario)
    {
        $db = Datos::getDB();
        return $db->obtenerDato("select privilegio from usuario u join rol_usuario ru on u.id_usuario = ru.id_usuario join rol_privilegio rp on rp.id_rol = ru.id_rol join privilegio p on p.id_privilegio = rp.id_privilegio where u.id_usuario =$id_usuario and privilegio = '$permiso'") == $permiso;
    }

    public static function obtenerModeradores()
    {
        $db = Datos::getDB();
        return $db->obtenerDatosAssoc2("select id_miembro, usuario from usuario u join miembro m on u.id_usuario = m.id_usuario where id_rango = 2","id_miembro","usuario");
    }

    public static function obtenerPrivilegiosUser($email)
    {
        $db = Datos::getDB();
        $id_usuario = Usuario::obtenerid($email);
        return $db->obtenerDatosAssoc1("select privilegio from usuario u join rol_usuario ru on u.id_usuario = ru.id_usuario join rol_privilegio rp on rp.id_rol = ru.id_rol join privilegio p on p.id_privilegio = rp.id_privilegio where u.id_usuario =$id_usuario");
    }

    public static function obtenerNombre($email)
    {
        $db = Datos::getDB();
        return $db->obtenerDato("select usuario from usuario WHERE email='$email'");
    }
}