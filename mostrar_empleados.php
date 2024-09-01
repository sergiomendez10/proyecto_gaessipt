<?php
// Conectar a la base de datos
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

// Consulta para obtener todos los empleados
$sql = "SELECT * FROM empleado";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados Registrados</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="table-container">
        <h2>Lista de Empleados</h2>
        <table>
            <thead>
                <tr>
                    <th>ID Empleado</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Móvil</th>
                    <th>Email</th>
                    <th>Cargo</th>
                    <th>Acciones</th> <!-- Nueva columna para acciones -->
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['Id_empleado']}</td>
                                <td>{$row['Nombre']}</td>
                                <td>{$row['Apellido']}</td>
                                <td>{$row['Movil']}</td>
                                <td>{$row['E-mail']}</td>
                                <td>{$row['Cargo']}</td>
                                <td>
                                    <a href='editar_empleado.php?id={$row['Id_empleado']}'>Editar</a> | 
                                    <a href='eliminar_empleado.php?id={$row['Id_empleado']}'>Eliminar</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No hay empleados registrados.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
// Cerrar conexión
$conn->close();
?>