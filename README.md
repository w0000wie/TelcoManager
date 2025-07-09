# TelcoManager 📡

**TelcoManager** es una aplicación web desarrollada en PHP y MySQL diseñada para gestionar de forma eficiente la infraestructura de redes de telecomunicaciones. Permite a administradores y técnicos registrar, consultar y modificar información sobre nodos, equipos y enlaces de red.

## Características Principales

- Registro de **Nodos** con ubicación y estado.
- Registro de **Equipos** asociados a nodos, con detalles como tipo, modelo, marca y estado.
- Registro de **Enlaces** entre nodos, incluyendo tipo de enlace, distancia y estado.
- Reportes detallados de nodos, equipos y enlaces.
- Modificación del estado de cada entidad para facilitar la gestión operativa.
- Control de acceso por rol: Administrador Principal y Técnico.

## Tecnologías Usadas

- **Frontend:** HTML5, CSS3
- **Backend:** PHP (Vanilla)
- **Base de datos:** MySQL
- **Servidor local:** XAMPP

## Estructura del Proyecto
/telcomanager
│
├── css/ # Parte visual
│ ├── estilos.css
│
├── imagenes/ # Logo de la app utilizado en las paginas
│ ├── logo.png
│
├── includes/ # Archivos comunes (conexión, header, menú)
│ ├── conexion.php
│ ├── header.php
│ └── menu.php
│
├── paginas/ # Páginas principales de la app
│ ├── dashboard.php
│ ├── detalles_tecnicos.php
│ ├── login.php
│ ├── logout.php
│ ├── modificar_enlace.php
│ ├── modificar_nodo.php
│ ├── modificar_equipo.php
│ ├── registrar_enlace.php
│ ├── registrar_equipo.php
│ ├── registrar_nodo.php
│ └── ver_reportes.php
│
│
└── index.php # Página principal

## Roles de Usuario

- **Administrador Principal**
  - Puede registrar y modificar nodos, equipos y enlaces.
  - Accede a todos los reportes.
- **Técnico**
  - Puede visualizar reportes pero no modificar datos.

## Acceso

Credenciales de ejemplo:

- **Admin**
  - Usuario: `admin`
  - Contraseña: `admin123`

- **Técnico**
  - Usuario: `tecnico`
  - Contraseña: `tecnico123`

*(Estas credenciales se pueden modificar desde la base de datos manualmente.)*

## Cómo Usar el Proyecto

1. Clona el repositorio:

   ```bash
   git clone 
