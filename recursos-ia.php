<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recursos de IA - IA Educativa</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/recursos.css">
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
                    <a href="recursos-ia.php" class="nav-link active">
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
    <section class="resources-hero">
        <div class="container">
            <div class="hero-content">
                <h1><i class="fas fa-book-open"></i> Biblioteca de Recursos de IA</h1>
                <p>Descubre una colección completa de recursos educativos sobre Inteligencia Artificial</p>
                
                <!-- Buscador -->
               
                
        <div class="header-content">
            <nav class="header-nav">
                <a href="#articles" class="nav-link active">Artículos</a>
                <a href="#videos" class="nav-link active">Videos</a>
                <a href="#docs" class="nav-link active">Descargas</a>
             
            </nav>
        </div>
       </div>
        </div>
    </section>

    <section class="resources-section">
        <div class="container">
            
            <?php
            $recursos = [
                'articles' => [
                    'titulo' => 'Artículos y Blogs',
                    'icono' => 'fas fa-newspaper',
                    'items' => [
                        [
                            'titulo' => 'Introducción a la Inteligencia Artificial',
                            'descripcion' => 'Una guía completa para principiantes sobre los conceptos fundamentales de la IA.',
                            'autor' => 'FundsPeople',
                            'fecha' => '2024-04-19',
                            'url' => 'https://fundspeople.com/es/glosario/inteligencia-artificial-guia-imprescindible-para-entender-conceptos-fundamentales/'
                        ],
                        [
                            'titulo' => 'Machine Learning: Algoritmos y Aplicaciones',
                            'descripcion' => 'Descubre los principales beneficios del Machine Learning.',
                            'autor' => 'iberdrola',
                            'fecha' => '2024-02-10',
                            'url' => 'https://www.iberdrola.com/conocenos/nuestro-modelo-innovacion/machine-learning-aprendizaje-automatico',
                            
                            'tiempo' => '25 min'
                        ],
                        [
                            'titulo' => 'Ética en Inteligencia Artificial',
                            'descripcion' => 'Consideraciones éticas y responsabilidad en el desarrollo de sistemas de IA.',
                            'autor' => 'Tecnologico de monterrey',
                            'fecha' => '2024-02-12',
                            'url' => 'https://observatorio.tec.mx/principios-eticos-de-la-educacion-con-inteligencia-artificial-ia/',
                            
                            'tiempo' => '20 min'
                        ]
                    ]
                ],
                'videos' => [
                    'titulo' => 'Videos Educativos',
                    'icono' => 'fas fa-video',
                    'items' => [
                        [
                            'titulo' => 'IA Explicada en 10 Minutos',
                            'descripcion' => 'Video introductorio que explica los conceptos básicos de la IA de manera simple.',
                            'autor' => 'Doneby Laura',
                            'fecha' => '2024-05-15',
                            'url' => 'https://youtu.be/-idMBeCCCzs?si=1Jp4hBD-AQu68Uop',
                            
                            'tiempo' => '10 min'
                        ],
                        [
                            'titulo' => 'Redes Neuronales ',
                            'descripcion' => 'Tutorial completo sobre cómo funcionan las redes neuronales.',
                            'autor' => '3Blue1Brown',
                            'fecha' => '2024-09-24',
                            'url' => 'https://www.youtube.com/watch?v=jKCQsndqEGQ',
                         
                            'tiempo' => '45 min'
                        ],
                        [
                            'titulo' => 'ChatGPT y Modelos de Lenguaje',
                            'descripcion' => '¿Qué es un LLM? Enormes Modelos del Lenguaje | Large Language Models.',
                            'autor' => 'Dot CSV',
                            'fecha' => '2022-06-05',
                            'url' => 'https://www.youtube.com/watch?v=Sz4qacFBHLk',
                            
                            'tiempo' => '60 min'
                        ]
                    ]
                ],
                
                'docs' => [
                    'titulo' => 'Descargas',
                    'icono' => 'fas fa-file-alt',
                    'items' => [
                        [
                            'titulo' => 'Inteligencia artifical',
                            'descripcion' => 'Métodos, Técnicas y Aplicaciones .',
                            'autor' => 'José tómas palma',
                            'fecha' => '2011-02-12',
                            'url' => 'https://drive.google.com/file/d/1-05mQtbnZzKIKJ2FZQz53PoOKIC70xsS/view?usp=sharing',
                            
                            'tiempo' => 'Referencia'
                        ],
                        [
                            'titulo' => 'Inteligencia artifical avanzada',
                            'descripcion' => 'Tutoriales oficiales y documentación completa de PyTorch.',
                            'autor' => 'Benítez',
                            'fecha' => '2013-02-08',
                            'url' => 'https://drive.google.com/file/d/1-56Ti3hzGjB1c3hlhbDHcAvH5bTQT9GO/view?usp=sharing',
                            
                            'tiempo' => 'Referencia'
                        ],
                        [
                            'titulo' => 'Inteligencia artificial con aplicaciones en ingenieria ',
                            'descripcion' => 'aplicaciones de la inteligencia artificial.',
                            'autor' => 'pedro ponce cruz',
                            'fecha' => '2010-01-18',
                            'url' => 'https://drive.google.com/file/d/1KmHDSsA2lyJC7bcoUtLOr4V4jq_Yf6Gu/view?usp=sharing',
                           
                            'tiempo' => 'Referencia'
                        ]
                    ]
                ],
                
                
            ];
            ?>

            <!-- Estadísticas de Recursos -->
            <div class="resources-stats">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <div class="stat-info">
                        <h3><?php echo count($recursos['articles']['items']); ?></h3>
                        <p>Artículos</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-video"></i>
                    </div>
                    <div class="stat-info">
                        <h3><?php echo count($recursos['videos']['items']); ?></h3>
                        <p>Videos</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="stat-info">
                        <h3><?php echo count($recursos['docs']['items']); ?></h3>
                        <p>Descargas</p>
                    </div>
                </div>
                
            </div>

            <?php foreach ($recursos as $categoriaId => $categoria): ?>
    <div id="<?= $categoriaId ?>" class="resource-block" style="padding: 80px 0;">
        <div class="container">
            <div class="category-header">
                <h2><i class="<?= $categoria['icono'] ?>"></i> <?= $categoria['titulo'] ?></h2>
                <span class="category-count"><?= count($categoria['items']) ?> recursos</span>
            </div>
            <div class="resources-cards">
                <?php foreach ($categoria['items'] as $recurso): ?>
                    <div class="resource-card" data-category="<?= $categoriaId ?>" data-level="<?= strtolower($recurso['nivel']) ?>">
                        <div class="resource-header">
                            <div class="resource-type">
                                <i class="<?= $categoria['icono'] ?>"></i>
                                <?= $recurso['autor'] ?>
                            </div>
                            <span class="resource-level level-<?= strtolower($recurso['nivel']) ?>">
                                <?= $recurso['nivel'] ?>
                            </span>
                        </div>
                        <div class="resource-content">
                            <h3><?= $recurso['titulo'] ?></h3>
                            <p><?= $recurso['descripcion'] ?></p>
                            <div class="resource-meta">
                                <div class="meta-item"><i class="fas fa-calendar-alt"></i> <span><?= $recurso['fecha'] ?></span></div>
                                
                            </div>
                        </div>
                        <div class="resource-actions">
                            <a href="<?= $recurso['url'] ?: '#' ?>" class="btn-primary" target="_blank">
                                <i class="fas fa-external-link-alt"></i> Ver recurso
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
                    <h3>No se encontraron recursos</h3>
                    <p>Intenta con otros términos de búsqueda o cambia los filtros.</p>
                    <button class="btn-primary" onclick="clearFilters()">
                        <i class="fas fa-refresh"></i> Limpiar Filtros
                    </button>
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
  
    <script src="js/recursos.js"></script>
</body>
</html>
