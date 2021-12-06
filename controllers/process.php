<?php
    //Conexion a la base de datos
    $mysqli = new mysqli('localhost:3306','root','','crud') or die(mysqli_error($mysqli));
    //Si el boton save es click guarda los datos en las variables
    if (isset($_POST['save'])){
        $name = $_POST['name'];
        $location = $_POST['location'];
    //ejecuta la consulta para insertar los datos en la base de datos
        $mysqli->query("INSERT INTO data (name,location) VALUES('$name', '$location')") or die($mysqli->error);
    }

    if (isset($_GET['delete'])){
        $id = $_GET['delete'];
        $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());
    }
?>