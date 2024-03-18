<?php
session_start();
// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header('Location: index.html'); /
    exit(); 
}

// Verificar si se hace clic en el botón "Cerrar Sesión"
if(isset($_POST['cerrar_sesion'])) {
    // Eliminar todas las variables de sesión
    session_unset();
    // Destruir la sesión
    session_destroy();
    // Redirigir a la página de inicio de sesión
    header('Location: index.html');
    exit(); // Finalizar la ejecución del script
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Página Principal</title>
</head>
<body>
    <h1>Bienvenido <?php echo $_SESSION['usuario']; ?></h1>
    <form method="post" action="">
        <input type="submit" name="cerrar_sesion" value="Cerrar Sesión">
    </form>
</body>
</html>
