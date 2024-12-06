<?php

function aniadirPelicula($titulo, $genero, $pais, $fecha){
   
            $conexion = new PDO("mysql:host=localhost;dbname=videoclub","root","");
           $statement = $conexion->prepare("INSERT INTO peliculas VALUES(null, '$titulo', '$genero','$pais','$fecha')");
           $statement->execute();
           $resultado = $statement->fetchAll(PDO::FETCH_ASSOC);
           $statement = null;
           $conexion= null;

}

function actualizarProducto($id, $titulo, $genero, $pais, $fecha){

    $query1 = "UPDATE peliculas"
            . " SET titulo = '$titulo', genero = '$genero', pais = '$pais', anyo = '$fecha'"
            . " WHERE id = '$id' ";
    $conexion = new PDO("mysql:host=localhost;dbname=videoclub","root","");
           $statement = $conexion->prepare($query1);
           $statement->execute();
           $statement = null;
           $conexion= null;

}

function findById($id){
    

     $pdo = new PDO("mysql:host=localhost;dbname=videoclub","root","");
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                
               $stmnt = $pdo->prepare(
                    "SELECT peliculas.id, peliculas.titulo, peliculas.genero, peliculas.pais, peliculas.anyo, CONCAT(imagenes.data, ',', imagenes.tipo) AS cartel
                     FROM peliculas 
                     LEFT JOIN imagenes 
                     ON peliculas.id = imagenes.idPelicula
                     WHERE peliculas.id = '$id'"
                );

                
                $stmnt->execute();
                $resultado = $stmnt->fetchAll(PDO::FETCH_ASSOC);
               
  
         $statement = null;
           $conexion= null;
           return $resultado;

}

function deleteProducto($id){

        $conexion = new PDO("mysql:host=localhost;dbname=videoclub","root","");
           $statement2 = $conexion->prepare("DELETE FROM imagenes WHERE idPelicula = '$id'");
           $statement2->execute();
           $statement = $conexion->prepare("DELETE FROM peliculas where id = '$id'");
           $statement->execute();
           $statement = null;
           $conexion= null;

}


function findPeliculas(){
        
            $conexion = new PDO("mysql:host=localhost;dbname=videoclub","root","");
           $statement = $conexion->prepare("SELECT peliculas.id, peliculas.titulo FROM peliculas ");
           $statement->execute();
           $resultado = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
           $statement = null;
           $conexion= null;
        
           
   
}
        ?>
        
        
     
        
