<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipos de Inteligencia Artificial</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="css/recursos.css">
    <link rel="stylesheet" href="css/tipos de ia.css">
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
                    <a href="tipos-ia.php" class="nav-link active">
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

    <header class="main-header">
        <div class="header-content">
            <h1>Tipos de Inteligencia Artificial</h1>
            <p>Explorando la IA Generativa, Predictiva y Cognitiva</p>
            <nav class="header-nav">
                <a href="#generativa" class="nav-link active">IA Generativa</a>
                <a href="#predictiva" class="nav-link active">IA Predictiva</a>
                <a href="#cognitiva" class="nav-link active">IA Cognitiva</a>
            </nav>
        </div>
    </header>

    <main>
        <?php
        $tipos_ia = [
            'generativa' => [
                'titulo' => 'IA Generativa',
                'descripcion' => 'La Inteligencia Artificial Generativa es capaz de crear contenido nuevo y original, incluyendo texto, imágenes, audio, video y código, basándose en patrones aprendidos de grandes conjuntos de datos.',
                'caracteristicas' => [
                    'Crea contenido completamente nuevo',
                    'Aprende de patrones en datos masivos',
                    'Utiliza redes neuronales profundas',
                    'Puede generar múltiples tipos de contenido',
                    'Se basa en modelos como GPT, DALL-E, etc.'
                ],
                'areas_aplicacion' => [
                    'Creación de Contenido' => 'Generación automática de artículos, blogs, guiones y textos creativos',
                    'Arte y Diseño' => 'Creación de imágenes, logos, ilustraciones y arte digital',
                    'Programación' => 'Generación automática de código y asistencia en desarrollo',
                    'Marketing' => 'Creación de campañas publicitarias y contenido promocional',
                    'Educación' => 'Generación de material educativo personalizado',
                    'Entretenimiento' => 'Creación de música, videos y contenido multimedia'
                ],
                'ejemplos_herramientas' => [
                    'ChatGPT' => 'Generación de texto conversacional',
                    'DALL-E 3' => 'Creación de imágenes desde texto',
                    'Midjourney' => 'Arte digital y diseño creativo',
                    'GitHub Copilot' => 'Asistente de programación',
                    'Stable Diffusion' => 'Generación de imágenes open source',
                    'Claude' => 'Asistente de IA conversacional'
                ],
                'articulos' => [
                    'Qué es la IA Generativa y cómo funciona' => '',
                    'El impacto de la IA Generativa' => '',
                    'Guía completa de IA Generativa' => ''
                ],
                'videos' => [
                    'IA Generativa Explicada en 10 Minutos' => '',
                    'Cómo funciona ChatGPT y la IA Generativa' => '',
                    'El Futuro de la IA Generativa' => ''
                ],
                'color' => 'purple'
            ],
            'predictiva' => [
                'titulo' => 'IA Predictiva',
                'descripcion' => 'La Inteligencia Artificial Predictiva utiliza datos históricos, algoritmos estadísticos y técnicas de machine learning para identificar la probabilidad de resultados futuros basándose en datos históricos.',
                'caracteristicas' => [
                    'Analiza patrones en datos históricos',
                    'Predice tendencias y comportamientos futuros',
                    'Utiliza algoritmos de machine learning',
                    'Proporciona probabilidades y estimaciones',
                    'Se mejora continuamente con nuevos datos'
                ],
                'areas_aplicacion' => [
                    'Finanzas' => 'Detección de fraudes, análisis de riesgo crediticio y predicción de mercados',
                    'Retail y E-commerce' => 'Predicción de demanda, recomendaciones de productos y optimización de inventario',
                    'Salud' => 'Diagnóstico temprano, predicción de epidemias y medicina personalizada',
                    'Marketing' => 'Segmentación de clientes, predicción de churn y optimización de campañas',
                    'Manufactura' => 'Mantenimiento predictivo, control de calidad y optimización de procesos',
                    'Transporte' => 'Optimización de rutas, predicción de tráfico y mantenimiento de flotas'
                ],
                'ejemplos_herramientas' => [
                    'IBM Watson' => 'Plataforma de IA predictiva empresarial',
                    'Amazon Forecast' => 'Servicio de predicción en la nube',
                    'Google Cloud AI' => 'Herramientas de machine learning predictivo',
                    'Microsoft Azure ML' => 'Plataforma de aprendizaje automático',
                    'SAS Analytics' => 'Software de análisis predictivo',
                    'Tableau' => 'Visualización y análisis predictivo'
                ],
                'articulos' => [
                    'Introducción a la IA Predictiva' => '',
                    'Casos de uso de IA Predictiva en empresas' => '',
                    'El poder de la analítica predictiva' => ''
                ],
                'videos' => [
                    'IA Predictiva: Qué es y cómo funciona' => '',
                    'Machine Learning y Análisis Predictivo' => '',
                    'Casos de Uso de IA Predictiva' => ''
                ],
                'color' => 'blue'
            ],
            'cognitiva' => [
                'titulo' => 'IA Cognitiva',
                'descripcion' => 'La Inteligencia Artificial Cognitiva simula los procesos de pensamiento humano, incluyendo el aprendizaje, razonamiento, percepción y comprensión del lenguaje natural para resolver problemas complejos.',
                'caracteristicas' => [
                    'Simula procesos cognitivos humanos',
                    'Procesa lenguaje natural',
                    'Reconoce patrones complejos',
                    'Toma decisiones contextuales',
                    'Aprende y se adapta continuamente'
                ],
                'areas_aplicacion' => [
                    'Atención al Cliente' => 'Chatbots inteligentes y asistentes virtuales avanzados',
                    'Medicina' => 'Diagnóstico médico asistido y análisis de imágenes médicas',
                    'Educación' => 'Tutores virtuales y sistemas de aprendizaje adaptativo',
                    'Legal' => 'Análisis de documentos legales y asistencia jurídica',
                    'Investigación' => 'Análisis de literatura científica y descubrimiento de conocimiento',
                    'Recursos Humanos' => 'Evaluación de candidatos y análisis de desempeño'
                ],
                'ejemplos_herramientas' => [
                    'IBM Watson' => 'Plataforma de IA cognitiva líder',
                    'Microsoft Cognitive Services' => 'APIs de servicios cognitivos',
                    'Google Cloud AI' => 'Servicios de IA cognitiva en la nube',
                    'Amazon Comprehend' => 'Procesamiento de lenguaje natural',
                    'Nuance Dragon' => 'Reconocimiento de voz avanzado',
                    'Palantir' => 'Análisis de datos complejos'
                ],
                'articulos' => [
                    'Qué es la IA Cognitiva y sus aplicaciones' => '',
                    'Diferencias entre IA tradicional y cognitiva' => '',
                    'El futuro de la computación cognitiva' => ''
                ],
                'videos' => [
                    'IA Cognitiva: Simulando la mente humana' => '',
                    'IBM Watson y la IA Cognitiva' => '',
                    'Aplicaciones de IA Cognitiva en empresas' => ''
                ],
                'color' => 'green'
            ]
        ];
        ?>

        <!-- IA GENERATIVA -->
        <section id="generativa" class="ia-section generativa-section">
            <div class="container">
                <div class="section-header">
                    <h2><i class="fas fa-magic"></i> <?php echo $tipos_ia['generativa']['titulo']; ?></h2>
                    <img src="imagenes/ia_generativa.jpg" alt="IA Generativa" class="main-image" style="width: 200px; height: auto;">
                    <div class="section-image">
                       
                    </div>
                </div>

                <div class="section-content">
                    <div class="info-panel">
                        <div class="description-box">
                            <h3>¿Qué es la IA Generativa?</h3>
                            <p><?php echo $tipos_ia['generativa']['descripcion']; ?></p>
                        </div>

                        <div class="characteristics-box">
                            <h3><i class="fas fa-cogs"></i> Características Principales</h3>
                            <ul class="characteristics-list">
                                <?php foreach($tipos_ia['generativa']['caracteristicas'] as $caracteristica): ?>
                                    <li><?php echo $caracteristica; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>

                    <div class="applications-panel">
                        <h3><i class="fas fa-industry"></i> Áreas de Aplicación</h3>
                        <div class="applications-grid">
                            <?php foreach($tipos_ia['generativa']['areas_aplicacion'] as $area => $descripcion): ?>
                                <div class="application-card">
                                    <h4><?php echo $area; ?></h4>
                                    <p><?php echo $descripcion; ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="tools-panel">
                        <h3><i class="fas fa-tools"></i> Herramientas Populares</h3>
                        <div class="tools-grid">
                            <?php foreach($tipos_ia['generativa']['ejemplos_herramientas'] as $herramienta => $descripcion): ?>
                                <div class="tool-card">
                                    <h4><?php echo $herramienta; ?></h4>
                                    <p><?php echo $descripcion; ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- IA PREDICTIVA -->
        <section id="predictiva" class="ia-section predictiva-section">
            <div class="container">
                <div class="section-header">
                    <h2><i class="fas fa-chart-line"></i> <?php echo $tipos_ia['predictiva']['titulo']; ?></h2>
                    <img src="imagenes/ia predictiva.jpg" alt="IA Predictiva" class="main-image" style="width: 220px; height: auto;">
                    <div class="section-image">
                       
                    </div>
                </div>

                <div class="section-content">
                    <div class="info-panel">
                        <div class="description-box">
                            <h3>¿Qué es la IA Predictiva?</h3>
                            <p><?php echo $tipos_ia['predictiva']['descripcion']; ?></p>
                        </div>

                        <div class="characteristics-box">
                            <h3><i class="fas fa-cogs"></i> Características Principales</h3>
                            <ul class="characteristics-list">
                                <?php foreach($tipos_ia['predictiva']['caracteristicas'] as $caracteristica): ?>
                                    <li><?php echo $caracteristica; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>

                    <div class="applications-panel">
                        <h3><i class="fas fa-industry"></i> Áreas de Aplicación</h3>
                        <div class="applications-grid">
                            <?php foreach($tipos_ia['predictiva']['areas_aplicacion'] as $area => $descripcion): ?>
                                <div class="application-card">
                                    <h4><?php echo $area; ?></h4>
                                    <p><?php echo $descripcion; ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="tools-panel">
                        <h3><i class="fas fa-tools"></i> Herramientas Populares</h3>
                        <div class="tools-grid">
                            <?php foreach($tipos_ia['predictiva']['ejemplos_herramientas'] as $herramienta => $descripcion): ?>
                                <div class="tool-card">
                                    <h4><?php echo $herramienta; ?></h4>
                                    <p><?php echo $descripcion; ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    
                    </div>
                </div>
            </div>
        </section>

        <!-- IA COGNITIVA -->
        <section id="cognitiva" class="ia-section cognitiva-section">
            <div class="container">
                <div class="section-header">
                    <h2><i class="fas fa-brain"></i> <?php echo $tipos_ia['cognitiva']['titulo']; ?></h2>
                    <img src="imagenes/ia cognitiva.jpeg" alt="IA Cognitiva" class="main-image"  style="width: 200px; height: auto;">
                    <div class="section-image">  
                    </div>
                </div>

                <div class="section-content">
                    <div class="info-panel">
                        <div class="description-box">
                            <h3>¿Qué es la IA Cognitiva?</h3>
                            <p><?php echo $tipos_ia['cognitiva']['descripcion']; ?></p>
                        </div>

                        <div class="characteristics-box">
                            <h3><i class="fas fa-cogs"></i> Características Principales</h3>
                            <ul class="characteristics-list">
                                <?php foreach($tipos_ia['cognitiva']['caracteristicas'] as $caracteristica): ?>
                                    <li><?php echo $caracteristica; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>

                    <div class="applications-panel">
                        <h3><i class="fas fa-industry"></i> Áreas de Aplicación</h3>
                        <div class="applications-grid">
                            <?php foreach($tipos_ia['cognitiva']['areas_aplicacion'] as $area => $descripcion): ?>
                                <div class="application-card">
                                    <h4><?php echo $area; ?></h4>
                                    <p><?php echo $descripcion; ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="tools-panel">
                        <h3><i class="fas fa-tools"></i> Herramientas Populares</h3>
                        <div class="tools-grid">
                            <?php foreach($tipos_ia['cognitiva']['ejemplos_herramientas'] as $herramienta => $descripcion): ?>
                                <div class="tool-card">
                                    <h4><?php echo $herramienta; ?></h4>
                                    <p><?php echo $descripcion; ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                   
                    </div>
                </div>
            </div>
        </section>
    </main>

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

    <script src="js/tipos de ia.js"></script>
</body>
</html>
