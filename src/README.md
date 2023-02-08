El siguiente proyecto es parte de una prueba tecnica para empresas de LATAM

Incluye un simple scaffold con un CRUD de usuarios básico:

Las instrucciones para poder levantar son las siguientes:

Se debe copiar los archivos .env.example tanto dentro de la carpeta /src (carpeta laravel) como dentro de la carpeta raiz del proyecto principal

Esto levantará el ambiente completo cuando se ejecute el siguiente comando:

```
docker-compose build && docker-compose up
```

Luego de esto es necesario entrar al contenedor

```
docker exec -it latam_app "bash"
```

Esto permitirá entrar al contenedor y se debe ejecutar lo siguiente:

```
composer install
npm install
npm run prod
```

Posteriormente, solo se debería ejecutar

```
php artisan migrate:fresh --seed
```


y listo. La aplicación debería correr en localhost:8075 y la base de datos es accesible a través de 127.0.0.1:33075 con cualquier gestor

las credenciales:
user: latammobile
password: latammobile
