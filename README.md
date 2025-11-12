# 🛒 API de Gestión de Productos

> Proyecto final del Bootcamp Full Stack Jr. - Kodigo

**Desarrollado por:** Edwin Efraín Juárez Mezquita

---

## 📝 Descripción

Esta es una API RESTful para gestionar productos, donde los usuarios pueden registrarse, crear productos, y dejar valoraciones. Fue desarrollada con Laravel y utiliza autenticación mediante tokens.

## 🚀 Características

- ✅ Registro y autenticación de usuarios
- ✅ CRUD completo de productos
- ✅ Sistema de valoraciones y comentarios
- ✅ Cálculo automático de promedios
- ✅ Consulta del producto mejor valorado
- ✅ Autorización (solo el creador puede editar/eliminar sus productos)

## 🛠️ Tecnologías

- **PHP** 7.4+
- **Laravel** 8
- **MySQL**
- **Laravel Sanctum** (autenticación)

---

## ⚙️ Instalación

### 1. Clonar el repositorio
```bash
git clone https://github.com/pandamigo182/api-kodigo.git
cd api-kodigo
```

### 2. Instalar dependencias
```bash
composer install
```

### 3. Configurar variables de entorno
```bash
cp .env.example .env
php artisan key:generate
```

Edita el archivo `.env` con tus credenciales de base de datos:
```
DB_DATABASE=kodigo_products_api
DB_USERNAME=root
DB_PASSWORD=root
DB_HOST=127.0.0.1
DB_PORT=3306
```

### 4. Crear base de datos y ejecutar migraciones
```bash
php artisan migrate
```

### 5. Iniciar servidor
```bash
php artisan serve
```

La API estará disponible en: `http://127.0.0.1:8000`

---

## 📚 Endpoints

### Autenticación

| Método | Endpoint | Descripción |
|--------|----------|-------------|
| POST | `/api/register` | Registrar usuario |
| POST | `/api/login` | Iniciar sesión |
| POST | `/api/logout` | Cerrar sesión (requiere auth) |

### Productos

| Método | Endpoint | Descripción |
|--------|----------|-------------|
| GET | `/api/products` | Listar productos |
| POST | `/api/products` | Crear producto |
| GET | `/api/products/{id}` | Ver detalle |
| PUT | `/api/products/{id}` | Actualizar (solo creador) |
| DELETE | `/api/products/{id}` | Eliminar (solo creador) |

### Valoraciones

| Método | Endpoint | Descripción |
|--------|----------|-------------|
| POST | `/api/products/{id}/ratings` | Agregar valoración |

### Estadísticas

| Método | Endpoint | Descripción |
|--------|----------|-------------|
| GET | `/api/stats/best-rated-product` | Producto mejor valorado |

---

## 🧪 Pruebas con Postman

Puedes importar la colección de Postman incluida en el proyecto: `Kodigo-API-Postman-Collection.json`

### Ejemplo de uso:

**1. Registrar usuario**
```json
POST /api/register
{
  "name": "Juan Perez",
  "email": "juan@example.com",
  "password": "password123",
  "password_confirmation": "password123"
}
```

**2. Crear producto** (con token)
```json
POST /api/products
Headers: Authorization: Bearer {tu_token}
{
  "name": "Laptop HP",
  "description": "Laptop de alta gama",
  "price": 999.99
}
```

**3. Agregar valoración**
```json
POST /api/products/1/ratings
Headers: Authorization: Bearer {tu_token}
{
  "rating": 5,
  "comment": "Excelente producto!"
}
```

---

## 📂 Estructura del Proyecto

```
app/
├── Http/Controllers/Api/
│   ├── AuthController.php
│   ├── ProductController.php
│   └── RatingController.php
├── Models/
│   ├── User.php
│   ├── Product.php
│   └── Rating.php
├── Observers/
│   └── RatingObserver.php
└── Policies/
    └── ProductPolicy.php
```

---

## 💡 Notas

- Los tokens de autenticación expiran después de 60 minutos
- Un usuario solo puede valorar un producto una vez
- Solo el creador de un producto puede editarlo o eliminarlo

---

## 📧 Contacto

**Edwin Juárez** - [GitHub](https://github.com/pandamigo182)

---

## 📄 Licencia

Este proyecto fue creado con fines educativos para el Bootcamp de Kodigo.
