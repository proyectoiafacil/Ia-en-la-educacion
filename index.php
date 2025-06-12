<?php
session_start();

// Procesar formularios
if ($_POST) {
    $response = ['success' => false, 'message' => ''];
    
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'login') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            
            // Usuarios de prueba
            $testUsers = [
                'admin@test.com' => ['password' => 'admin123', 'nombre' => 'Administrador'],
                'usuario@test.com' => ['password' => 'user123', 'nombre' => 'Usuario Test']
            ];
            
            if (isset($testUsers[$email]) && $testUsers[$email]['password'] === $password) {
                $_SESSION['user_id'] = 1;
                $_SESSION['user_email'] = $email;
                $_SESSION['user_nombre'] = $testUsers[$email]['nombre'];
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
                $response['success'] = true;
                $response['message'] = 'Registro exitoso. Ahora puedes iniciar sesión.';
            }
        }
    }
    
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/login-styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <div class="login-header">
                <h1><i class="fas fa-robot"></i> </h1>
            </div>

            <!-- Formulario de Login -->
            <div class="form-container" id="loginForm">
                <h2>Iniciar Sesión</h2>
                <form id="loginFormElement">
                    <div class="input-group">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" placeholder="Correo electrónico" required>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Contraseña" required>
                    </div>
                    <button type="submit" class="btn-primary">Iniciar Sesión</button>
                </form>
                <p class="switch-form">¿No tienes cuenta? <a href="#" onclick="showRegister()">Regístrate</a></p>
                
                
            </div>

            <!-- Formulario de Registro -->
            <div class="form-container hidden" id="registerForm">
                <h2>Crear Cuenta</h2>
                <form id="registerFormElement">
                    <div class="input-group">
                        <i class="fas fa-user"></i>
                        <input type="text" name="nombre" placeholder="Nombre completo" required>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" placeholder="Correo electrónico" required>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Contraseña (mín. 6 caracteres)" required>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="confirm_password" placeholder="Confirmar contraseña" required>
                    </div>
                    <button type="submit" class="btn-primary">Crear Cuenta</button>
                </form>
                <p class="switch-form">¿Ya tienes cuenta? <a href="#" onclick="showLogin()">Inicia sesión</a></p>
            </div>
        </div>

        
    </div>

    <!-- Modal para mensajes -->
    <div class="modal" id="messageModal">
        <div class="modal-content">
            <h3 id="modalTitle">Mensaje</h3>
            <p id="modalMessage"></p>
            <button onclick="closeModal()" class="btn-primary">OK</button>
        </div>
    </div>

    <script src="js/login-script.js"></script>
</body>
</html>
