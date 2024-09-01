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

$sql = "DELETE FROM empleado WHERE Id_empleado='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Empleado eliminado exitosamente.";
    header("Location: dashboard.php"); 
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
