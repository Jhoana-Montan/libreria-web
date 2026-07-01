# 📚 Librería Montan

Sistema web dinámico desarrollado como práctica académica utilizando **PHP**, **MySQL** y **Docker**.

---

# Descripción

Librería Montan es una aplicación web que permite administrar una librería mediante un sistema sencillo para registrar productos, realizar ventas y consultar el historial de operaciones.

Todo el sistema se ejecuta mediante contenedores Docker, permitiendo que cualquier persona pueda levantar el proyecto con un solo comando.

---

# Tecnologías utilizadas

- PHP
- MySQL
- HTML5
- CSS3
- JavaScript
- Docker
- Docker Compose

---

# Estructura del proyecto

```
libreria-web/
│
├── docker-compose.yml
├── README.md
├── docker/
│
├── mysql/
│   └── backup.sql
│
├── web/
│   ├── Dockerfile
│   ├── css/
│   ├── js/
│   ├── img/
│   ├── conexion.php
│   ├── index.php
│   ├── productos.php
│   ├── registrar.php
│   ├── ventas.php
│   └── historial.php
│
└── Evidencias Capturas/
```

---

# Requisitos

Antes de ejecutar el proyecto es necesario tener instalado:

- Docker Desktop
- Docker Compose
- Git (opcional)

---

# Clonar el proyecto

```bash
git clone https://github.com/Jhoana-Montan/libreria-web.git
```

Entrar a la carpeta

```bash
cd libreria-web
```

---

# Ejecutar el proyecto

Construir e iniciar los contenedores

```bash
docker compose up --build
```

Si ya fueron creados anteriormente

```bash
docker compose up
```

Para detenerlos

```bash
docker compose down
```

---

# Acceder al sistema

Una vez iniciado Docker, abrir el navegador:

```
http://localhost:8081
```

*(Si en tu docker-compose configuraste otro puerto, utiliza ese puerto.)*

---

# Base de datos

El proyecto utiliza MySQL.

La base de datos se restaura automáticamente desde:

```
mysql/backup.sql
```

No es necesario crear tablas manualmente.

---

# Funcionalidades

- Registro de productos
- Visualización de productos
- Registro de ventas
- Historial de ventas
- Conexión automática con MySQL
- Ejecución mediante Docker

---

# Evidencias

El repositorio incluye una carpeta denominada:

```
Evidencias Capturas
```

que contiene imágenes del funcionamiento del sistema.

---

# Autor

**Jhoana Montan García**

Universidad Nacional "Siglo XX"

Ingeniería Informática

Gestión 2026

---

# Licencia

Proyecto desarrollado únicamente con fines académicos.
