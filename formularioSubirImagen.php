<html>
    <head>
        <title>Formulario subir imagenes</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>
    <body>

        <form action="acciones/subirImagen.php" method="POST" enctype="multipart/form-data">
            <label>Adjunta aqui tu imagen</label> <br />
            <input type="file" id="image" name="image" accept="image/*"
                   required/> <br />
             <?php include 'libreria/funciones_mysql.php';
                   $resultado = findPeliculas();
                   ?>
            <select id="id" name="id">
                 <?php                foreach ($resultado as  $value) :  ?>
                <option value=" <?php echo $value['id']; ?>"> <?php echo $value['titulo'];                ?></option>
                 <?php endforeach; ?>
                
            </select>

            <input type="submit" /> <br />
        </form>

                <a href="index.php" class="btn btn-primary"> Pagina principal</a>
    </body>
</html>
