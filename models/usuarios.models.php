<?php
require_once('../config/config.php');
class Usuarios{
    public function todos() {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "select * from usuario";
        $datos = mysqli_query ($con, $cadena);
        $con->close();
        return $datos; 
    } 
   
    public function uno ($beneficiario_id)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = 'select * from usuario where beneficiario_id='. $beneficiario_id;
        //echo $cadena;
        //die;
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }
    public function insertar($nombres, $identificacion, $usuario, $contraseña, $correo, $fecha_nacimiento, $rol_rol_id)
    {
       try {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "INSERT INTO `usuario`(`nombres`, `identificacion`, `usuario`, `contraseña`, `correo`,`fecha_nacimiento`, `rol_rol_id`) VALUES ('$nombres', $identificacion, $usuario, '$contraseña', '$correo', `$fecha_nacimiento`, $rol_rol_id)" ;
        if (mysqli_query($con, $cadena)){
            return $con->insert_id;
        } else {
            return $con->error;
        }
    } catch (Exception $th) {
        return $th->getMessage();
    } finally {
        $con->close();
    }
}
    public function actualizar ($nombres, $identificacion, $usuario, $contraseña, $valoracion_valoracion_id)
    {
    try {
    $con = new ClaseConectar();
    $con =$con->ProcedimientoParaConectar();
    $cadena = "UPDATE `usuario` SET `nombres`='$nombres',`identificacion`=$identificacion,`usuario`='$usuario',`contraseña`='$contraseña','correo`= $correo `fecha_nacimiento` = `$fecha_nacimiento` , `rol_rol_id` = $rol_rol_id  WHERE 'beneficiario_id' = $beneficiario_id";
    if (mysqli_query($con, $cadena)){
        return $con->insert_id;
    } else {
        return $con->error;
    }
    } catch (Exception $th) {
    return $th->getMessage();
    } finally {
        $con->close();
    }
}

    public function eliminar ($beneficiario_id)
    {
    try {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "DELETE FROM `usuario` WHERE `beneficiario_id`= $$beneficiario_id";
        if (mysqli_query($con, $cadena)) {
            return 1;
        } else {
            return $con->error;
        }
    } catch (Exception $th) {
        return $th->getMessage();
    } finally {
        $con->close();
    }

    }
}

?>