# Base de datos Chat 
---
Para este proyecto se nos pidió que crearamos una DataBase(con una gestion de datos basado en Laravel) para un chat como si fuera "Discord".

---
## Trabajo Realizado 🔧
---

Lo primero que hice fue pensar el diagrama de la base de datos. Y una vez tuve claro la estructura de la base de datos, procedí a la creacion de los modelos.

_Foto de Ejemplo_
<img class="foto" src="./img/Chat DDBB.jpg" alt="diagrama">

Lo siguiente fue hacer los seeders de las diferentes tablas. A continuacion, hice las diferentes rutas de los controladores. Una vez tuve hecha las rutas, fui a por los controladores. Definí el CRUD de todas las tablas que lo necesitacen.

Una vez acabamos todo el trabajo, repasamos que los controladores y las rutas esten bien. A continuacion, deployamos en Heroku la base de datos


---

## Deploy en Heroku 
---

[Link del proyecto en heroku](https://sylverwing-chat-app.herokuapp.com/api) 🌎


---

## Instrucciones y endpoints

---

- Abrir el link de heroku para arrancar automáticamente el servidor. 

- Pasamos a postman donde copiaremos también el mismo link para empezar a lanzar peticiones.

---

## Endpoints

---

<h4>Usuarios</h4>

* "/api/register" para registrarnos como usurarios.

<br>

* "/api/login" para loggearnos como usuarios

<br>

* "/api/profile" con este Endpoint veríamos nuestra informacion de usuario

<br>

* "/api/profile/update/:id" para buscar y actualizar tu perfil por su id

<br>

* "/api/logout" para cerrar sesion

<br>

---

<h4>Channels</h4>

---


* GET "/api/channel" para buscar todos los canales

<br>

* GET "/api/channel/:id" para buscar un canal a través de su id.

<br>

* POST "/api/channel" para crear un canal

<br>

* PUT "/api/channel/:id" para buscar y modificar un canal por su id

<br>

* DELETE "/api/channel/:id" para buscar y borrar un canal por su id

<br>

---

<h4>Games</h4>

---


* POST "/api/games" para crear una tematica de un juego

<br>

* GET "/api/games/:id" para buscar un juego a través de su id.

<br>

* GET "/api/games" para buscar todos los juegos

<br>

* PUT "/api/games/:id" para buscar y modificar un juego por su id

<br>

* DELETE "/api/games/:id" para buscar y borrar un juego por su id

<br>

---

<h4>Messages</h4>

---

* POST "/api/message" para crear enviar un mensaje

<br>

* GET "/api/message/:id" para buscar un mensaje a través de su id.

<br>

* PUT "/api/message/:id" para buscar y modificar un mensaje por su id

<br>

* DELETE "/api/message/:id" para buscar y borrar un mensaje por su id

<br>


---

<h4>Herramientas 🛠️</h4>

---

- PHP

- Laravel

- Heroku

---

<h4>Diseño y Producido ✒️</h4>

---

Lionel M. Garcia Bustos
