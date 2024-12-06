<?php
include '../libreria/funciones_mysql.php';
$mensaje = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    print_r($_POST);
    if (isset($_POST['id'],$_POST['titulo'], $_POST['genero'], $_POST['fecha'],  $_POST['pais']) &&
        !empty(trim($_POST['titulo'])) &&
             !empty(trim($_POST['id'])) &&
        !empty(trim($_POST['genero'])) &&        
        !empty(trim($_POST['fecha'])) &&
            !empty(trim($_POST['pais'])) 
       
         ) {
        
        $id = trim($_POST['id']);
        $titulo = trim($_POST['titulo']);
        $genero = trim($_POST['genero']);
        $pais = trim($_POST['pais']);
        $fecha = trim($_POST['fecha']);
        actualizarProducto($id, $titulo, $genero, $pais, $fecha);
        
  

        $mensaje = "Producto agregado exitosamente.";
    } else {
        $mensaje = "Error: Todos los campos son obligatorios.";
    }
} else {
    $mensaje = "Error! Intente de nuevo la operación.";
}


header("Location: /index.php?mensaje=" . urlencode($mensaje));
exit();
?>