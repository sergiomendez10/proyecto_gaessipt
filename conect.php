<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "sipt_technology";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se recibieron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Asegúrate de que los datos estén disponibles
    $loginusuario = isset($_POST['username']) ? $_POST['username'] : '';
    $Contraseña = isset($_POST['password']) ? $_POST['password'] : '';

    // Imprimir el contenido de $_POST para depuración
    var_dump($_POST); // Esto debe mostrar los valores de username y password

    // Consulta SQL de inserción
    $sql = "SELECT * FROM `usuario` WHERE email= '$loginusuario' and Contraseña='$Contraseña'";

    // Ejecutar la consulta y verificar errores
    if ($result = $conn->query($sql)) {
        if ($result->num_rows > 0) {
            // Redirigir a dashboard.php
            header("Location: dashboard.php"); 
            exit; // Asegúrate de usar exit después de header()
        } else {
            echo "Usuario o contraseña incorrectos.";
        }
    } else {
        echo "Error en la consulta: " . $conn->error; // Mostrar error de consulta
    }
} else {
    echo "No se recibieron datos del formulario."; // Mensaje si no se reciben datos
}

// Cerrar conexión
$conn->close();
?>