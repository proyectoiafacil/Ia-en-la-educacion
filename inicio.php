<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IA en la Educación - Promoviendo la Inteligencia Artificial en la Educación</title>
    <link rel="stylesheet" href="css/styles.css">
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
                    <a href="inicio.php" class="nav-link active">
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
                    <a href="creditos.php" class="nav-link">
                        <i class="fas fa-info-circle"></i> Créditos
                    </a>
                </li>
            </ul>
              <!-- Menú Usuario -->
        <div class="user-menu">
            <i class="fas fa-user-circle fa-2x" onclick="toggleUserMenu()"></i>
            <div id="userDropdown" class="user-dropdown hidden">
                <p><?php echo isset($_SESSION['user_nombre']) ? '👋 ' . $_SESSION['user_nombre'] : 'Invitado'; ?></p>
                <a href="index.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
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
    <section class="hero">
        <div class="hero-container">
            <div class="hero-content">
                <h1>Bienvenido a IA en la Educación</h1>
                <p class="hero-subtitle">Promoviendo la Inteligencia Artificial en la Educación</p>
                <p class="hero-description">
                Una plataforma educativa dedicada a hacer accesible el conocimiento sobre Inteligencia Artificial, 
                proporcionando recursos, cursos y herramientas para estudiantes, educadores y profesionales interesados 
                en el fascinante mundo de la IA.
                </p>
                <div class="hero-buttons">
                    <a href="tipos-ia.php" class="btn btn-primary">
                        <i class="fas fa-rocket"></i> Explorar Tipos de IA
                    </a>
                    <a href="cursos-ia.php" class="btn btn-secondary">
                        <i class="fas fa-play"></i> Ver Cursos
                    </a>
                </div>
            </div>
            <div class="hero-image">
                <div class="floating-elements">
                    <div class="floating-icon" style="--delay: 0s;">
                        <i class="fas fa-brain"></i>
                    </div>
                    <div class="floating-icon" style="--delay: 1s;">
                        <i class="fas fa-robot"></i>
                    </div>
                    <div class="floating-icon" style="--delay: 2s;">
                        <i class="fas fa-microchip"></i>
                    </div>
                    <div class="floating-icon" style="--delay: 3s;">
                        <i class="fas fa-network-wired"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <div class="section-header">
                <h2>¿Qué Encontrarás Aquí?</h2>
                <p>Recursos completos para tu aprendizaje en Inteligencia Artificial</p>
            </div>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-robot"></i>
                    </div>
                    <h3>Tipos de IA</h3>
                    <p>Explora los diferentes tipos de Inteligencia Artificial: Generativa, Predictiva y Cognitiva, con ejemplos prácticos y aplicaciones reales.</p>
                    <a href="tipos-ia.php" class="feature-link">
                        Explorar <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <h3>Recursos de IA</h3>
                    <p>Accede a una biblioteca completa de artículos, videos, herramientas y documentación sobre Inteligencia Artificial.</p>
                    <a href="recursos-ia.php" class="feature-link">
                        Ver Recursos <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h3>Cursos de IA</h3>
                    <p>Participa en cursos estructurados desde nivel básico hasta avanzado, diseñados para diferentes perfiles profesionales.</p>
                    <a href="cursos-ia.php" class="feature-link">
                        Ver Cursos <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>



    <!-- CTA Section -->
    <section class="cta">
        <div class="container">
            <div class="cta-content">
                <h2>¿Listo para Comenzar tu Viaje en IA?</h2>
                <p>Únete a nuestra comunidad educativa y descubre el potencial transformador de la Inteligencia Artificial en la educación.</p>
                <div class="cta-buttons">
                    <a href="tipos-ia.php" class="btn btn-primary">
                        <i class="fas fa-rocket"></i> Comenzar Ahora
                    </a>
                    <a href="recursos-ia.php" class="btn btn-outline">
                        <i class="fas fa-download"></i> Descargar Recursos
                    </a>
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
                    <p><i class="fas fa-phone"></i> +1 (555) 123-4567</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 IA Educativa. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    

<!-- Bot de Navegación -->
<div class="chat-bot">
    <div class="chat-toggle" id="chatToggle">
        <i class="fas fa-robot"></i>
        <span class="chat-notification" id="chatNotification">1</span>
    </div>
    
    <div class="chat-window" id="chatWindow">
        <div class="chat-header">
            <div class="chat-header-info">
                <div class="bot-avatar">
                    <i class="fas fa-robot"></i>
                </div>
                <div class="bot-info">
                    <h4>IA Assistant</h4>
                    <span class="bot-status">En línea</span>
                </div>
            </div>
            <button class="chat-close" id="chatClose">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <div class="chat-messages" id="chatMessages">
            <div class="message bot-message">
                <div class="message-avatar">
                    <i class="fas fa-robot"></i>
                </div>
                <div class="message-content">
                    <p>¡Hola! 👋 Soy tu asistente de navegación.</p>
                </div>
            </div>
        </div>
        
        <div class="chat-input">
            <input type="text" id="chatInput" placeholder="Escribe a dónde quieres ir..." autocomplete="off">
            <button id="chatSend">
                <i class="fas fa-paper-plane"></i>
            </button>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const chatToggle = document.getElementById('chatToggle');
    const chatWindow = document.getElementById('chatWindow');
    const chatClose = document.getElementById('chatClose');
    const chatMessages = document.getElementById('chatMessages');
    const chatInput = document.getElementById('chatInput');
    const chatSend = document.getElementById('chatSend');
    const quickButtons = document.querySelectorAll('.quick-btn');

    // Abrir/cerrar chat
    chatToggle.addEventListener('click', () => {
        chatWindow.classList.toggle('active');
    });

    // Cerrar chat con la X
    chatClose.addEventListener('click', () => {
        chatWindow.classList.remove('active');
    });

    // Activar botón enviar
    chatInput.addEventListener('input', () => {
        chatSend.disabled = !chatInput.value.trim();
    });

    // Enviar con Enter
    chatInput.addEventListener('keypress', e => {
        if (e.key === 'Enter' && !chatSend.disabled) {
            sendMessage();
        }
    });

    // Botones rápidos
    quickButtons.forEach(button => {
        button.addEventListener('click', () => {
            const destination = button.dataset.destination;
            appendMessage(`Quiero ver ${destination}`, 'user');
            fetchBotResponse(destination);
        });
    });

    // Enviar mensaje
    chatSend.addEventListener('click', sendMessage);

    function sendMessage() {
        const message = chatInput.value.trim();
        if (!message) return;

        appendMessage(message, 'user');
        chatInput.value = '';
        chatSend.disabled = true;

        fetchBotResponse(message);
    }

    function fetchBotResponse(message) {
        fetch('chatbot.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ message })
        })
        .then(res => res.json())
        .then(data => {
            if (data.error) {
                appendMessage('Error: ' + data.error, 'bot');
            } else {
                if (typeof data.answer === 'object') {
                    appendMessage(JSON.stringify(data.answer, null, 2), 'bot');
                } else {
                    appendMessage(data.answer, 'bot');
                }
            }
        })
        .catch(() => {
            appendMessage('Error de conexión con el servidor.', 'bot');
        });
    }

    // 💡 Formatear automáticamente listas y párrafos en respuestas del bot
    function formatBotMessage(text) {
        // Detecta listas con guiones
        if (text.includes('- ')) {
            const items = text.split('\n').filter(line => line.startsWith('- '));
            if (items.length > 0) {
                const listHtml = items.map(item => `<li>${item.replace('- ', '')}</li>`).join('');
                return `<ul>${listHtml}</ul>`;
            }
        }
        // Detecta párrafos con saltos dobles
        if (text.includes('\n\n')) {
            return '<p>' + text.replace(/\n\n/g, '</p><p>').replace(/\n/g, '<br>') + '</p>';
        }
        // Salto simple de línea a <br>
        return text.replace(/\n/g, '<br>');
    }

    function appendMessage(text, sender) {
        const messageDiv = document.createElement('div');
        messageDiv.classList.add('message', sender === 'user' ? 'user-message' : 'bot-message');

        const avatarDiv = document.createElement('div');
        avatarDiv.classList.add('message-avatar');
        avatarDiv.innerHTML = sender === 'user' ? '<i class="fas fa-user"></i>' : '<i class="fas fa-robot"></i>';

        const contentDiv = document.createElement('div');
        contentDiv.classList.add('message-content');

        if(sender === 'bot'){
            contentDiv.innerHTML = formatBotMessage(text); // ✨ Formateado
        } else {
            contentDiv.textContent = text; // Seguridad para entrada del usuario
        }

        messageDiv.appendChild(avatarDiv);
        messageDiv.appendChild(contentDiv);
        chatMessages.appendChild(messageDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;

        // Sonido simple cuando responde el bot
        if(sender === 'bot') {
            const audio = new Audio('https://www.myinstants.com/media/sounds/message-pop.mp3');
            audio.play();
        }
    }

});
function formatBotMessage(text) {
    // Detectar listas con guiones o asteriscos
    const listItems = text.split('\n').filter(line => line.match(/^(\-|\*)\s+/));
    if (listItems.length > 0) {
        const listHtml = listItems.map(item => {
            return `<li>${item.replace(/^(\-|\*)\s+/, '')}</li>`;
        }).join('');
        return `<ul>${listHtml}</ul>`;
    }

    // Detectar párrafos dobles
    if (text.includes('\n\n')) {
        return '<p>' + text.replace(/\n\n/g, '</p><p>').replace(/\n/g, '<br>') + '</p>';
    }

    // Saltos simples
    return text.replace(/\n/g, '<br>');
}


</script>
<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
