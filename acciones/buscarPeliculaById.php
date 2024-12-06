<html>
    <head>
        <title>title</title>
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
        <h1> PELICULA </h1>
        <table>
          <?php     include '../libreria/funciones_mysql.php';
          $id = $_POST['id'];  
          $resultado = findById($id);
            list($imagen_base64, $imagen_tipo) = explode(',', $resultado[0]['cartel'], 2);
            ?>    
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
              
            <form method="post" action="borrarPelicula.php">
                
            <input type="hidden" name='<?php echo $key?>' value="<?php echo $pelicula ?>"></input>
             
                 <?php if ($key === 'cartel') :
                        list($imagen_base64, $imagen_tipo) = explode(',', $value['cartel'], 2);?>
            <td><img src='<?php echo "data:$imagen_tipo;base64,$imagen_base64"?>' /></td>
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

        <a href="../index.php"> Regresar</a>
    </body>
</html>




