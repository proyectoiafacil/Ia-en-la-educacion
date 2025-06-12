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

  // Animación de contadores
  function animateCounters() {
    const counters = document.querySelectorAll(".stat-number")
    const speed = 200

    counters.forEach((counter) => {
      const animate = () => {
        const value = +counter.getAttribute("data-target")
        const data = +counter.innerText

        const time = value / speed
        if (data < value) {
          counter.innerText = Math.ceil(data + time)
          setTimeout(animate, 1)
        } else {
          counter.innerText = value
        }
      }

      animate()
    })
  }

  // Observador de intersección para animaciones
  const observerOptions = {
    threshold: 0.1,
    rootMargin: "0px 0px -50px 0px",
  }

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        if (entry.target.classList.contains("stats")) {
          animateCounters()
        }
        entry.target.style.opacity = "1"
        entry.target.style.transform = "translateY(0)"
      }
    })
  }, observerOptions)

  // Observar elementos para animaciones
  document.querySelectorAll(".mission-card, .feature-card, .stats").forEach((el) => {
    observer.observe(el)
  })

  // Navbar scroll effect
  window.addEventListener("scroll", () => {
    const navbar = document.querySelector(".navbar")
    if (window.scrollY > 50) {
      navbar.style.background = "rgba(255, 255, 255, 0.95)"
      navbar.style.backdropFilter = "blur(10px)"
    } else {
      navbar.style.background = "#fff"
      navbar.style.backdropFilter = "none"
    }
  })

  // Smooth scrolling para enlaces internos
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault()
      const target = document.querySelector(this.getAttribute("href"))
      if (target) {
        target.scrollIntoView({
          behavior: "smooth",
          block: "start",
        })
      }
    })
  })

  // Efecto parallax sutil en hero
  window.addEventListener("scroll", () => {
    const scrolled = window.pageYOffset
    const hero = document.querySelector(".hero")
    if (hero) {
      hero.style.transform = `translateY(${scrolled * 0.5}px)`
    }
  })

  // Animación de aparición para elementos
  function revealElements() {
    const reveals = document.querySelectorAll(".mission-card, .feature-card")

    reveals.forEach((element) => {
      const windowHeight = window.innerHeight
      const elementTop = element.getBoundingClientRect().top
      const elementVisible = 150

      if (elementTop < windowHeight - elementVisible) {
        element.classList.add("active")
      }
    })
  }

  window.addEventListener("scroll", revealElements)

  // Inicializar tooltips si es necesario
  function initTooltips() {
    const tooltipElements = document.querySelectorAll("[data-tooltip]")
    tooltipElements.forEach((element) => {
      element.addEventListener("mouseenter", function () {
        const tooltip = document.createElement("div")
        tooltip.className = "tooltip"
        tooltip.textContent = this.getAttribute("data-tooltip")
        document.body.appendChild(tooltip)

        const rect = this.getBoundingClientRect()
        tooltip.style.left = rect.left + rect.width / 2 - tooltip.offsetWidth / 2 + "px"
        tooltip.style.top = rect.top - tooltip.offsetHeight - 10 + "px"
      })

      element.addEventListener("mouseleave", () => {
        const tooltip = document.querySelector(".tooltip")
        if (tooltip) {
          tooltip.remove()
        }
      })
    })
  }

  initTooltips()

  // Función para manejar formularios (si se agregan más adelante)
  function handleForms() {
    const forms = document.querySelectorAll("form")
    forms.forEach((form) => {
      form.addEventListener("submit", (e) => {
        e.preventDefault()
        // Aquí se manejaría el envío del formulario
        console.log("Formulario enviado")
      })
    })
  }

  handleForms()

  // Función para lazy loading de imágenes
  function lazyLoadImages() {
    const images = document.querySelectorAll("img[data-src]")
    const imageObserver = new IntersectionObserver((entries, observer) => {
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

  lazyLoadImages()

  // Función para manejar el tema oscuro (opcional)
  function initThemeToggle() {
    const themeToggle = document.querySelector(".theme-toggle")
    if (themeToggle) {
      themeToggle.addEventListener("click", () => {
        document.body.classList.toggle("dark-theme")
        localStorage.setItem("theme", document.body.classList.contains("dark-theme") ? "dark" : "light")
      })

      // Cargar tema guardado
      const savedTheme = localStorage.getItem("theme")
      if (savedTheme === "dark") {
        document.body.classList.add("dark-theme")
      }
    }
  }

  initThemeToggle()

  // Función para mostrar notificaciones
  function showNotification(message, type = "info") {
    const notification = document.createElement("div")
    notification.className = `notification ${type}`
    notification.textContent = message

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
    `

    if (type === "success") {
      notification.style.background = "#10b981"
    } else if (type === "error") {
      notification.style.background = "#ef4444"
    } else {
      notification.style.background = "#3b82f6"
    }

    document.body.appendChild(notification)

    setTimeout(() => {
      notification.style.transform = "translateX(0)"
    }, 100)

    setTimeout(() => {
      notification.style.transform = "translateX(100%)"
      setTimeout(() => {
        notification.remove()
      }, 300)
    }, 3000)
  }

  // Hacer la función disponible globalmente
  window.showNotification = showNotification

  


  // Funcionalidades específicas para la página de recursos
  if (document.querySelector(".resources-section")) {
    // Elementos del DOM
    const searchInput = document.getElementById("searchInput")
    const searchBtn = document.getElementById("searchBtn")
    const filterBtns = document.querySelectorAll(".filter-btn")
    const resourceCards = document.querySelectorAll(".resource-card")
    const categorySection = document.querySelectorAll(".category-section")
    const noResults = document.getElementById("noResults")
    const favoriteButtons = document.querySelectorAll(".favorite-btn")
    const shareButtons = document.querySelectorAll(".share-btn")
    const subscribeBtn = document.getElementById("subscribeBtn")
    const newsletterEmail = document.getElementById("newsletterEmail")

    // Variables de estado
    let currentFilter = "all"
    let currentSearch = ""
    let favorites = JSON.parse(localStorage.getItem("ai-resources-favorites")) || []

    // Inicializar favoritos
    initializeFavorites()

    // Event Listeners
    searchInput.addEventListener("input", handleSearch)
    searchBtn.addEventListener("click", handleSearch)
    searchInput.addEventListener("keypress", (e) => {
      if (e.key === "Enter") handleSearch()
    })

    filterBtns.forEach((btn) => {
      btn.addEventListener("click", handleFilter)
    })

    favoriteButtons.forEach((btn) => {
      btn.addEventListener("click", handleFavorite)
    })

    shareButtons.forEach((btn) => {
      btn.addEventListener("click", handleShare)
    })

    if (subscribeBtn) {
      subscribeBtn.addEventListener("click", handleSubscribe)
    }

    if (newsletterEmail) {
      newsletterEmail.addEventListener("keypress", (e) => {
        if (e.key === "Enter") handleSubscribe()
      })
    }

    // Función de búsqueda
    function handleSearch() {
      currentSearch = searchInput.value.toLowerCase().trim()
      filterResources()
    }

    // Función de filtrado
    function handleFilter(e) {
      // Remover clase active de todos los botones
      filterBtns.forEach((btn) => btn.classList.remove("active"))
      // Agregar clase active al botón clickeado
      e.target.classList.add("active")

      currentFilter = e.target.getAttribute("data-filter")
      filterResources()
    }

    // Función principal de filtrado
    function filterResources() {
      let visibleCards = 0
      const visibleCategories = new Set()

      resourceCards.forEach((card) => {
        const category = card.getAttribute("data-category")
        const title = card.querySelector("h3").textContent.toLowerCase()
        const description = card.querySelector("p").textContent.toLowerCase()
        const author = card.querySelector(".meta-item span").textContent.toLowerCase()

        // Verificar filtro de categoría
        const matchesFilter = currentFilter === "all" || category === currentFilter

        // Verificar búsqueda
        const matchesSearch =
          currentSearch === "" ||
          title.includes(currentSearch) ||
          description.includes(currentSearch) ||
          author.includes(currentSearch)

        if (matchesFilter && matchesSearch) {
          card.style.display = "block"
          card.style.animation = "fadeInUp 0.6s ease forwards"
          visibleCards++
          visibleCategories.add(category)
        } else {
          card.style.display = "none"
        }
      })

      // Mostrar/ocultar secciones de categorías
      categorySection.forEach((section) => {
        const category = section.getAttribute("data-category")
        if (currentFilter === "all") {
          // Mostrar categoría si tiene tarjetas visibles
          const hasVisibleCards = visibleCategories.has(category)
          section.style.display = hasVisibleCards ? "block" : "none"
        } else {
          // Mostrar solo la categoría filtrada
          section.style.display = category === currentFilter ? "block" : "none"
        }
      })

      // Mostrar mensaje de no resultados
      if (noResults) {
        noResults.style.display = visibleCards === 0 ? "block" : "none"
      }

      // Actualizar contador en el header de categoría
      updateCategoryCounters()
    }

    // Actualizar contadores de categorías
    function updateCategoryCounters() {
      categorySection.forEach((section) => {
        const category = section.getAttribute("data-category")
        const visibleCards = section.querySelectorAll(
          '.resource-card[style*="display: block"], .resource-card:not([style*="display: none"])',
        )
        const counter = section.querySelector(".category-count")
        if (counter) {
          const count = visibleCards.length
          counter.textContent = `${count} recurso${count !== 1 ? "s" : ""}`
        }
      })
    }

    // Manejar favoritos
    function handleFavorite(e) {
      e.preventDefault()
      const button = e.currentTarget
      const title = button.getAttribute("data-title")
      const icon = button.querySelector("i")

      if (favorites.includes(title)) {
        // Remover de favoritos
        favorites = favorites.filter((fav) => fav !== title)
        button.classList.remove("active")
        icon.className = "far fa-heart"
        showNotification("Removido de favoritos", "info")
      } else {
        // Agregar a favoritos
        favorites.push(title)
        button.classList.add("active")
        icon.className = "fas fa-heart"
        showNotification("Agregado a favoritos", "success")
      }

      // Guardar en localStorage
      localStorage.setItem("ai-resources-favorites", JSON.stringify(favorites))
    }

    // Inicializar estado de favoritos
    function initializeFavorites() {
      favoriteButtons.forEach((btn) => {
        const title = btn.getAttribute("data-title")
        if (favorites.includes(title)) {
          btn.classList.add("active")
          btn.querySelector("i").className = "fas fa-heart"
        }
      })
    }

    // Manejar compartir
    function handleShare(e) {
      e.preventDefault()
      const button = e.currentTarget
      const url = button.getAttribute("data-url")
      const title = button.getAttribute("data-title")

      if (navigator.share) {
        navigator
          .share({
            title: title,
            url: url,
          })
          .then(() => {
            showNotification("Recurso compartido", "success")
          })
          .catch(() => {
            fallbackShare(url, title)
          })
      } else {
        fallbackShare(url, title)
      }
    }

    // Compartir fallback
    function fallbackShare(url, title) {
      navigator.clipboard
        .writeText(`${title} - ${url}`)
        .then(() => {
          showNotification("Enlace copiado al portapapeles", "success")
        })
        .catch(() => {
          showNotification("No se pudo copiar el enlace", "error")
        })
    }

    // Manejar suscripción al newsletter
    function handleSubscribe() {
      const email = newsletterEmail.value.trim()

      if (!email) {
        showNotification("Por favor ingresa tu correo electrónico", "error")
        return
      }

      if (!isValidEmail(email)) {
        showNotification("Por favor ingresa un correo válido", "error")
        return
      }

      // Simular suscripción
      subscribeBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Suscribiendo...'
      subscribeBtn.disabled = true

      setTimeout(() => {
        showNotification("¡Te has suscrito exitosamente!", "success")
        newsletterEmail.value = ""
        subscribeBtn.innerHTML = '<i class="fas fa-paper-plane"></i> Suscribirse'
        subscribeBtn.disabled = false
      }, 2000)
    }

    // Validar email
    function isValidEmail(email) {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
      return emailRegex.test(email)
    }

    // Limpiar filtros
    window.clearFilters = () => {
      currentFilter = "all"
      currentSearch = ""
      searchInput.value = ""

      // Resetear botones de filtro
      filterBtns.forEach((btn) => btn.classList.remove("active"))
      document.querySelector('.filter-btn[data-filter="all"]').classList.add("active")

      // Mostrar todos los recursos
      filterResources()
    }

    // Función para exportar favoritos
    window.exportFavorites = () => {
      if (favorites.length === 0) {
        showNotification("No tienes recursos favoritos", "info")
        return
      }

      const favoritesData = {
        exportDate: new Date().toISOString(),
        favorites: favorites,
      }

      const dataStr = JSON.stringify(favoritesData, null, 2)
      const dataBlob = new Blob([dataStr], { type: "application/json" })
      const url = URL.createObjectURL(dataBlob)

      const link = document.createElement("a")
      link.href = url
      link.download = "mis-recursos-favoritos.json"
      link.click()

      URL.revokeObjectURL(url)
      showNotification("Favoritos exportados", "success")
    }

    // Función para importar favoritos
    window.importFavorites = (event) => {
      const file = event.target.files[0]
      if (!file) return

      const reader = new FileReader()
      reader.onload = (e) => {
        try {
          const data = JSON.parse(e.target.result)
          if (data.favorites && Array.isArray(data.favorites)) {
            favorites = [...new Set([...favorites, ...data.favorites])]
            localStorage.setItem("ai-resources-favorites", JSON.stringify(favorites))
            initializeFavorites()
            showNotification("Favoritos importados exitosamente", "success")
          } else {
            showNotification("Archivo de favoritos inválido", "error")
          }
        } catch (error) {
          showNotification("Error al leer el archivo", "error")
        }
      }
      reader.readAsText(file)
    }

    // Función para filtrar por nivel
    window.filterByLevel = (level) => {
      const cards = document.querySelectorAll(".resource-card")
      cards.forEach((card) => {
        const cardLevel = card.getAttribute("data-level")
        if (level === "all" || cardLevel === level) {
          card.style.display = "block"
        } else {
          card.style.display = "none"
        }
      })
    }

    // Estadísticas de uso
    function trackResourceClick(resourceTitle, category) {
      const stats = JSON.parse(localStorage.getItem("resource-stats")) || {}
      const key = `${category}-${resourceTitle}`
      stats[key] = (stats[key] || 0) + 1
      localStorage.setItem("resource-stats", JSON.stringify(stats))
    }

    // Agregar tracking a los enlaces de recursos
    document.querySelectorAll(".resource-card .btn-primary").forEach((link) => {
      link.addEventListener("click", (e) => {
        const card = e.target.closest(".resource-card")
        const title = card.querySelector("h3").textContent
        const category = card.getAttribute("data-category")
        trackResourceClick(title, category)
      })
    })

    console.log("Funcionalidades de recursos inicializadas")
  }

  // Inicializar todo
  console.log("IA Educativa - Página cargada correctamente")
})

// Función para manejar errores globales
window.addEventListener("error", (e) => {
  console.error("Error en la página:", e.error)
})

// Función para optimizar el rendimiento
function optimizePerformance() {
  // Precargar recursos críticos
  const criticalResources = ["tipos-ia.php", "recursos-ia.php"]

  criticalResources.forEach((resource) => {
    const link = document.createElement("link")
    link.rel = "prefetch"
    link.href = resource
    document.head.appendChild(link)
  })
}

// Ejecutar optimizaciones cuando la página esté completamente cargada
window.addEventListener("load", optimizePerformance)

window.addEventListener("scroll", () => {
  const blocks = document.querySelectorAll("div[id].resource-block")
  const navLinks = document.querySelectorAll(".header-nav .nav-link")

  let current = ""

  blocks.forEach((block) => {
    const top = block.offsetTop
    if (window.pageYOffset >= top - 200) {
      current = block.id
    }
  })

  navLinks.forEach((link) => {
    link.classList.remove("active")
    if (link.getAttribute("href") === `#${current}`) {
      link.classList.add("active")
    }
  })
})

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

