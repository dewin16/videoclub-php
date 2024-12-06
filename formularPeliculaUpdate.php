<html>
    <head>
        <title>title</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>
    <body>

        <form action="acciones/actualizarPelicula.php" method="post">
            
            <div class="mb-3">
                
            <input type="number" name="id">id pelicula</input>
                </div>
            
            <div class="mb-3">
                
            <input type="text" name="titulo">Nombre de pelicula</input>
                </div>
            <div class="mb-3">
                
            <input type="text" name="genero"> Genero pelicula </input>
            </div>
            <div class="mb-3">
                
            <input type="date" name="fecha"> Fecha estreno </input>
            </div>
            <div class="mb-3">
                <input type="text" name="pais"> Pais donde se hizo </input>
            </div>
           
            <div class="mb-3">
                <input type="submit">  </input>
            </div>
            
        </form>
          <a href="index.php" class="btn btn-primary"> Pagina principal</a>
    </body>
</html>

<?php


