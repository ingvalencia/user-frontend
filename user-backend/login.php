<?php
include 'db.php'; // Incluye la conexión a la base de datos

// Obtén el email y la contraseña enviados mediante POST
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (!empty($email) && !empty($password)) {
    // Preparar la sentencia SQL para evitar inyecciones SQL
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        echo "Login successful!";
    } else {
        echo "Invalid email or password!";
    }
} else {
    echo "Please fill all fields!";
}
?>
