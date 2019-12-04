<?php
require('db_conn.php');

$conn->set_charset('utf8');

$id = $conn->real_escape_string($_POST['usuarioN']);
$pass = $conn->real_escape_string($_POST['passwordN']);

$comprobacion= "SELECT COUNT(idUsuario) AS 'contar' FROM usuario  WHERE idUsuario='".$id."'";

$result_comp= $conn->query($comprobacion);
$row_comp=$result_comp->fetch_assoc();
$contador_comp=$row_comp['contar'];

if(empty($contador_comp)):
    $insercion="INSERT INTO usuario(idUsuario, password) VALUES ('".$id."','".$pass."')";
    if ($conn->query($insercion)){
       	echo json_encode(array('tipo'=>'Usuario insertado de manera exitosa.','contador'=>$contador_comp));
    } else {
        echo json_encode(array('tipo'=>'Error: '.$conn->error,'contador'=>$contador_comp));
    }
else:
    echo json_encode(array('tipo'=>'Error: Usuario existente.','contador'=>$contador_comp));
endif;
?>
