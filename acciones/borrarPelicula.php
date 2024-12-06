<?php

include '../libreria/funciones_mysql.php';
$mensaje = "";
$id = $_POST['id'];
echo $id;
deleteProducto($id);
header("Location: /index.php?mensaje=" . urlencode($id));
exit();

