// Función para alternar detalles de cada tipo de IA
function toggleDetails(tipo) {
  const card = document.querySelector(`[data-tipo="${tipo}"]`)
  const button = card.querySelector(".learn-more-btn")

  if (button.textContent === "Ver todas las aplicaciones") {
    button.textContent = "Ocultar detalles"
    showMoreInfo(tipo)
  } else {
    button.textContent = "Ver todas las aplicaciones"
    hideMoreInfo(tipo)
  }
}

// Navegación móvil
document.addEventListener("DOMContentLoaded", () => {
  const hamburger = document.querySelector(".hamburger")
  const navMenu = document.querySelector(".nav-menu")

  hamburger.addEventListener("click", () => {
    hamburger.classList.toggle("active")
    navMenu.classList.toggle("active")
  })

  // Cerrar menú al hacer click en un enlace
  document.querySelectorAll(".nav-link").forEach((n) =>
    n.addEventListener("click", () => {
      hamburger.classList.remove("active")
      navMenu.classList.remove("active")
    }),
  )

// Función para mostrar información adicional
function showMoreInfo(tipo) {
  const card = document.querySelector(`[data-tipo="${tipo}"]`)

  if (!card.querySelector(".additional-info")) {
    const additionalInfo = document.createElement("div")
    additionalInfo.className = "additional-info"

    let content = ""

    switch (tipo) {
      case "texto":
        content = `
                    <div class="info-section">
                        <h4>📊 Todas las Áreas de Aplicación:</h4>
                        <ul>
                            <li>Marketing y Publicidad - Creación de contenido</li>
                            <li>Educación - Tutorías personalizadas</li>
                            <li>Atención al Cliente - Chatbots inteligentes</li>
                            <li>Periodismo - Redacción automatizada</li>
                            <li>Legal - Análisis de documentos</li>
                            <li>Medicina - Informes médicos</li>
                            <li>Traducción - Servicios multiidioma</li>
                            <li>Programación - Generación de código</li>
                        </ul>
                    </div>
                    <div class="info-section">
                        <h4>💡 Capacidades Avanzadas:</h4>
                        <ul>
                            <li>Generación de artículos y blogs</li>
                            <li>Resúmenes automáticos</li>
                            <li>Análisis de sentimientos</li>
                            <li>Traducción en tiempo real</li>
                            <li>Corrección ortográfica y gramatical</li>
                            <li>Creación de guiones y scripts</li>
                        </ul>
                    </div>
                `
        break
      case "imagenes":
        content = `
                    <div class="info-section">
                        <h4>📊 Todas las Áreas de Aplicación:</h4>
                        <ul>
                            <li>Diseño Gráfico - Creación de logos y banners</li>
                            <li>E-commerce - Imágenes de productos</li>
                            <li>Arquitectura - Visualización de proyectos</li>
                            <li>Gaming - Assets y texturas</li>
                            <li>Moda - Diseño de prendas</li>
                            <li>Medicina - Análisis de radiografías</li>
                            <li>Seguridad - Reconocimiento facial</li>
                            <li>Arte Digital - Obras creativas</li>
                            <li>Inmobiliaria - Renders de propiedades</li>
                        </ul>
                    </div>
                    <div class="info-section">
                        <h4>💡 Capacidades Avanzadas:</h4>
                        <ul>
                            <li>Generación desde descripciones</li>
                            <li>Edición y retoque automático</li>
                            <li>Upscaling de resolución</li>
                            <li>Eliminación de fondos</li>
                            <li>Colorización de fotos antiguas</li>
                            <li>Creación de variaciones</li>
                        </ul>
                    </div>
                `
        break
      case "video":
        content = `
                    <div class="info-section">
                        <h4>📊 Todas las Áreas de Aplicación:</h4>
                        <ul>
                            <li>Entretenimiento - Efectos especiales</li>
                            <li>Marketing - Videos promocionales</li>
                            <li>Educación - Contenido educativo</li>
                            <li>Redes Sociales - Content creation</li>
                            <li>Cine - Post-producción</li>
                            <li>Corporativo - Presentaciones</li>
                            <li>Gaming - Cinemáticas</li>
                            <li>Noticias - Automatización de reportes</li>
                            <li>Fitness - Videos de entrenamiento</li>
                        </ul>
                    </div>
                    <div class="info-section">
                        <h4>💡 Capacidades Avanzadas:</h4>
                        <ul>
                            <li>Generación desde texto</li>
                            <li>Edición automática</li>
                            <li>Creación de avatares</li>
                            <li>Sincronización labial</li>
                            <li>Efectos visuales automáticos</li>
                            <li>Traducción de videos</li>
                        </ul>
                    </div>
                `
        break
    }

    additionalInfo.innerHTML = content
    card.querySelector(".card-content").appendChild(additionalInfo)

    setTimeout(() => {
      additionalInfo.style.opacity = "1"
      additionalInfo.style.transform = "translateY(0)"
    }, 10)
  } else {
    const existingInfo = card.querySelector(".additional-info")
    existingInfo.style.display = "block"
    setTimeout(() => {
      existingInfo.style.opacity = "1"
      existingInfo.style.transform = "translateY(0)"
    }, 10)
  }
}

// Función para ocultar información adicional
function hideMoreInfo(tipo) {
  const card = document.querySelector(`[data-tipo="${tipo}"]`)
  const additionalInfo = card.querySelector(".additional-info")

  if (additionalInfo) {
    additionalInfo.style.opacity = "0"
    additionalInfo.style.transform = "translateY(-20px)"
    setTimeout(() => {
      additionalInfo.style.display = "none"
    }, 300)
  }
}

// Animaciones al cargar la página
document.addEventListener("DOMContentLoaded", () => {
  // Observador de intersección para animaciones
  const observerOptions = {
    threshold: 0.1,
    rootMargin: "0px 0px -50px 0px",
  }

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = "1"
        entry.target.style.transform = "translateY(0)"
      }
    })
  }, observerOptions)

  // Observar elementos para animaciones
  document.querySelectorAll(".application-card, .tool-card, .description-box, .characteristics-box").forEach((el) => {
    el.style.opacity = "0"
    el.style.transform = "translateY(20px)"
    el.style.transition = "opacity 0.6s ease, transform 0.6s ease"
    observer.observe(el)
  })

  // Efecto de hover mejorado para las tarjetas
  document.querySelectorAll(".application-card, .tool-card").forEach((card) => {
    card.addEventListener("mouseenter", function () {
      this.style.transform = "translateY(-8px) scale(1.02)"
    })

    card.addEventListener("mouseleave", function () {
      this.style.transform = "translateY(0) scale(1)"
    })
  })

  // Contador de estadísticas (si se agregan más adelante)
  function animateCounters() {
    const counters = document.querySelectorAll(".counter")

    counters.forEach((counter) => {
      const target = Number.parseInt(counter.getAttribute("data-target"))
      const increment = target / 100
      let current = 0

      const timer = setInterval(() => {
        current += increment
        if (current >= target) {
          current = target
          clearInterval(timer)
        }
        counter.textContent = Math.floor(current)
      }, 20)
    })
  }

  // Función para mostrar/ocultar información adicional
  function toggleInfo(elementId) {
    const element = document.getElementById(elementId)
    if (element) {
      element.style.display = element.style.display === "none" ? "block" : "none"
    }
  }

  // Función para filtrar contenido (si se necesita más adelante)
  function filterContent(category) {
    const cards = document.querySelectorAll(".application-card, .tool-card")

    cards.forEach((card) => {
      if (category === "all" || card.classList.contains(category)) {
        card.style.display = "block"
        card.style.animation = "fadeInUp 0.6s ease forwards"
      } else {
        card.style.display = "none"
      }
    })
  }

  // Función para buscar contenido
  function searchContent(query) {
    const searchableElements = document.querySelectorAll(".application-card, .tool-card, .resources-list li")

    searchableElements.forEach((element) => {
      const text = element.textContent.toLowerCase()
      if (text.includes(query.toLowerCase())) {
        element.style.display = "block"
        element.style.backgroundColor = "#fff3cd"
      } else {
        element.style.display = "none"
      }
    })
  }

  // Función para compartir contenido
  function shareContent(section) {
    const url = window.location.href + "#" + section
    const title = document.querySelector(`#${section} h2`).textContent

    if (navigator.share) {
      navigator.share({
        title: title,
        url: url,
      })
    } else {
      // Fallback para navegadores que no soportan Web Share API
      navigator.clipboard.writeText(url).then(() => {
        alert("Enlace copiado al portapapeles")
      })
    }
  }

  // Función para imprimir sección específica
  function printSection(sectionId) {
    const section = document.getElementById(sectionId)
    const printWindow = window.open("", "_blank")

    printWindow.document.write(`
      <html>
        <head>
          <title>${section.querySelector("h2").textContent}</title>
          <style>
            body { font-family: Arial, sans-serif; margin: 20px; }
            h2 { color: #333; border-bottom: 2px solid #eee; padding-bottom: 10px; }
            h3 { color: #555; margin-top: 20px; }
            .application-card, .tool-card { 
              border: 1px solid #ddd; 
              padding: 15px; 
              margin: 10px 0; 
              border-radius: 5px; 
            }
            ul { margin: 10px 0; }
            li { margin: 5px 0; }
          </style>
        </head>
        <body>
          ${section.innerHTML}
        </body>
      </html>
    `)

    printWindow.document.close()
    printWindow.print()
  }

  // Agregar funcionalidad de modo oscuro (opcional)
  function toggleDarkMode() {
    document.body.classList.toggle("dark-mode")
    localStorage.setItem("darkMode", document.body.classList.contains("dark-mode"))
  }

  // Cargar preferencia de modo oscuro
  if (localStorage.getItem("darkMode") === "true") {
    document.body.classList.add("dark-mode")
  }

  // Función para mostrar progreso de lectura
  function updateReadingProgress() {
    const winScroll = document.body.scrollTop || document.documentElement.scrollTop
    const height = document.documentElement.scrollHeight - document.documentElement.clientHeight
    const scrolled = (winScroll / height) * 100

    let progressBar = document.getElementById("reading-progress")
    if (!progressBar) {
      progressBar = document.createElement("div")
      progressBar.id = "reading-progress"
      progressBar.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        width: ${scrolled}%;
        height: 3px;
        background: linear-gradient(90deg, #8b5cf6, #3b82f6, #10b981);
        z-index: 1000;
        transition: width 0.3s ease;
      `
      document.body.appendChild(progressBar)
    } else {
      progressBar.style.width = scrolled + "%"
    }
  }

  // Actualizar progreso de lectura al hacer scroll
  window.addEventListener("scroll", updateReadingProgress)

  // Función para lazy loading de imágenes
  function lazyLoadImages() {
    const images = document.querySelectorAll("img[data-src]")

    const imageObserver = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const img = entry.target
          img.src = img.dataset.src
          img.classList.remove("lazy")
          imageObserver.unobserve(img)
        }
      })
    })

    images.forEach((img) => imageObserver.observe(img))
  }

  // Inicializar lazy loading
  lazyLoadImages()

  // Navegación suave para los enlaces
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault()
      const targetId = this.getAttribute("href")
      const targetElement = document.querySelector(targetId)

      if (targetElement) {
        targetElement.scrollIntoView({
          behavior: "smooth",
          block: "start",
        })
      }
    })
  })

  // Resaltar sección activa en la navegación
  window.addEventListener("scroll", () => {
    const sections = document.querySelectorAll(".ia-section")
    const navLinks = document.querySelectorAll(".nav-link")

    let current = ""

    sections.forEach((section) => {
      const sectionTop = section.offsetTop
      const sectionHeight = section.clientHeight

      if (window.pageYOffset >= sectionTop - 200) {
        current = section.getAttribute("id")
      }
    })

    navLinks.forEach((link) => {
      link.classList.remove("active")
      if (link.getAttribute("href") === `#${current}`) {
        link.classList.add("active")
      }
    })
  })

  // Simular carga de imágenes (en un entorno real, estas imágenes existirían)
  simulateImages()
})

// Función para simular la carga de imágenes
function simulateImages() {
  // Crear un array con todas las imágenes que necesitamos
  const imagePaths = [
    "images/ia-texto.jpg",
    "images/ia-imagenes.jpg",
    "images/ia-video.jpg",
    "images/chatgpt.jpg",
    "images/grammarly.jpg",
    "images/copilot.jpg",
    "images/dalle.jpg",
    "images/midjourney.jpg",
    "images/stable-diffusion.jpg",
    "images/sora.jpg",
    "images/synthesia.jpg",
    "images/runway.jpg",
  ]

  // Para cada imagen, verificar si existe y si no, usar un placeholder
  document.querySelectorAll("img").forEach((img) => {
    const src = img.getAttribute("src")
    if (imagePaths.includes(src)) {
      // En un entorno real, estas imágenes existirían
      // Aquí simulamos con colores según el tipo de IA
      let color
      if (src.includes("texto")) {
        color = "3b82f6" // Azul
      } else if (
        src.includes("imagenes") ||
        src.includes("dalle") ||
        src.includes("midjourney") ||
        src.includes("stable")
      ) {
        color = "8b5cf6" // Púrpura
      } else if (src.includes("video") || src.includes("sora") || src.includes("synthesia") || src.includes("runway")) {
        color = "10b981" // Verde
      } else {
        color = "6b7280" // Gris
      }

      // Crear un placeholder con el color correspondiente
      const width = img.clientWidth || 300
      const height = img.clientHeight || 200
      img.src = `https://via.placeholder.com/${width}x${height}/${color}/FFFFFF`

      // Añadir texto descriptivo al placeholder
      let text = ""
      if (src.includes("chatgpt")) text = "ChatGPT"
      else if (src.includes("grammarly")) text = "Grammarly"
      else if (src.includes("copilot")) text = "GitHub Copilot"
      else if (src.includes("dalle")) text = "DALL-E"
      else if (src.includes("midjourney")) text = "Midjourney"
      else if (src.includes("stable-diffusion")) text = "Stable Diffusion"
      else if (src.includes("sora")) text = "Sora"
      else if (src.includes("synthesia")) text = "Synthesia"
      else if (src.includes("runway")) text = "Runway"
      else if (src.includes("ia-texto")) text = "IA de Texto"
      else if (src.includes("ia-imagenes")) text = "IA de Imágenes"
      else if (src.includes("ia-video")) text = "IA de Video"

      if (text) {
        img.alt = text
      }
    }
  })
}

// Función para validar enlaces externos
function validateExternalLinks() {
  const externalLinks = document.querySelectorAll('a[href^="http"]')

  externalLinks.forEach((link) => {
    link.addEventListener("click", (e) => {
      // Agregar confirmación para enlaces externos
      if (!confirm("Estás a punto de salir de este sitio. ¿Continuar?")) {
        e.preventDefault()
      }
    })

    // Agregar atributos de seguridad
    link.setAttribute("rel", "noopener noreferrer")
    link.setAttribute("target", "_blank")
  })
}

// Función para generar tabla de contenidos
function generateTableOfContents() {
  const headings = document.querySelectorAll("h2, h3")
  const toc = document.createElement("div")
  toc.className = "table-of-contents"
  toc.innerHTML = "<h3>Tabla de Contenidos</h3>"

  const list = document.createElement("ul")

  headings.forEach((heading, index) => {
    const id = heading.id || `heading-${index}`
    heading.id = id

    const listItem = document.createElement("li")
    const link = document.createElement("a")
    link.href = `#${id}`
    link.textContent = heading.textContent
    link.className = heading.tagName.toLowerCase()

    listItem.appendChild(link)
    list.appendChild(listItem)
  })

  toc.appendChild(list)
  return toc
}


// Agregar estilos adicionales
const styleSheet = document.createElement("style")
styleSheet.textContent = additionalStyles
document.head.appendChild(styleSheet)

});

function toggleUserMenu() {
  const menu = document.getElementById('userDropdown');
  menu.classList.toggle('hidden');
}

// Cerrar el menú si clickea fuera (pero NO redirigir)
document.addEventListener('click', function(event) {
  const userMenu = document.querySelector('.user-menu');
  const dropdown = document.getElementById('userDropdown');

  // Si el clic NO es dentro del menú de usuario
  if (!userMenu.contains(event.target)) {
      dropdown.classList.add('hidden');
      // NO REDIRIGIR AQUÍ
  }
});

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php"); // Si no está logueado, manda al login
    exit;
}
