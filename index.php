<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <style>
            img{
                height: 75px;
                width: 75px;
            }
            td{
                text-align: center;
                align-content: center;
            }
        </style>
    </head>
    <body>
        <?php
            $pdo = new PDO("mysql:host=localhost;dbname=videoclub","root","");
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                
               $stmnt = $pdo->prepare(
                    "SELECT peliculas.id, peliculas.titulo, peliculas.genero, peliculas.pais, peliculas.anyo, CONCAT(imagenes.data, ',', imagenes.tipo) AS cartel
                     FROM peliculas 
                     LEFT JOIN imagenes 
                     ON peliculas.id = imagenes.idPelicula "
                );

                
                $stmnt->execute();
                $resultado = $stmnt->fetchAll(PDO::FETCH_ASSOC);
              

         
        ?>
        <h1> PELICULAS </h1>
        <table class="table table-striped">
            <tr>
                <td> Id </td>
                <td> Titulo </td>
                 <td> Genero </td>
                  <td> Pais </td>
                   <td> Año </td>
                    <td>Cartel </td>
                     <td> </td>
            </tr>  

        <?php        foreach ($resultado as $value) : ?>
               
              
                <?php foreach ($value as $key=>$pelicula) : ?>
              
            <form method="post" action="acciones/borrarPelicula.php">
                
            <input type="hidden" name='<?php echo $key?>' value="<?php echo $pelicula ?>"></input>
             
                 <?php if ($key === 'cartel' ) :?>
                        <?php
                        if(!empty($value['cartel'])){
                            
                        list($imagen_base64, $imagen_tipo) = explode(',', $value['cartel'], 2);
                        }
                        ?>
            <td><img src='<?php echo "data:$imagen_tipo;base64,$imagen_base64"?>' alt="Sube la imagen" /></td>
               <?php else : ?>
                <td><?php echo $pelicula ?></td>
                 <?php endif; ?>
                    <?php        endforeach; ?>
            <td>             <input  type="submit" value="Borrar Pelicula"> </td>
            </form>
                


              </tr>
            <?php        endforeach; ?>
            <div>
                
            
        </table>
        <form action="acciones/buscarPeliculaById.php" method="post" >
            <div class="mb-3">
                
            <input type="number" name="id"> Buscar Por Id
            <input type="submit" name="buscar">
            </div>
            
        </form>
            <a href="formularioPelicula.php" class="btn btn-primary">añadir pelicula </a>
            <a href="formularPeliculaUpdate.php" class="btn btn-primary"> actualizar pelicula </a>
                <a href="formularioSubirImagen.php" class="btn btn-primary"> Subir imagen</a>
            
        
    </body>
</html>
