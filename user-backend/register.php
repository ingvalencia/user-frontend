<?php
include 'db.php'; // Incluye el script de conexión a la base de datos

// Obtén los datos del formulario enviado mediante POST
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (!empty($name) && !empty($email) && !empty($password)) {
    // Encriptar la contraseña antes de guardarla en la base de datos
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Preparar la sentencia SQL para evitar inyecciones SQL
    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->execute([$name, $email, $passwordHash]);

    echo "User registered successfully!";
} else {
    echo "Please fill all fields!";
}
?>
