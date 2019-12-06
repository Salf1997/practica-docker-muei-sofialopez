<?php
require ('db_conn.php');

function find_pass($conn,$usuario,$pass){
    $queryCon="SELECT password FROM usuario WHERE idUsuario='".$usuario."' LIMIT 1";
    $respuesta = $conn->query($queryCon);
    if(!$respuesta){
        echo json_encode(array('tipo'=> 'FALLANDO EN ENCONTRAR PASSWORD'));
    } if($user=$respuesta->fetch_assoc()) {
        if(strcmp($user['password'], $pass)){
            return $user;
        } else {
            return false;
        }
    }else{
        return false;
    }
}
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])=='xmlhttprequest'){
    $conn->set_charset('utf8');

    $usuario = $conn->real_escape_string($_POST['usuario']);
    $pass = $conn->real_escape_string($_POST['password']);

    $encontrado = find_pass($conn,$usuario,$pass);
    if ($encontrado){
        $query='SELECT idUsuario FROM usuario WHERE idUsuario="'.$usuario.'" AND password = "'.$encontrado['password'].'"';
        if($conn->query($query)){      
            $resultado=$conn->query($query);
            if($resultado->num_rows>0):
                $rows=$resultado->fetch_assoc();
                session_start();
                $_SESSION['idUsuario']=$rows['idUsuario'];
                echo json_encode(array('tipo'=> '1'));
            else:
                echo json_encode(array('tipo'=> 'No existe un usuario con estos datos.','encontrado'=>$encontrado)); 
            endif;
        } else{
            echo $query;
        }
    }else{
        echo json_encode(array('tipo'=> 'Datos de ingreso no válidos, inténtelo de nuevo.','encontrado'=>$encontrado));   
 }
    $conn->close();
}
?>

