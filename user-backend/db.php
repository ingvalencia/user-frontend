<?php
$host = 'localhost'; // Host de MySQL
$db_name = 'user_system'; // Nombre de la base de datos
$username = 'root'; // Nombre de usuario por defecto de XAMPP
$password = ''; // Contraseña por defecto de XAMPP (vacía)

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    // Configurar el modo de error de PDO a excepción
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
