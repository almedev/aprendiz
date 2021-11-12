<?php
include_once "conexion.php";

class ModeloUsuarios{

    public static function mdlInsertarUsuario($tipodocumento,$numerodocumento,$nombres,$apellidos,$salario){
        $objRespuesta = Conexion::conectar()->prepare("INSERT INTO pruebas2(tipodocumento,numerodocumento,nombres,apellidos,salario)VALUES(:tipodocumento,:numerodocumento,:nombres,:apellidos,:salario)");
        $objRespuesta->bindParam(":tipodocumento",$tipodocumento);
        $objRespuesta->bindParam(":numerodocumento",$numerodocumento);
        $objRespuesta->bindParam(":nombres",$nombres);
        $objRespuesta->bindParam(":apellidos",$apellidos);
        $objRespuesta->bindParam(":salario",$salario);
        
        $mensaje = "";
        if ($objRespuesta->execute()){
            $mensaje = "Datos insertados correctamente";
        }else{
            $mensaje = "error al insertar los datos";
        }

        return $mensaje;

    }

    public static function mdlListarUsuarios(){
        $objRespuesta = Conexion::conectar()->prepare("SELECT * FROM pruebas2");
        $objRespuesta->execute();
        $aListaUsuarios = $objRespuesta->fetchAll();
        $objRespuesta = null;
        return $aListaUsuarios;
    }

    // public static function mdlEditarUsuario($nombres,$apellidos,$telefono,$direccion,$idUsuario){
    //     $objRespuesta = Conexion::conectar()->prepare("UPDATE usuarios SET nombres=:nombres,apellidos=:apellidos,telefono=:telefono,direccion=:direccion WHERE idusuario=:idusuario");
    //     $objRespuesta->bindParam(":nombres",$nombres);
    //     $objRespuesta->bindParam(":apellidos",$apellidos);
    //     $objRespuesta->bindParam(":telefono",$telefono);
    //     $objRespuesta->bindParam(":direccion",$direccion);
    //     $objRespuesta->bindParam(":idusuario",$idUsuario);
    //     $respuesta = "";

    //     if ($objRespuesta->execute()){
    //         $respuesta = "datos modificados correctamente";
    //     }else{
    //         $respuesta = "error al modificar datos";
    //     }
    //     return $respuesta;
    // }


    // public static function mdlEliminarUsuario($idUsuario){
    //     try {
    //         $objRespuesta = Conexion::conectar()->prepare("DELETE FROM usuarios WHERE idusuario=:idusuario");
    //         $objRespuesta->bindParam(":idusuario",$idUsuario);
    //         $respuesta = "";
    //         if ($objRespuesta->execute()){
    //             $respuesta = "datos eliminados correctamente";
    //         }else{
    //             $respuesta = "error al eliminar datos";
    //         }
    //     } catch (Exception $e) {
    //         $respuesta = $e;
    //     }
        

    //     return $respuesta;
    // }

}