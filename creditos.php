<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créditos - IA en la Educación</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/creditos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Navegación -->
    <nav class="navbar">
        <div class="nav-container">
             <div class="nav-logo">
             <img src="imagenes/logo.png" alt="Logo" style="height: 60px;">
                <span>IA en la educación</span>
            </div>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="inicio.php" class="nav-link">
                        <i class="fas fa-home"></i> Inicio
                    </a>
                </li>
                <li class="nav-item">
                    <a href="tipos-ia.php" class="nav-link">
                        <i class="fas fa-robot"></i> Tipos de IA
                    </a>
                </li>
                <li class="nav-item">
                    <a href="recursos-ia.php" class="nav-link">
                        <i class="fas fa-book"></i> Recursos de IA
                    </a>
                </li>
                <li class="nav-item">
                    <a href="cursos-ia.php" class="nav-link">
                        <i class="fas fa-chalkboard-teacher"></i> Cursos de IA
                    </a>
                </li>
                <li class="nav-item">
                    <a href="creditos.php" class="nav-link active">
                        <i class="fas fa-info-circle"></i> Créditos
                    </a>
                </li>
                
            </ul>

            <!-- Menú Usuario -->
            <div class="user-menu">
    <i class="fas fa-user-circle fa-2x" onclick="toggleUserMenu()"></i>
    <div id="userDropdown" class="user-dropdown hidden">
        <p><?php echo isset($_SESSION['user_nombre']) ? '👋 ' . $_SESSION['user_nombre'] : 'Invitado'; ?></p>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
    </div>
</div>

            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="credits-hero">
        <div class="container">
            <div class="hero-content">
                <h1><i class="fas fa-info-circle"></i> Créditos y Equipo</h1>
                <p>Conoce a las personas detrás de IA  en la Educación y ponte en contacto con nosotros</p>
            </div>
        </div>
    </section>

    <!-- Tabs Navigation -->
    <section class="credits-tabs">
        <div class="container">
            <div class="tabs-container">
                <div class="tabs-header">
                    <button class="tab-btn active" data-tab="about">
                        <i class="fas fa-users"></i> Acerca de
                    </button>
                    <button class="tab-btn" data-tab="contact">
                        <i class="fas fa-envelope"></i> Contacto
                    </button>
                </div>
                
                <!-- Tab Content -->
                <div class="tabs-content">
                    <!-- About Tab -->
                    <div class="tab-pane active" id="about-tab">
                        <div class="about-section">
                            <div class="section-header">
                                <h2>Nuestro Equipo</h2>
                                <p>Conoce a las personas que hacen posible IA en la Educación</p>
                            </div>
                            
                            <div class="team-grid">
                                <?php
                                $team = [
                                    [
                                        'nombre' => 'DRA Laura Beatriz Vidal Turrubiates',
                                        'correo' => 'Scrum master',
                                        'cargo' => 'Directora Asesora ',
                                        
                                        'imagen' => 'scrum.png'
                                       
                                    ],
                                    [
                                        'nombre' => 'José Antonio Cuevas Hernández ',
                                        'correo' => 'Product Owner',
                                        'cargo' => 'Desarrollador',
                                        
                                        'imagen' => 'cara-jose.png',
                                        
                                    ],
                                    [
                                        'nombre' => 'Jordin Gael Vasconcelos Rueda',
                                         'correo' => 'Develoment',
                                        'cargo' => 'Desarrollador',
                                       
                                        'imagen' => 'jordi.png'

                                    ]
                                ];
                                
                                foreach($team as $miembro):
                                ?>
                                <div class="team-card">
                                <div class="team-image">
    <?php if (!empty($miembro['imagen'])): ?>
        <img src="imagenes/<?php echo $miembro['imagen']; ?>" alt="<?php echo $miembro['nombre']; ?>">
    <?php else: ?>
        <div class="placeholder-image">
            <i class="fas fa-user"></i>
        </div>
    <?php endif; ?>
</div>


                                    <div class="team-info">
                                        <h3><?php echo $miembro['nombre']; ?></h3>
                                        <span class="team-role"><?php echo $miembro['cargo']; ?></span>
                                        <p><?php echo $miembro['correo']; ?></p>
                                        
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div> 
                            
                            <div class="about-mission">
                                <div class="mission-content">
                                    <h3>Nuestra Misión</h3>
                                    <p>En IA en la educación, nos enfocamos en acercar el conocimiento sobre Inteligencia Artificial a estudiantes, educadores y profesionales de todos los niveles, haciéndolo accesible, comprensible y útil en distintos contextos..</p>
                                    <p>Creemos que la educación en IA debe ser inclusiva y estar disponible para todos, independientemente de su formación técnica previa. Nuestro objetivo es construir una comunidad global de aprendizaje donde el conocimiento fluya libremente y se fomente la innovación responsable.</p>
                                </div>
                                <div class="mission-image">
                                    <div class="mission-icon">
                                        <i class="fas fa-lightbulb"></i>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="about-vision">
                                <div class="vision-image">
                                    <div class="vision-icon">
                                        <i class="fas fa-eye"></i>
                                    </div>
                                </div>
                                <div class="vision-content">
                                    <h3>Nuestra Visión</h3>
                                    <p>Aspiramos a ser la plataforma educativa de referencia en el ámbito de la Inteligencia Artificial en el mundo hispanohablante, ofreciendo recursos de alta calidad que inspiren y capaciten a la próxima generación de innovadores.</p>
                                    <p>Visualizamos un futuro donde la comprensión de la IA sea parte fundamental de la alfabetización digital, permitiendo a las personas aprovechar estas tecnologías de manera ética y responsable para resolver los grandes desafíos de nuestro tiempo.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Contact Tab -->
                    <div class="tab-pane" id="contact-tab">
                        <div class="contact-section">
                            <div class="section-header">
                                <h2>Contacto</h2>
                                <p>¿Tienes preguntas o sugerencias? ¡Nos encantaría escucharte!</p>
                            </div>
                            
                            <div class="contact-container">
                                <div class="contact-form-container">
                                    <form class="contact-form" id="contactForm">
                                        <div class="form-group">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Correo Electrónico</label>
                                            <input type="email" id="email" name="email" placeholder="tu@email.com" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="asunto">Asunto</label>
                                            <input type="text" id="asunto" name="asunto" placeholder="Asunto de tu mensaje" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="mensaje">Mensaje</label>
                                            <textarea id="mensaje" name="mensaje" placeholder="Escribe tu mensaje aquí..." rows="5" required></textarea>
                                        </div>
                                        <button type="submit" class="btn-primary">
                                            <i class="fas fa-paper-plane"></i> Enviar Mensaje
                                        </button>
                                    </form>
                                </div>
                                
                                <div class="contact-info">
                                    <div class="info-card">
                                        <div class="info-icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div class="info-content">
                                            <h3>Ubicación</h3>
                                            <p>tabasco cunduacan, México</p>
                                        </div>
                                    </div>
                                    
                                    <div class="info-card">
                                        <div class="info-icon">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <div class="info-content">
                                            <h3>correo</h3>
                                            <p>proyectoiafacil@gmail.com</p>
                                        </div>
                                    </div>
                                    
                                    <div class="info-card">
                                        <div class="info-icon">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                        <div class="info-content">
                                            <h3>Teléfono</h3>
                                            <p>+52 (55) 1234-5678</p>
                                        </div>
                                    </div>
                                    
                                    <div class="social-links">
                                        <h3>Síguenos</h3>
                                        <div class="social-icons">
                                            <a href="#" class="social-icon">
                                                <i class="fab fa-facebook"></i>
                                            </a>
                                            <a href="#" class="social-icon">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                            <a href="#" class="social-icon">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                            <a href="#" class="social-icon">
                                                <i class="fab fa-linkedin"></i>
                                            </a>
                                            <a href="#" class="social-icon">
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <div class="footer-logo">
                    <img src="imagenes/logo.png" alt="Logo" style="height: 60px;">
                <span>IA en la educación</span>
                    </div>
                    <p>Promoviendo la Inteligencia Artificial en la educación para un futuro más inteligente y accesible.</p>
                </div>
                <div class="footer-section">
                    <h3>Enlaces Rápidos</h3>
                    <ul>
                        <li><a href="index.php">Inicio</a></li>
                        <li><a href="tipos-ia.php">Tipos de IA</a></li>
                        <li><a href="recursos-ia.php">Recursos</a></li>
                        <li><a href="cursos-ia.php">Cursos</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Contacto</h3>
                    <p><i class="fas fa-envelope"></i> proyectoiafacil@gmail.com</p>
                    <p><i class="fas fa-phone"></i> +52 (55) 1234-5678</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 IA Educativa. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <script src="js/script.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tab functionality
            const tabBtns = document.querySelectorAll('.tab-btn');
            const tabPanes = document.querySelectorAll('.tab-pane');
            
            tabBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    // Remove active class from all buttons
                    tabBtns.forEach(b => b.classList.remove('active'));
                    // Add active class to clicked button
                    this.classList.add('active');
                    
                    // Hide all tab panes
                    tabPanes.forEach(pane => pane.classList.remove('active'));
                    
                    // Show the selected tab pane
                    const tabId = this.getAttribute('data-tab');
                    document.getElementById(tabId + '-tab').classList.add('active');
                });
            });
            
            // Contact form submission
            const contactForm = document.getElementById('contactForm');
            if (contactForm) {
                contactForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    // Simulate form submission
                    const submitBtn = this.querySelector('button[type="submit"]');
                    const originalText = submitBtn.innerHTML;
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enviando...';
                    submitBtn.disabled = true;
                    
                    setTimeout(() => {
                        // Show success message
                        showNotification('¡Mensaje enviado con éxito! Nos pondremos en contacto contigo pronto.', 'success');
                        
                        // Reset form
                        contactForm.reset();
                        
                        // Reset button
                        submitBtn.innerHTML = originalText;
                        submitBtn.disabled = false;
                    }, 1500);
                });
            }
            
            // Notification function
            function showNotification(message, type = 'info') {
                const notification = document.createElement('div');
                notification.className = `notification ${type}`;
                notification.textContent = message;
                
                notification.style.cssText = `
                    position: fixed;
                    top: 20px;
                    right: 20px;
                    padding: 15px 20px;
                    border-radius: 8px;
                    color: white;
                    font-weight: 500;
                    z-index: 10000;
                    transform: translateX(100%);
                    transition: transform 0.3s ease;
                `;
                
                if (type === 'success') {
                    notification.style.background = '#10b981';
                } else if (type === 'error') {
                    notification.style.background = '#ef4444';
                } else {
                    notification.style.background = '#3b82f6';
                }
                
                document.body.appendChild(notification);
                
                setTimeout(() => {
                    notification.style.transform = 'translateX(0)';
                }, 100);
                
                setTimeout(() => {
                    notification.style.transform = 'translateX(100%)';
                    setTimeout(() => {
                        notification.remove();
                    }, 300);
                }, 3000);
            }
        });
        
        function toggleUserMenu() {
    const menu = document.getElementById('userDropdown');
    menu.classList.toggle('hidden');
}

document.addEventListener('click', function(event) {
    const userMenu = document.querySelector('.user-menu');
    const dropdown = document.getElementById('userDropdown');
    if (!userMenu.contains(event.target)) {
        dropdown.classList.add('hidden');
    }
});

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php"); // Si no está logueado, manda al login
    exit;
}


    </script>
</body>
</html>
