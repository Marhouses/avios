# 🧵 Sistema de Gestión de Avíos Textiles

Sistema web para la gestión integral de avíos en la industria textil y de manufactura de prendas de vestir.

## ¿Qué son los avíos?

Los avíos son todos los insumos y materiales que se utilizan para armar, cerrar o decorar una prenda de vestir, **excluyendo la tela y el hilo**. Son componentes clave que aportan funcionalidad, estructura y valor estético al producto final.

Ejemplos: cierres (cremalleras), botones, broches, corchetes, elásticos, abrojos (Velcro), entre otros.

## 🎯 Problema que resuelve

Las empresas textiles manejan grandes volúmenes de avíos de distintos tipos, proveedores y medidas. Este sistema centraliza el control de inventario, pedidos y faltantes, reemplazando el seguimiento manual en hojas de cálculo o papel.

## ⚙️ Funcionalidades principales

- 🔐 **Login y control de acceso** con roles de usuario
- 📦 **CRUD completo de avíos** (alta, edición, eliminación, consulta)
- 🏭 **Gestión de proveedores**
- 🛒 **Gestión de órdenes de compra** y órdenes completadas
- 📏 **Control de tallas y medidas** (Lenght)
- 🔍 **Búsqueda** por avío y por orden
- ⚠️ **Registro de faltantes** (Missing Avios)
- 📤 **Exportación de datos a CSV**
- 📱 **Diseño responsive**

## 🛠️ Tecnologías utilizadas

| Tecnología | Uso |
|---|---|
| PHP | Backend y lógica del servidor |
| MySQL | Base de datos relacional |
| MVC | Patrón de arquitectura del proyecto |
| CSS | Estilos y diseño visual |
| JavaScript | Interactividad y responsive |

## 🏗️ Arquitectura

El proyecto sigue el patrón **MVC (Modelo - Vista - Controlador)**:

- `*_Model.php` → Capa de datos y consultas a la base de datos
- `Controller.php` → Lógica de negocio y enrutamiento
- `*.php` → Vistas e interfaz de usuario
- `Conection.php` → Configuración de conexión a la base de datos

## 🚀 Cómo ejecutar el proyecto

1. Clonar el repositorio
2. Importar la base de datos incluida en `doc.rar`
3. Configurar las credenciales en `Conection.php`
4. Servir el proyecto desde un servidor local (XAMPP, WAMP o similar)
5. Acceder desde el navegador a `index.php`

---

Desarrollado como sistema de gestión para la industria textil y manufactura de indumentaria.
