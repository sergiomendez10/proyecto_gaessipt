<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div class="login-container">
    <div class="login-box">
      <div class="logo-container">
        <img src="logositppremium.png" alt="Logo" class="logo-small">
      </div>
      <h2>Iniciar Sesión como <?php echo isset($_GET['role']) ? htmlspecialchars($_GET['role']) : ''; ?></h2>
      <p>Ninguno de nosotros es tan bueno como todos nosotros juntos.</p>
      <form action="conect.php" method="post">
        <div class="input-group">
          <input type="text" id="username" name="username" placeholder="correo@ejemplo.com" required>
        </div>
        <div class="input-group">
          <input type="password" id="password" name="password" placeholder="Contraseña" required>
        </div>
        <div class="button-group">
          <button type="submit">Entrar</button>
        </div>
      </form>
    </div>
  </div>
</body>

</html>
