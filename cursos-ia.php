<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos de IA - IA Educativa</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/cursos.css">
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
                    <a href="cursos-ia.php" class="nav-link active">
                        <i class="fas fa-chalkboard-teacher"></i> Cursos de IA
                    </a>
                </li>
                <li class="nav-item">
                    <a href="creditos.php" class="nav-link">
                        <i class="fas fa-info-circle"></i> Créditos
                    </a>
                </li>
            </ul>
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
    <section class="courses-hero">
        <div class="container">
            <div class="hero-content">
                <h1><i class="fas fa-chalkboard-teacher"></i> Cursos y Conferencias de IA</h1>
                <p>Aprende Inteligencia Artificial con los mejores cursos gratuitos y conferencias subtituladas</p>
                  

            <div class="header-content">
                <nav class="header-nav">
                    <a href="#free" class="nav-link active">Gratuitos</a>
                   
                 <a href="#conference" class="nav-link active">Conferencias</a>
               
                </nav>
        </div>
        
            </div>
        </div>
    </section>

    <!-- Cursos Section -->
    <section class="courses-section">
        <div class="container">
            
            <?php
            $cursos = [
                'free' => [
                    'titulo' => 'Cursos Gratuitos',
                    'icono' => 'fas fa-gift',
                    'items' => [
                        [
                            'titulo' => 'inteligencia artificial con python',
                            'descripcion' => 'Curso de Inteligencia Artificial con Python .',
                            'instructor' => 'Javier Finance',
                            'plataforma' => 'Udemy',
                            'fecha' => '2024-01-15',
                            'url' => 'https://www.udemy.com/course/inteligencia-artificial-gratis-python/',
                            'duracion' => '1 h 44 min ',
                            'idioma' => 'Español',
                            'subtitulos' => 'Español, Inglés',
                            'imagen' => 'udemy.png',
                            'gratis' => true
                        ],
                        [
                            'titulo' => 'Introducción a la IA generativa. ',
                            'descripcion' => 'los tipos de modelos de IA generativa y las aplicaciones de IA generativa..',
                            'instructor' => 'google',
                            'plataforma' => 'cloudskillsboost',
                            'fecha' => '2025-10-25',
                            'url' => 'https://cloud.google.com/learn/training/machinelearning-ai',
                            'duracion' => ' 45 minutos',
                            'idioma' => 'Ingles',
                            'subtitulos' => 'Español, Inglés',
                            'imagen' => 'cursos.png',
                            'gratis' => true
                        ],
                        [
                            'titulo' => ' teoría y práctica para aprender los fundamentos de la IA ',
                            'descripcion' => '¿Cómo deberíamos definir la IA?',
                            'instructor' => 'Elements of AI',
                            'plataforma' => 'Elements of AI',
                            'fecha' => '2025-01-28',
                            'url' => 'https://course.elementsofai.com/es/',
                           
                            'duracion' => '4 semanas',
                            'idioma' => 'Español',
                            'subtitulos' => 'Español, Inglés, Francés',
                            'imagen' => 'helsinki.png',
                            'gratis' => true,
                            'certificado' => false
                        ]
                    ]
                ],
                'conference' => [
                    'titulo' => 'Conferencias y Charlas',
                    'icono' => 'fas fa-microphone-alt',
                    'items' => [
                        [
                            'titulo' => 'La industria de inteligencia artificial de América del Norte',
                            'descripcion' => 'explorar avances en IA generativa, infraestructura, políticas y aplicaciones en diversos sectores.',
                            'instructor' => '  ejecutivos',
                        
                            'fecha' => '2025-08-13',
                            'url' => ' https://ai4.io/vegas/',
                        
                            'duracion' => '3 días',
                            'idioma' => 'Inglés',
                            'subtitulos' => 'Español, Inglés, Francés, Alemán',
                            'imagen' => 'conferencia1.png'
                         
                        ],
                        [
                            'titulo' => 'Congreso Mexicano de Inteligencia Artificial ',
                            'descripcion' => 'Congreso nacional que incluye conferencias magistrales  de trabajos de investigación en IA..',
                            'instructor' => 'Universidad Panamericana',
                           
                            'fecha' => '2025-05-12',
                            'url' => 'http://smia.mx/comia/2025/',
                         
                            'duracion' => '4 dias',
                            'idioma' => 'Español',
                            'subtitulos' => 'Español, Inglés, Portugués',
                            'imagen' => 'conferencia2.png'
                          
                        ],
                        [
                            'titulo' => 'Congreso America Digital México ',
                            'descripcion' => 'discutir tendencias tecnológicas, incluyendo IA aplicada a negocios y digitalización.',
                            'instructor' => 'Ejecutivos y expertos tecnológicos',
                          
                            'fecha' => '2025-01-18',
                            'url' => 'https://mx.america-digital.com',
                          
                            'duracion' => '2 días',
                            'idioma' => 'Español',
                            'subtitulos' => 'Español, Inglés',
                            'imagen' => 'conferencia3.png'
                         
                        ]
                    ]
                ]
            ];
            ?>

            <!-- Estadísticas de Cursos -->
            <div class="courses-stats">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-gift"></i>
                    </div>
                    <div class="stat-info">
                        <h3><?php echo count($cursos['free']['items']); ?></h3>
                        <p>Cursos Gratuitos</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-microphone-alt"></i>
                    </div>
                    <div class="stat-info">
                        <h3><?php echo count($cursos['conference']['items']); ?></h3>
                        <p>Conferencias</p>
                    </div>
                </div>
            </div>


            <?php foreach ($cursos as $id => $categoria): ?>
  <div id="<?= $id ?>" class="scroll-block" style="padding: 80px 0;">
    <div class="container">
      <div class="category-header">
        <h2><i class="<?= $categoria['icono'] ?>"></i> <?= $categoria['titulo'] ?></h2>
        <span class="category-count"><?= count($categoria['items']) ?> cursos</span>
      </div>

      <div class="courses-cards">
        <?php foreach ($categoria['items'] as $curso): ?>
          <div class="course-card" data-nivel="<?= strtolower($curso['nivel']) ?>">
            <div class="course-image">
              <img src="imagenes/<?= $curso['imagen'] ?>" alt="<?= $curso['titulo'] ?>">
              <div class="course-badges">
                <?php if ($curso['gratis']): ?>
                  <span class="badge badge-free">Gratis</span>
                <?php endif; ?>
                <?php if ($curso['certificado']): ?>
                  <span class="badge badge-certificate">Certificado</span>
                <?php endif; ?>
                <span class="badge badge-level"><?= $curso['nivel'] ?></span>
              </div>
            </div>
            <div class="course-content">
              <h3><?= $curso['titulo'] ?></h3>
              <p class="course-description"><?= $curso['descripcion'] ?></p>
              <div class="course-meta">
                <div class="meta-item"><i class="fas fa-chalkboard-teacher"></i> <?= $curso['instructor'] ?></div>
                <div class="meta-item"><i class="fas fa-globe"></i> <?= $curso['idioma'] ?></div>
                <div class="meta-item"><i class="fas fa-clock"></i> <?= $curso['duracion'] ?></div>
               
              </div>
            </div>
            <div class="course-actions">
              <a href="<?= $curso['url'] ?: '#' ?>" class="btn-primary" target="_blank">
                <i class="fas fa-external-link-alt"></i> Ver Curso
              </a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
<?php endforeach; ?>

            <!-- Mensaje cuando no hay resultados -->
            <div class="no-results" id="noResults" style="display: none;">
                <div class="no-results-content">
                    <i class="fas fa-search"></i>
                    <h3>No se encontraron cursos</h3>
                    <p>Intenta con otros términos de búsqueda o cambia los filtros.</p>
                    <button class="btn-primary" onclick="clearFilters()">
                        <i class="fas fa-refresh"></i> Limpiar Filtros
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Plataformas Section -->
    <section class="platforms-section">
        <div class="container">
            <div class="section-header">
                <h2>Plataformas Recomendadas</h2>
                <p>Las mejores plataformas para aprender Inteligencia Artificial</p>
            </div>
            
            <div class="platforms-grid">
                <div class="platform-card">
                    <div class="platform-logo">
                        <img src="imagenes/coursera.png" alt="Coursera">
                    </div>
                    <h3>Coursera</h3>
                    <p>Cursos y especializaciones de las mejores universidades y empresas del mundo.</p>
                    <a href="https://www.coursera.org/browse/data-science/machine-learning" target="_blank" class="platform-link">
                        Ver cursos <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                
                
                <div class="platform-card">
                    <div class="platform-logo">
                        <img src="imagenes/udemy1.png" alt="Udemy">
                    </div>
                    <h3>Udemy</h3>
                    <p>Cursos prácticos creados por expertos en la industria de la IA.</p>
                    <a href="https://www.udemy.com/topic/artificial-intelligence/" target="_blank" class="platform-link">
                        Ver cursos <i class="fas fa-arrow-right"></i>
                    </a>
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
                        <li><a href="inicio.php">Inicio</a></li>
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

    <script src="js/recursos.js"></script>
    
</body>
</html>
