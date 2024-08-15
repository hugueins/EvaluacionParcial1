<?php
require_once('../config/config.php');
class peliculas{

    public function todos() {
        $con = new ClassConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "select * from peliculas";
        $datos = mysqli_query ($con, $cadena);
        $con->close();
        return $datos; 
    } 
        
    public function uno($peliculas_id){
        $con = new ClassConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "select * from peliculas where peliculas_id=$peliculas_id";
        $datos = mysqli_query ($con, $cadena);
        $con->close();
        return $datos; 
    }
    public function insertar($titulo, $genero, $anio, $director, $valoracion_valoracion_id)
    {
       try {
        $con = new ClassConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "INSERT INTO `peliculas`(`titulo`, `genero`, `anio`, `director`, `valoracion_valoracion_id`) VALUES ('$titulo', '$genero', $anio, '$director', '$valoracion_valoracion_id')" ;
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
    public function actualizar ($titulo, $genero, $anio, $director, $valoracion_valoracion_id)
    {
    try {
    $con = new ClassConectar();
    $con =$con->ProcedimientoParaConectar();
    $cadena = "UPDATE `peliculas` SET `titulo`='$titulo',`genero`='$genero',`anio`='$anio',`director`='$director','valoracion_valoracion_id`= $valoracion_valoracion_id WHERE 'peliculas_id' = $peliculas_id";
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

    public function eliminar ($peliculas_id)
    {
    try {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "DELETE FROM `peliculas` WHERE `peliculas_id`= $$peliculas_id";
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