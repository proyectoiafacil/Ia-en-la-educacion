import sqlite3

# Conectar (se crea el archivo si no existe)
conexion = sqlite3.connect('usuarios.db')
cursor = conexion.cursor()

# Crear tabla 'usuarios'
cursor.execute('''
CREATE TABLE IF NOT EXISTS usuarios (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nombre TEXT NOT NULL,
    email TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL
)
''')

# Confirmar cambios y cerrar conexión
conexion.commit()
conexion.close()

print("Base de datos 'usuarios.db' creada con la tabla 'usuarios'.")
