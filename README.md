# FW_PHP_OO_ANGULAR

## Tecnologias utilizadas: ##
- [Angular JS version 1.4](https://angularjs.org/)
- [PHP 5.6](https://www.php.net/manual/es/intro-whatis.php)
- [MySQL](https://www.mysql.com/)
- [Encriptacion JWT](https://jwt.io/)
- [MVC](https://codigofacilito.com/articulos/mvc-model-view-controller-explicado)
    
## Validacion: ##
- Control de usuarios en base de datos
- Expresiones regulares
- Regerar token en cada función de usuario registrado

## Servicios ##
- [Mailgun](https://www.mailgun.com/)
- [Auth0](https://auth0.com/)

## Librerias ##
- [Toastr](https://github.com/CodeSeven/toastr)
- [Boostrap](https://getbootstrap.com/)
- [Dropzone](https://www.dropzonejs.com/)

## Modulos ##
- Home
    - Buscar los productos.
    - Like a los productos.
    - Detalles de los productos.
    - Mostrar más productos.
- Contact
    - Enviar correo con informacion
- Shop
    - Detalles de los productos.
    - Buscar productos.
    - Like a los productos.
    - Pagination.
- Login
    - Registrar
        - Validacion del usuario si existe.
        - DDD (desplegables con el pais, provincia y poblacion consumidos de JSON).
        - Envio de token al correo para activarlo.
        - token del usuario en JWT.
        - Añadir foto con dropzone.
        - SocialLogin: GitHub y Google.
    - Login
        - Validacion del usuario si existe.
        - Regeneración de token una vez registrado.
    - Cambiar contraseña
        - Validacion de contraseña (Expresion regular)
        - Enviar un correo con el token del usuario para cambiar la contraseña.
    - Profile
        - Se muestran los datos del usuario.
        - Se pueden modificar los datos.
        - Puede observar los likes del mismo.
- CRUD
    - *Solo un usuario registrado puede realizar las siguiente operaciones*
        - Crear
            - Validacion contra base de datos.
            - Añadir foto con dropzone.
            - DDD (desplegables con el pais, provincia y poblacion consumidos de JSON).
        - Modificar
        - Borrar 
        - Visualizar
- Aspectos tecnicos
    - Frontend
        - app.js
        - apiconnector.js(Conecta el Frontend con la base de datos)
        - login
            - localstorage.services.js (El token del usuario)
            - login.services.js (Servicio unico que muestra el menu del usuario)
    - Backend
        - router.php
        - autoload.php 
        - resources