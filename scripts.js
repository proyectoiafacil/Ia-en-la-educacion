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

  // Función para manejar el scroll suave del navbar
  function updateActiveNavLink() {
    const sections = document.querySelectorAll("section[id]")
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
      if (
        link.getAttribute("href") === `#${current}` ||
        (current === "" && link.getAttribute("href") === "index.php")
      ) {
        link.classList.add("active")
      }
    })
  }

  window.addEventListener("scroll", updateActiveNavLink)

  // Inicializar todo
  console.log("IA Educativa - Página cargada correctamente")

  // Inicializar chat bot
  initChatBot()
})

// Chat Bot Functionality
function initChatBot() {
  const chatToggle = document.getElementById("chatToggle")
  const chatWindow = document.getElementById("chatWindow")
  const chatClose = document.getElementById("chatClose")
  const chatInput = document.getElementById("chatInput")
  const chatSend = document.getElementById("chatSend")
  const chatMessages = document.getElementById("chatMessages")
  const chatNotification = document.getElementById("chatNotification")

  let isOpen = false

  // Abrir/cerrar chat
  chatToggle.addEventListener("click", () => {
    toggleChat()
  })

  chatClose.addEventListener("click", () => {
    toggleChat()
  })

  function toggleChat() {
    isOpen = !isOpen
    if (isOpen) {
      chatWindow.classList.add("active")
      chatNotification.style.display = "none"
      chatInput.focus()
    } else {
      chatWindow.classList.remove("active")
    }
  }

  // Enviar mensaje
  chatSend.addEventListener("click", () => {
    sendMessage()
  })

  chatInput.addEventListener("keypress", (e) => {
    if (e.key === "Enter") {
      sendMessage()
    }
  })

  // Botones rápidos
  document.addEventListener("click", (e) => {
    if (e.target.classList.contains("quick-btn")) {
      const destination = e.target.getAttribute("data-destination")
      handleNavigation(destination)
    }
  })

  function sendMessage() {
    const message = chatInput.value.trim()
    if (message === "") return

    // Mostrar mensaje del usuario
    addMessage(message, "user")
    chatInput.value = ""

    // Procesar respuesta del bot
    setTimeout(() => {
      processUserMessage(message)
    }, 500)
  }

  function addMessage(text, sender) {
    const messageDiv = document.createElement("div")
    messageDiv.className = `message ${sender}-message`

    const avatar = document.createElement("div")
    avatar.className = "message-avatar"
    avatar.innerHTML = sender === "bot" ? '<i class="fas fa-robot"></i>' : '<i class="fas fa-user"></i>'

    const content = document.createElement("div")
    content.className = "message-content"
    content.innerHTML = `<p>${text}</p>`

    messageDiv.appendChild(avatar)
    messageDiv.appendChild(content)

    chatMessages.appendChild(messageDiv)
    chatMessages.scrollTop = chatMessages.scrollHeight
  }

  function processUserMessage(message) {
    const lowerMessage = message.toLowerCase()

    // Detectar intención de navegación
    if (
      lowerMessage.includes("tipos") ||
      lowerMessage.includes("tipo") ||
      lowerMessage.includes("ia generativa") ||
      lowerMessage.includes("ia predictiva") ||
      lowerMessage.includes("ia cognitiva")
    ) {
      addMessage(
        "¡Perfecto! Te llevaré a la sección de Tipos de IA donde podrás aprender sobre IA Generativa, Predictiva y Cognitiva. 🤖",
        "bot",
      )
      setTimeout(() => {
        window.location.href = "tipos-ia.php"
      }, 1500)
    } else if (
      lowerMessage.includes("recursos") ||
      lowerMessage.includes("materiales") ||
      lowerMessage.includes("biblioteca") ||
      lowerMessage.includes("documentos")
    ) {
      addMessage(
        "¡Excelente elección! Te redirigiré a nuestra biblioteca de recursos donde encontrarás artículos, videos y herramientas. 📚",
        "bot",
      )
      setTimeout(() => {
        window.location.href = "recursos-ia.php"
      }, 1500)
    } else if (
      lowerMessage.includes("cursos") ||
      lowerMessage.includes("curso") ||
      lowerMessage.includes("aprender") ||
      lowerMessage.includes("estudiar") ||
      lowerMessage.includes("clases")
    ) {
      addMessage(
        "¡Genial! Te llevaré a la sección de cursos donde podrás encontrar formación estructurada en IA. 🎓",
        "bot",
      )
      setTimeout(() => {
        window.location.href = "cursos-ia.php"
      }, 1500)
    } else if (
      lowerMessage.includes("creditos") ||
      lowerMessage.includes("créditos") ||
      lowerMessage.includes("información") ||
      lowerMessage.includes("acerca") ||
      lowerMessage.includes("sobre")
    ) {
      addMessage("Te llevaré a la página de créditos donde podrás conocer más sobre este proyecto. ℹ️", "bot")
      setTimeout(() => {
        window.location.href = "creditos.php"
      }, 1500)
    } else if (
      lowerMessage.includes("inicio") ||
      lowerMessage.includes("home") ||
      lowerMessage.includes("principal") ||
      lowerMessage.includes("portada")
    ) {
      addMessage("Te llevaré de vuelta al inicio. 🏠", "bot")
      setTimeout(() => {
        window.location.href = "index.php"
      }, 1500)
    } else {
      // Respuesta por defecto con opciones
      addMessage("No estoy seguro de entender a dónde quieres ir. 🤔 Puedes decirme alguna de estas opciones:", "bot")

      setTimeout(() => {
        const optionsDiv = document.createElement("div")
        optionsDiv.className = "message bot-message"

        const avatar = document.createElement("div")
        avatar.className = "message-avatar"
        avatar.innerHTML = '<i class="fas fa-robot"></i>'

        const content = document.createElement("div")
        content.className = "message-content"
        content.innerHTML = `
          <div class="quick-options">
            <button class="quick-btn" data-destination="tipos">Tipos de IA</button>
            <button class="quick-btn" data-destination="recursos">Recursos</button>
            <button class="quick-btn" data-destination="cursos">Cursos</button>
            <button class="quick-btn" data-destination="creditos">Créditos</button>
          </div>
        `

        optionsDiv.appendChild(avatar)
        optionsDiv.appendChild(content)

        chatMessages.appendChild(optionsDiv)
        chatMessages.scrollTop = chatMessages.scrollHeight
      }, 500)
    }
  }

  function handleNavigation(destination) {
    let message = ""
    let url = ""

    switch (destination) {
      case "tipos":
        message = "¡Perfecto! Te llevaré a la sección de Tipos de IA. 🤖"
        url = "tipos-ia.php"
        break
      case "recursos":
        message = "¡Excelente! Te redirigiré a los recursos de IA. 📚"
        url = "recursos-ia.php"
        break
      case "cursos":
        message = "¡Genial! Te llevaré a los cursos de IA. 🎓"
        url = "cursos-ia.php"
        break
      case "creditos":
        message = "Te llevaré a la página de créditos. ℹ️"
        url = "creditos.php"
        break
    }

    addMessage(message, "bot")
    setTimeout(() => {
      window.location.href = url
    }, 1500)
  }

  // Cerrar chat al hacer click fuera
  document.addEventListener("click", (e) => {
    if (isOpen && !chatWindow.contains(e.target) && !chatToggle.contains(e.target)) {
      toggleChat()
    }
  })

  // Mostrar notificación inicial después de unos segundos
  setTimeout(() => {
    if (!isOpen) {
      chatNotification.style.display = "flex"
    }
  }, 3000)
}

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


const chatMessages = document.getElementById('chatMessages');
  const chatInput = document.getElementById('chatInput');
  const chatSend = document.getElementById('chatSend');

  // Habilitar o deshabilitar botón según input
  chatInput.addEventListener('input', () => {
    chatSend.disabled = !chatInput.value.trim();
  });

  chatSend.addEventListener('click', sendMessage);

  chatInput.addEventListener('keypress', e => {
    if (e.key === 'Enter' && !chatSend.disabled) {
      sendMessage();
    }
  });

  // Función para agregar mensaje al chat con diseño propio
  function appendMessage(text, sender) {
    const msgDiv = document.createElement('div');
    msgDiv.classList.add('message');
    if (sender === 'user') {
      msgDiv.classList.add('user-message');
    } else if (sender === 'bot') {
      msgDiv.classList.add('bot-message');
    }

    const avatarDiv = document.createElement('div');
    avatarDiv.classList.add('message-avatar');
    avatarDiv.innerHTML = sender === 'bot' ? '<i class="fas fa-robot"></i>' : '<i class="fas fa-user"></i>';

    const contentDiv = document.createElement('div');
    contentDiv.classList.add('message-content');
    contentDiv.textContent = text;

    if (sender === 'bot') {
      msgDiv.appendChild(avatarDiv);
      msgDiv.appendChild(contentDiv);
    } else {
      msgDiv.appendChild(contentDiv);
      msgDiv.appendChild(avatarDiv);
    }

    chatMessages.appendChild(msgDiv);
    chatMessages.scrollTop = chatMessages.scrollHeight;
  }

  // Función para enviar mensaje a chatbot.php y mostrar respuestas
  function sendMessage() {
    const message = chatInput.value.trim();
    if (!message) return;

    appendMessage(message, 'user');
    chatInput.value = '';
    chatSend.disabled = true;

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