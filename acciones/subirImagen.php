<?php

$mensaje = "";
if($_SERVER["REQUEST_METHOD"] === "POST"
        && isset($_FILES['image'])) {
   
     
     //esto es la ruta del archivo
    $img_temp_file = $_FILES['image']['tmp_name'];
    $img_name = $_FILES['image']['name'];
    $img_type = $_FILES['image']['type'];
    $id = $_POST['id'];
    // codificacion en Base64  del contenido del fichero
    
    //aqui se coge el contenido del archivo que esta encriptado con simbolos
    $img_data = file_get_contents($img_temp_file);
    //aqui se convierte el contenido de la imagen en un churro que se almacena en la db
    $img_base64  = base64_encode( $img_data );
    

    try{
        $pdo = new PDO("mysql:host=localhost;dbname=videoclub","root","");
        
        $stmnt = $pdo->prepare("INSERT INTO imagenes (idPelicula, nombre, tipo, data) "
                . " VALUES (:id, :nombre, :tipo, :data) ");
        $stmnt->bindParam(":nombre", $img_name);
        $stmnt->bindParam(":tipo", $img_type);
        $stmnt->bindParam(":data", $img_base64);
        $stmnt->bindParam(":id", $id);
        
        if ($stmnt->execute()){
            $mensaje = "Fichero subido correctamente";
        } else {
            $mensaje = "No se ha poido subir el fichero";
        }
        
    } catch (Exception $ex) {
        $mensaje = "ERROR: " . $ex->getMessage();
    }    
}

header("location: ../index.php");
