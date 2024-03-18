<?php
session_start(); 
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root"; 
$password = ""; /
$dbname = "usuarios";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $usuario = $_POST['Usuario'];
    $contrasena = $_POST['Contrasena'];

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Consulta SQL para verificar las credenciales
    $sql = "SELECT * FROM users WHERE txt_usuario='$usuario' AND txt_password='$contrasena'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Inicio de sesión exitoso
        $_SESSION['usuario'] = $usuario; // Guardar el nombre de usuario en la sesión
        echo "<script>alert('Inicio de sesión exitoso'); window.location.href = 'pagina_principal.php';</script>";
    } else {
        // Credenciales incorrectas
        echo "<script>alert('Usuario o contraseña incorrectos'); window.location.href = 'index.html';</script>";
    }

    // Cerrar la conexión
    $conn->close();
}
?>
