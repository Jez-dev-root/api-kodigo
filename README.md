# API de Gestión de Productos - Kodigo Bootcamp

## Autor
Edwin Efraín Juárez Mezquita

## Descripción
API RESTful desarrollada en Laravel como proyecto final del bootcamp Full Stack Jr. Esta API permite la gestión de productos con autenticación de usuarios, valoraciones y comentarios.

## Tecnologías Utilizadas
- PHP 8.1+
- Laravel 8+
- MySQL
- Laravel Sanctum (para autenticación por tokens)

## Instalación

1. Clona el repositorio:
   ```bash
   git clone <url-del-repositorio>
   cd api-productos-kodigo
   ```

2. Instala las dependencias:
   ```bash
   composer install
   ```

3. Copia el archivo de configuración del entorno:
   ```bash
   cp .env.example .env
   ```

4. Genera la clave de la aplicación:
   ```bash
   php artisan key:generate
   ```

5. Configura la base de datos en el archivo `.env`:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=kodigo_products_api
   DB_USERNAME=tu_usuario
   DB_PASSWORD=tu_password
   ```

6. Ejecuta las migraciones:
   ```bash
   php artisan migrate
   ```

7. Inicia el servidor:
   ```bash
   php artisan serve
   ```

## Endpoints de la API

### Autenticación (Públicos)
- `POST /api/register` - Registrar un nuevo usuario (name, email, password)
- `POST /api/login` - Iniciar sesión (email, password)

### Productos (Requieren Bearer Token)
- `GET /api/products` - Listar productos (paginado)
- `POST /api/products` - Crear un producto (name, description, price)
- `GET /api/products/{id}` - Ver un producto específico
- `PUT /api/products/{id}` - Actualizar un producto (solo el creador)
- `DELETE /api/products/{id}` - Eliminar un producto (solo el creador)

### Valoraciones (Requieren Bearer Token)
- `POST /api/products/{product}/ratings` - Crear o actualizar valoración (rating 1-5, comment opcional)

### Estadísticas (Requieren Bearer Token)
- `GET /api/stats/best-rated-product` - Obtener el producto mejor valorado
- `POST /api/logout` - Cerrar sesión

## Pruebas
Utiliza herramientas como Postman o Insomnia para probar los endpoints. Incluye el token Bearer en el header `Authorization` para rutas protegidas.

## Documentación del Código
Todo el código está documentado con PHPDoc para cumplir con los requisitos de documentación.

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
