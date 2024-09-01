<?php
// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "sipt_technology";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $movil = $_POST['movil'];
    $email = $_POST['email'];
    $cargo = $_POST['cargo'];

    $sql = "INSERT INTO empleado (Nombre, Apellido, Movil, `E-mail`, Cargo) VALUES ('$nombre', '$apellido', '$movil', '$email', '$cargo')";

    if ($conn->query($sql) === TRUE) {
        echo "Empleado creado exitosamente.";
        header("Location: dashboard.php"); 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Empleado</title>
    <link rel="stylesheet" href="crear_empleado.css">
</head>
<body>
    <form method="POST" action="">
    <h2>Crear Empleado</h2>
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="apellido" placeholder="Apellido" required>
        <input type="text" name="movil" placeholder="Móvil" required>
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="text" name="cargo" placeholder="Cargo" required>
        <button type="submit">Crear</button>
    </form>
</body>
</html>