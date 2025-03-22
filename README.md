# Ejecución del proyecto FutbolTrading

Por: Emanuel Patiño, Marcela Londoño & Tomás Pineda

## 1. Instalación de Dependencias

Ejecuta el siguiente comando en la raíz del proyecto para instalar las dependencias:

composer install

## 2. Configuración del Archivo .env

Abre el archivo `.env` y cambia los siguientes valores para la conexión con la base de datos MySQL:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_base_de_datos
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña

Asegúrate de reemplazar `nombre_de_tu_base_de_datos`, `tu_usuario` y `tu_contraseña` con los valores correctos.


## 3. Migraciones y Seeders

Para configurar la base de datos, ejecuta las migraciones:

php artisan migrate

El proyecto esta configurado para tener datos iniciales, ejecuta el siguiente comando para crearlos:

php artisan db:seed


## 5. Iniciar el servidor

Para iniciar el servidor de desarrollo, usa el siguiente comando:

php artisan serve

Esto ejecutará el proyecto en `http://127.0.0.1:8000/`.


## 6. Rutas principales

- http://127.0.0.1:8000/home

(Al autenticarce)
- http://127.0.0.1:8000/cards
- http://127.0.0.1:8000/tradeItem
- http://127.0.0.1:8000/cart
- http://127.0.0.1:8000/wishlist


## Sobre Laravel

Laravel es un framework de aplicaciones web con una sintaxis expresiva y elegante. Creemos que el desarrollo debe ser una experiencia agradable y creativa para ser verdaderamente gratificante. 
Laravel simplifica el desarrollo al facilitar tareas comunes utilizadas en muchos proyectos web, como:

- Sintaxis clara y expresiva

- Eloquent ORM

- Sistema de enrutamiento intuitivo

- Migraciones de base de datos

- Autenticación integrada

- Sistema de plantillas Blade

- Ecosistema de paquetes y herramientas

- Comunidad activa y documentación completa
