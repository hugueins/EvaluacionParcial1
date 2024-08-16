<?php
require_once('../config/config.php');
class Valoracion{
    public function todos() {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "select * from valoracion";
        $datos = mysqli_query ($con, $cadena);
        $con->close();
        return $datos; 
    } 
   
    public function uno ($valoracion_id)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = 'select * from valoracion where valoracion_id='. $valoracion_id;
        //echo $cadena;
        //die;
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }
    public function insertar($valoracion_id)
    {
       try {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "INSERT INTO `valoracion`(`nombre`) VALUES ('$nombre')" ;
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
    public function actualizar ($valoracion_id,$nombre)
    {
    try {
    $con = new ClaseConectar();
    $con =$con->ProcedimientoParaConectar();
    $cadena = "UPDATE `valoracion` SET `nombre`='$nombre' WHERE 'valoracion_id' = $valoracion_id";
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

    public function eliminar ($valoracion_id)
    {
    try {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "DELETE FROM `valoracion` WHERE `valoracion_id`= $$valoracion_id";
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