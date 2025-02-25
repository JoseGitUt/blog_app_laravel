# Blog App - Backend

Este es el backend de **Blog App**, una aplicación móvil que permite a los usuarios registrarse e iniciar sesión para publicar contenido en forma de texto o incluir imágenes. Los usuarios también pueden interactuar con los posts mediante comentarios y reacciones (likes). El backend está desarrollado con Laravel y utiliza **Sanctum** para la autenticación.

## 🚀 Instalación y Configuración

### Requisitos Previos
- PHP 8.2 o superior
- Composer
- MySQL
- Laravel (se instalará con Composer)

### Pasos de Instalación
1. Clonar el repositorio:
   ```sh
   git clone https://github.com/tu_usuario/blog_app_backend.git
   cd blog_app_backend
   ```
2. Instalar dependencias:
   ```sh
   composer install
   ```
3. Configurar el archivo `.env`:
   - Copiar el archivo de ejemplo:
     ```sh
     cp .env.example .env
     ```
   - Configurar las credenciales de la base de datos y almacenamiento.
4. Ejecutar migraciones para crear la base de datos:
   ```sh
   php artisan migrate
   ```
5. Configurar el almacenamiento de imágenes:
   - Se modificó el archivo `config/filesystems.php` en las líneas **50-61** para permitir el almacenamiento de imágenes de perfil y posts.

## 📌 Uso

Para iniciar el servidor de desarrollo, ejecutar:
```sh
php artisan serve
```

## 🔐 Autenticación y Seguridad
Este backend utiliza **Laravel Sanctum** para la autenticación de usuarios mediante tokens seguros.

## 📌 Lista de Rutas

### Autenticación
```php
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
```

### Rutas Protegidas (Requieren Autenticación)
```php
Route::group(['middleware' => ['auth:sanctum']], function () {
    
    // User
    Route::get('/user', [AuthController::class, 'user']);
    Route::put('/user', [AuthController::class, 'update']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Post
    Route::get('/posts', [PostController::class, 'index']);
    Route::post('/posts', [PostController::class, 'store']);
    Route::get('/posts/{id}', [PostController::class, 'show']);
    Route::put('/posts/{id}', [PostController::class, 'update']);
    Route::delete('/posts/{id}', [PostController::class, 'destroy']);

    // Comment
    Route::get('/posts/{id}/comments', [CommentController::class, 'index']);
    Route::post('/posts/{id}/comments', [CommentController::class, 'store']);
    Route::get('/comments/{id}', [CommentController::class, 'show']);
    Route::put('/comments/{id}', [CommentController::class, 'update']);
    Route::delete('/comments/{id}', [CommentController::class, 'destroy']);

    // Like
    Route::post('/posts/{id}/likes', [LikeController::class, 'likeOrUnlike']);
});
```

---
