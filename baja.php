<?php
    $mysqli = new mysqli("localhost", "root", "", "empresatec");

    if ($mysqli->connect_errno) {
        die("Error de conexión: " . $mysqli->connect_error);
    }

    $correo = $_GET['correo'];

    $sql = "DELETE FROM usuarios WHERE correo = ?";
    $statement = $mysqli->prepare($sql);
    $statement->bind_param("s", $correo);

    if (!$statement->execute()) {
        die("Error en la consulta: " . $mysqli->error);
    }

    echo "Se ha dado de baja el correo $correo";

    $statement->close();
    $mysqli->close();
?>