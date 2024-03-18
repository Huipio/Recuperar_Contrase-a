<?php
// Datos de conexión a la base de datos
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "usuarios";

// Verificar si se envió el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $usuario = $_POST['Usuario'];

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM users WHERE txt_usuario='$usuario'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Usuario encontrado, recuperar la contraseña
        $row = $result->fetch_assoc();
        $contrasena = $row['txt_password']; // Obtener la contraseña del usuario de la base de datos
        // Mostrar la contraseña
        echo "<h1>Tu Contraseña es: $contrasena</h1><br>";
        echo '<a href="index.html" class="btn btn-primary">Regresar al Login</a>';
    } else {
        // Usuario no encontrado
        echo "<script>alert('El usuario no existe'); window.location.href = 'Recuperar_Contra.php';</script>";

    }

    $conn->close();
}
?>
