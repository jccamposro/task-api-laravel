# Task API - Laravel

Este proyecto es una **API REST** construida con **Laravel** para la gestión de tareas.

## 🚀 Requisitos previos

- PHP >= 8.1  
- Composer  

(No necesitas instalar MySQL, este proyecto ya viene configurado con **SQLite**).

## ⚙️ Instalación y ejecución

1. Clona este repositorio:
   ```bash
   git clone https://github.com/jccamposro/task-api-laravel.git
   cd task-api-laravel
Instala dependencias:

bash
    
    composer install
Copia el archivo de entorno y genera la clave de aplicación:

    cp .env.example .env
    php artisan key:generate
    


Crea la base de datos SQLite vacía:

    touch database/database.sqlite

El archivo .env.example ya viene configurado con (**se debe configurar el DB_DATABASE con la ruta completa del archivo**):


    API_TOKEN=secreto123
    DB_CONNECTION=sqlite
    DB_DATABASE=/ruta/al/archivo_nuevo/database/database.sqlite

Ejecuta las migraciones:

    php artisan migrate --seed

Inicia el servidor:

    php artisan serve

La API quedará disponible en:

    http://127.0.0.1:8000

🔑 Autenticación
Todas las peticiones deben incluir el header con el token definido en .env:

    Authorization: Bearer secreto123
    curl -X POST http://127.0.0.1:8000/api/tasks \

📌 Endpoints principales

Rutas públicas (no necesitan token)

📌 Listar usuarios

    curl -X GET http://localhost:8000/api/users


📌 Listar tareas de un usuario (ej: usuario con id=1)

    curl -X GET http://localhost:8000/api/users/1/tasks

Rutas protegidas (con Bearer token)

📌 Crear tarea (válida)

    curl -X POST http://localhost:8000/api/tasks \
    -H "Authorization: Bearer secreto123" \
    -H "Content-Type: application/json" \
    -d '{"title":"Tarea de prueba","description":"Probando la API","user_id":1}'


📌 Crear tarea (inválida: título muy corto)

    curl -X POST http://localhost:8000/api/tasks \
    -H "Authorization: Bearer secreto123" \
    -H "Content-Type: application/json" \
    -d '{"title":"Hey","description":"Muy corta","user_id":1}'


📌 Crear tarea sin token (debe fallar)

    curl -X POST http://localhost:8000/api/tasks \
    -H "Content-Type: application/json" \
    -d '{"title":"Tarea sin token","description":"Debe fallar","user_id":1}'


📌 Listar todas las tareas (con token)

    curl -X GET http://localhost:8000/api/tasks \
    -H "Authorization: Bearer secreto123"


📌 Listar todas las tareas (sin token, debe fallar)

    curl -X GET http://localhost:8000/api/tasks


📌 Actualizar tarea (ej: tarea con id=1)

    curl -X PUT http://localhost:8000/api/tasks/1 \
    -H "Authorization: Bearer secreto123" \
    -H "Content-Type: application/json" \
    -d '{"title":"Tarea actualizada","description":"Ahora con cambios"}'


📌 Actualizar tarea inexistente (ej: id=999)

    curl -X PUT http://localhost:8000/api/tasks/999 \
    -H "Authorization: Bearer secreto123" \
    -H "Content-Type: application/json" \
    -d '{"title":"Probando error","description":"No existe"}'


📌 Eliminar tarea (ej: id=1)

    curl -X DELETE http://localhost:8000/api/tasks/1 \
    -H "Authorization: Bearer secreto123"


📌 Eliminar tarea inexistente (ej: id=999)

    curl -X DELETE http://localhost:8000/api/tasks/999 \
    -H "Authorization: Bearer secreto123"


🧪 Pruebas

Para correr las pruebas automáticas:


    php artisan test
    
