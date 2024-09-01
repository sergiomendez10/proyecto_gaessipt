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

// Consultar la tabla empleados
$sql = "SELECT * FROM empleado";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .table-container {
            max-width: 1000px; /* Ajusta el ancho máximo según sea necesario */
            margin: 0 auto; /* Centra el contenedor de la tabla */
            text-align: center; /* Centra el texto en el contenedor */
        }
        table {
            width: 100%; /* Hace que la tabla ocupe todo el ancho del contenedor */
            border-collapse: collapse; /* Elimina el espacio entre celdas */
        }
        th, td {
            border: 1px solid #dddddd; /* Agrega bordes a las celdas */
            padding: 8px; /* Agrega espacio interno en las celdas */
        }
        th {
            background-color: #f2f2f2; /* Color de fondo para los encabezados */
        }
    </style>
</head>
<div class="container"></div>
<a href="index.php" id="botonlogout" class="btn-logout">cerrar sesion</a>
</div>
<body>
    <div class="table-container">
    <div class="logo-container">
    <img src="logositppremium.png" alt="Logo" class="logo-small">
        <h2>Empleados Registrados</h2>
        <button name="button" id="boton_sergio"> <a href='crear_empleado.php?id={$row['Id_empleado']}'>Adicionar registro</a></button>
        <?php if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Móvil</th>
                        <th>E-mail</th>
                        <th>Cargo</th>
                        <th>Acciones</th> <!-- Nueva columna para acciones -->
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['Id_empleado']; ?></td>
                            <td><?php echo $row['Nombre']; ?></td>
                            <td><?php echo $row['Apellido']; ?></td>
                            <td><?php echo $row['Movil']; ?></td>
                            <td><?php echo $row['E-mail']; ?></td>
                            <td><?php echo $row['Cargo']; ?></td>
                            <td>
                            <button name="button" id="boton_editar"> <a href='editar_empleado.php?id=<?php echo $row['Id_empleado']?>'>Editar</a></button>| 
                            <button name="button" id="boton_eliminar"> <a href='eliminar_empleado.php?id=<?php echo $row['Id_empleado']?>'>Eliminar</a></button>
                                </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hay empleados registrados.</p>
        <?php endif; ?>
    </div>

    <?php $conn->close(); ?>
</body>
</html>


