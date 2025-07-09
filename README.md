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


---

## ¿Cómo instalar y ejecutar el sistema?

### 1. Configurar el entorno local

- Descarga e instala **XAMPP** si no lo tienes:  
[https://www.apachefriends.org/es/index.html](https://www.apachefriends.org/es/index.html)

- Asegúrate de iniciar **Apache** y **MySQL** desde el panel de XAMPP.

### 2. Clonar o copiar el repositorio

Clona el repositorio desde GitHub:

```bash
git clone https://github.com/w0000wie/TelcoManager.git

O descarga el archivo ZIP desde GitHub y extráelo en:
C:\xampp\htdocs\
Debe quedar así:
C:\xampp\htdocs\telcomanager\

### 3. Importar la base de datos
Abre tu navegador y accede a:
http://localhost/phpmyadmin

Haz clic en "Nueva" y crea una base de datos llamada:
telcomanager
Con la base ya creada, haz clic sobre su nombre.

Ve a la pestaña "Importar".
En "Archivo a importar", selecciona telcomanager_db.sql ubicado en la raíz del proyecto.
Haz clic en "Continuar".
Si todo fue exitoso, verás las tablas usuarios, nodos, equipos y enlaces.

Acceso al sistema
Una vez importada la base de datos, accede a la app en tu navegador:

Copiar código
http://localhost/telcomanager

Proyecto realizado como evaluación final de la materia Desarrollo de Aplicaciones Web
Participantes:
Jeorgelyz Camacaro
Lihoffman Carrasquero
