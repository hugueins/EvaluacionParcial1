<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if($method == "OPTIONS") {die();}

require_once ("../models/usuarios.models.php");
$actores = new Usuarios;

switch ($_GET["op"]) {
    case "todos":
        $datos =$actores->todos();
        while ($row = mysqli_fetch_assoc ($datos)) {
            $todos[] =$row;
        }
        echo json_encode($todos);
        break;
    case "uno":
        $beneficiario_id =$_POST["beneficiario_id"];
        //var_dump ($beneficiario_id);
        //die;
        $datos = array ();
        $datos = $actores->uno($beneficiario_id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode ($res);
        break;
    case "insertar":
        $nombres = $_POST ["nombres"];
        $identificacion = $_POST ["identificacion"];
        $usuario = $_POST ["usuario"];
        $contraseña = $_POST ["contraseña"];
        $correo = $_POST ["correo"];
        $fecha_nacimiento = $_POST ["fecha_nacimiento"]; 
        $rol_rol_id = $_POST ["rol_rol_id"]; 
        $datos = array ();
        $datos= $actores ->insertar ($nombres, $identificacion, $usuario, $contraseña, $correo, $fecha_nacimiento, $rol_rol_id);
        echo json_encode ($datos);
        break;
    case "actualizar":
        $beneficiario_id = $_POST ["beneficiario_id"];
        $nombres = $_POST ["nombres"];
        $identificacion = $_POST ["identificacion"];
        $usuario = $_POST ["usuario"];
        $contraseña = $_POST ["contraseña"];
        $correo = $_POST ["correo"];
        $fecha_nacimiento = $_POST ["fecha_nacimiento"]; 
        $rol_rol_id = $_POST ["rol_rol_id"]; 
        $datos = array ();
        $datos= $actores ->insertar ($nombres, $identificacion, $usuario, $contraseña, $correo, $fecha_nacimiento, $rol_rol_id);
        echo json_encode ($datos);
        break;
     case "eliminar":
        $actores_id = $_POST ["beneficiario_id"];
        $datos = array ();
        $datos = $actores -> eliminar ($beneficiario_id);
        echo json_encode ($datos);
        break;  
}

?>