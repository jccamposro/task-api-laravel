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
Copiar
Editar
composer install
Copia el archivo de entorno y genera la clave de aplicación:

bash
Copiar
Editar
cp .env.example .env
php artisan key:generate
El archivo .env.example ya viene configurado con:

env
Copiar
Editar
API_TOKEN=secreto123
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database/database.sqlite
Crea la base de datos SQLite vacía:

bash
Copiar
Editar
touch database/database.sqlite
Ejecuta las migraciones:

bash
Copiar
Editar
php artisan migrate
Inicia el servidor:

bash
Copiar
Editar
php artisan serve
La API quedará disponible en:

cpp
Copiar
Editar
http://127.0.0.1:8000
🔑 Autenticación
Todas las peticiones deben incluir el header con el token definido en .env:

http
Copiar
Editar
Authorization: Bearer secreto123
📌 Endpoints principales
1. Crear tarea
bash
Copiar
Editar
curl -X POST http://127.0.0.1:8000/api/tasks \
-H "Authorization: Bearer secreto123" \
-H "Content-Type: application/json" \
-d '{"title":"Mi primera tarea","description":"Descripción de la tarea"}'
2. Listar todas las tareas
bash
Copiar
Editar
curl -X GET http://127.0.0.1:8000/api/tasks \
-H "Authorization: Bearer secreto123"
3. Ver una tarea por ID
bash
Copiar
Editar
curl -X GET http://127.0.0.1:8000/api/tasks/1 \
-H "Authorization: Bearer secreto123"
4. Actualizar una tarea
bash
Copiar
Editar
curl -X PUT http://127.0.0.1:8000/api/tasks/1 \
-H "Authorization: Bearer secreto123" \
-H "Content-Type: application/json" \
-d '{"title":"Tarea actualizada","description":"Nueva descripción"}'
5. Eliminar una tarea
bash
Copiar
Editar
curl -X DELETE http://127.0.0.1:8000/api/tasks/1 \
-H "Authorization: Bearer secreto123"
🧪 Pruebas
Para correr las pruebas automáticas:

bash
Copiar
Editar
php artisan test
📌 Postman Collection
Puedes importar una colección en Postman con los siguientes datos:

Base URL: http://127.0.0.1:8000/api

Auth: Header → Authorization: Bearer secreto123

Endpoints disponibles:

POST /tasks → Crear tarea

GET /tasks → Listar tareas

GET /tasks/{id} → Ver tarea

PUT /tasks/{id} → Actualizar tarea

DELETE /tasks/{id} → Eliminar tarea

