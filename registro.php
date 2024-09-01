<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="registro.css">
</head>
<body>
    <div class="form-container">
        <!-- Imagen del logo arriba del formulario -->
        <img src="logositppremium.png" alt="Logo" class="logo">
        
        <h2>Crear Cuenta</h2>
        <form action="procesar_registro.php" method="POST">
            <label for="username">Nombre de usuario:</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Correo electrónico:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <label for="first_name">Nombre:</label>
            <input type="text" id="first_name" name="first_name" required>

            <label for="last_name">Apellido:</label>
            <input type="text" id="last_name" name="last_name" required>

            <label for="phone_number">Número de teléfono:</label>
            <input type="tel" id="phone_number" name="phone_number">

            <button type="submit">Registrarse</button>
        </form>
    </div>
</body>
</html>



