<?php
    // Recuperar los valores del formulario
    $dbhost = "localhost";
    $dbname = "base_cliente";
    $dbuser = "root";
    $dbpass = "";
    // Obtener los datos del formulario
    $nombre = $_POST['nombreCliente'];
    $email = $_POST['correoCliente'];
    $msj = $_POST['Comentarios'];
    $num = $_POST['telefono'];
    $especialidad = $_POST['especialidad'];

    // Conectarse a la base de datos
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass);

    // Verificar la conexión
    if (!$conn) {
        die('Error al conectarse a la base de datos: ' . mysqli_connect_error());
    }

    // Seleccionar la base de datos
    mysqli_select_db($conn, $dbname);

    // Insertar los datos del usuario en la base de datos
    $sql = "INSERT INTO clientes(nombreCliente) VALUES ('$nombre');";
    $sql2 = "INSERT INTO informacionclientes(correoCliente, telefono, especialidad) values ('$email', '$num', '$especialidad');";
    $sql3 = "INSERT INTO comentarios(Comentarios) values ('$msj');";
    /* $sql2 = "INSERT INTO comentarios (Comentarios) VALUES ('$msj')";
    $sql3 = "INSERT INTO informacionclientes (correoCliente, telefono, especialidad) VALUES ('$email', '$num', '$especialidad')"; */

    if((mysqli_query($conn, $sql)) && (mysqli_query($conn, $sql2)) && (mysqli_query($conn,$sql3))) {
        header("Location: ./registroExitoso.html");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Cerrar la conexión
    mysqli_close($conn);

?>