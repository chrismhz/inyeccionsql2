<?php
    $mysqli = new mysqli("localhost", "root", "", "empresatec");

    
    if ($mysqli->connect_errno) {
        die("Error en la conexión: " . $mysqli->connect_error);
    }

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST['nombre'];
        $clave = $_POST['clave'];

        
        if ($nombre === "'or '1'='1" && $clave === "'or '1'='1") {
            $sql = "SELECT * FROM usuarios";
        } else {
            
            $sql = "SELECT * FROM usuarios WHERE nombre = ? AND clave = ?";
        }

        $statement = $mysqli->prepare($sql);

        
        if ($nombre !== "'or '1'='1" && $clave !== "'or '1'='1") {
            $statement->bind_param("ss", $nombre, $clave);
        }

        if (!$statement->execute()) {
            die("Error en select: " . $mysqli->error);
        }

        $result = $statement->get_result();

        
        while ($row = $result->fetch_assoc()) {
            echo "SELECT * FROM usuarios WHERE nombre = '$nombre'<br/>";
            echo "Array ( ";
            foreach ($row as $key => $value) {
                echo "[$key] => $value ";
            }
            echo ")<br/>";
        }

        $statement->close();
    }

    $mysqli->close();
?>



<!-- ' or'1'='1>
<!- 'or '1'='1>