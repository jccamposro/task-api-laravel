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

    php artisan migrate

Inicia el servidor:

    php artisan serve

La API quedará disponible en:

    http://127.0.0.1:8000

🔑 Autenticación
Todas las peticiones deben incluir el header con el token definido en .env:

    Authorization: Bearer secreto123
    curl -X POST http://127.0.0.1:8000/api/tasks \

📌 Endpoints principales
Crear tarea
   
    curl -X POST http://127.0.0.1:8000/api/tasks \
    -H "Authorization: Bearer secreto123" \
    -H "Content-Type: application/json" \
    -d '{"title":"Mi primera tarea","description":"Descripción de la tarea"}'
Listar todas las tareas
    
    curl -X GET http://127.0.0.1:8000/api/tasks \
    -H "Authorization: Bearer secreto123"
Ver una tarea por ID

    curl -X GET http://127.0.0.1:8000/api/tasks/1 \
    -H "Authorization: Bearer secreto123"
Actualizar una tarea

    curl -X PUT http://127.0.0.1:8000/api/tasks/1 \
    -H "Authorization: Bearer secreto123" \
    -H "Content-Type: application/json" \
    -d '{"title":"Tarea actualizada","description":"Nueva descripción"}'

Eliminar una tarea

    curl -X DELETE http://127.0.0.1:8000/api/tasks/1 \
    -H "Authorization: Bearer secreto123"
🧪 Pruebas

Para correr las pruebas automáticas:


    php artisan test
    
