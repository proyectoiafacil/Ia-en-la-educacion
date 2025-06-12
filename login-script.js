// Variables globales
let currentForm = "login"

// Inicialización
document.addEventListener("DOMContentLoaded", () => {
  setupEventListeners()
  showLogin()
})

// Configurar event listeners
function setupEventListeners() {
  // Formulario de login
  document.getElementById("loginFormElement").addEventListener("submit", handleLogin)

  // Formulario de registro
  document.getElementById("registerFormElement").addEventListener("submit", handleRegister)

  // Cerrar modal con Escape
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") {
      closeModal()
    }
  })

  // Cerrar modal clickeando fuera
  document.getElementById("messageModal").addEventListener("click", function (e) {
    if (e.target === this) {
      closeModal()
    }
  })
}

// Mostrar formulario de login
function showLogin() {
  currentForm = "login"
  document.getElementById("loginForm").classList.remove("hidden")
  document.getElementById("registerForm").classList.add("hidden")
}

// Mostrar formulario de registro
function showRegister() {
  currentForm = "register"
  document.getElementById("loginForm").classList.add("hidden")
  document.getElementById("registerForm").classList.remove("hidden")
}

// Manejar login
async function handleLogin(e) {
  e.preventDefault()

  const form = e.target
  const formData = new FormData(form)
  formData.append("action", "login")

  const submitBtn = form.querySelector('button[type="submit"]')

  try {
    // Mostrar estado de carga
    submitBtn.classList.add("loading")
    submitBtn.disabled = true

    // Simular delay de red
    await new Promise((resolve) => setTimeout(resolve, 1000))

    const response = await fetch("login-register.php", {
      method: "POST",
      body: formData,
    })

    const result = await response.json()

    if (result.success) {
      showMessage("¡Éxito!", result.message, "success")
      setTimeout(() => {
        window.location.href = "inicio.php"
      }, 1500)
    } else {
      showMessage("Error", result.message, "error")
    }
  } catch (error) {
    showMessage("Error", "Error de conexión. Inténtalo de nuevo.", "error")
  } finally {
    // Quitar estado de carga
    submitBtn.classList.remove("loading")
    submitBtn.disabled = false
  }
}

// Manejar registro
async function handleRegister(e) {
  e.preventDefault()

  const form = e.target

  // Validar formulario
  if (!validateForm(form)) {
    return
  }

  const formData = new FormData(form)
  formData.append("action", "register")

  const submitBtn = form.querySelector('button[type="submit"]')

  try {
    // Mostrar estado de carga
    submitBtn.classList.add("loading")
    submitBtn.disabled = true

    // Simular delay de red
    await new Promise((resolve) => setTimeout(resolve, 1000))

    const response = await fetch("login-register.php", {
      method: "POST",
      body: formData,
    })

    const result = await response.json()

    if (result.success) {
      showMessage("¡Registro Exitoso!", result.message, "success")
      setTimeout(() => {
        showLogin()
        form.reset()
      }, 2000)
    } else {
      showMessage("Error", result.message, "error")
    }
  } catch (error) {
    showMessage("Error", "Error de conexión. Inténtalo de nuevo.", "error")
  } finally {
    // Quitar estado de carga
    submitBtn.classList.remove("loading")
    submitBtn.disabled = false
  }
}

// Validar formulario
function validateForm(form) {
  const inputs = form.querySelectorAll("input[required]")
  let isValid = true

  // Limpiar errores previos
  inputs.forEach((input) => {
    clearFieldError(input)
  })

  inputs.forEach((input) => {
    if (!input.value.trim()) {
      showFieldError(input, "Este campo es obligatorio")
      isValid = false
    } else if (input.type === "email" && !isValidEmail(input.value)) {
      showFieldError(input, "Ingresa un email válido")
      isValid = false
    } else if (input.name === "password" && input.value.length < 6) {
      showFieldError(input, "La contraseña debe tener al menos 6 caracteres")
      isValid = false
    } else if (input.name === "confirm_password") {
      const password = form.querySelector('input[name="password"]').value
      if (input.value !== password) {
        showFieldError(input, "Las contraseñas no coinciden")
        isValid = false
      }
    }
  })

  return isValid
}

// Mostrar error en campo
function showFieldError(input, message) {
  const inputGroup = input.closest(".input-group")
  inputGroup.classList.add("error")

  // Remover mensaje de error previo
  const existingError = inputGroup.querySelector(".error-message")
  if (existingError) {
    existingError.remove()
  }

  // Agregar nuevo mensaje de error
  const errorDiv = document.createElement("div")
  errorDiv.className = "error-message"
  errorDiv.textContent = message
  inputGroup.appendChild(errorDiv)
}

// Limpiar error de campo
function clearFieldError(input) {
  const inputGroup = input.closest(".input-group")
  inputGroup.classList.remove("error")

  const errorMessage = inputGroup.querySelector(".error-message")
  if (errorMessage) {
    errorMessage.remove()
  }
}

// Validar email
function isValidEmail(email) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
  return emailRegex.test(email)
}

// Mostrar mensaje modal
function showMessage(title, message, type = "info") {
  const modal = document.getElementById("messageModal")
  const modalTitle = document.getElementById("modalTitle")
  const modalMessage = document.getElementById("modalMessage")

  modalTitle.textContent = title
  modalMessage.textContent = message

  modal.style.display = "block"

  // Auto-cerrar después de 3 segundos para mensajes de éxito
  if (type === "success") {
    setTimeout(() => {
      closeModal()
    }, 3000)
  }
}

// Cerrar modal
function closeModal() {
  const modal = document.getElementById("messageModal")
  modal.style.display = "none"
}

// Limpiar errores al escribir
document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll("input").forEach((input) => {
    input.addEventListener("input", function () {
      clearFieldError(this)
    })
  })
})
