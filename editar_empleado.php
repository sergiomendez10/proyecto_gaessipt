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

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $movil = $_POST['movil'];
    $email = $_POST['email'];
    $cargo = $_POST['cargo'];

    $sql = "UPDATE empleado SET Nombre='$nombre', Apellido='$apellido', Movil='$movil', `E-mail`='$email', Cargo='$cargo' WHERE Id_empleado='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Empleado actualizado exitosamente.";
        header("Location: dashboard.php"); 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Obtener datos del empleado
$sql = "SELECT * FROM empleado WHERE Id_empleado='$id'";
$result = $conn->query($sql);
$empleado = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empleado</title>
    <link rel="stylesheet" href="crear_empleado.css">
</head>
<body>
    <form method="POST" action="">
    <h2>Editar Empleado</h2>
    <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $empleado['Nombre']; ?>" required>
        <label for="nombre">Apellido:</label>
        <input type="text" name="apellido" value="<?php echo $empleado['Apellido']; ?>" required>
        <label for="nombre">Movil:</label>
        <input type="text" name="movil" value="<?php echo $empleado['Movil']; ?>" required>
        <label for="nombre">Email:</label>
        <input type="email" name="email" value="<?php echo $empleado['E-mail']; ?>" required>
        <label for="nombre">Cargo:</label>
        <input type="text" name="cargo" value="<?php echo $empleado['Cargo']; ?>" required>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>