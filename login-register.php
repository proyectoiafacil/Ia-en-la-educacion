<?php
session_start();

// Conexión a SQLite
$db = new PDO('sqlite:usuarios.db');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Crear tabla si no existe
$db->exec("CREATE TABLE IF NOT EXISTS usuarios (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nombre TEXT NOT NULL,
    email TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL
)");

if ($_POST) {
    $response = ['success' => false, 'message' => ''];

    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'login') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            // Buscar usuario
            $stmt = $db->prepare("SELECT * FROM usuarios WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_nombre'] = $user['nombre'];
                $response['success'] = true;
                $response['message'] = 'Inicio de sesión exitoso';
            } else {
                $response['message'] = 'Email o contraseña incorrectos';
            }
        } elseif ($_POST['action'] === 'register') {
            $nombre = $_POST['nombre'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirm_password = $_POST['confirm_password'] ?? '';

            if (empty($nombre) || empty($email) || empty($password)) {
                $response['message'] = 'Todos los campos son obligatorios';
            } elseif ($password !== $confirm_password) {
                $response['message'] = 'Las contraseñas no coinciden';
            } elseif (strlen($password) < 6) {
                $response['message'] = 'La contraseña debe tener al menos 6 caracteres';
            } else {
                // Verificar si ya existe el email
                $stmt = $db->prepare("SELECT * FROM usuarios WHERE email = ?");
                $stmt->execute([$email]);

                if ($stmt->fetch()) {
                    $response['message'] = 'El correo ya está registrado';
                } else {
                    // Insertar usuario nuevo
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $db->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
                    $stmt->execute([$nombre, $email, $hashedPassword]);

                    $response['success'] = true;
                    $response['message'] = 'Registro exitoso. Ahora puedes iniciar sesión.';
                }
            }
        }
    }

    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
?>
