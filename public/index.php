<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\BlogControllers;
use Controllers\LoginControllers;
use Controllers\PaginasControllers;
use Controllers\VendedorControllers;
use Controllers\PropiedadControllers;

$router = new Router();

//Zona Privada
$router->get('/admin', [new PropiedadControllers(), 'index']);
$router->get('/propiedades/crear', [new PropiedadControllers(), 'crear']);
$router->post('/propiedades/crear', [new PropiedadControllers(), 'crear']);
$router->get('/propiedades/actualizar', [new PropiedadControllers(), 'actualizar']);
$router->post('/propiedades/actualizar', [new PropiedadControllers(), 'actualizar']);
$router->post('/propiedades/eliminar', [new PropiedadControllers(), 'eliminar']);

$router->get('/vendedores/crear', [new VendedorControllers(), 'crear']);
$router->post('/vendedores/crear', [new VendedorControllers(), 'crear']);
$router->get('/vendedores/actualizar', [new VendedorControllers(), 'actualizar']);
$router->post('/vendedores/actualizar', [new VendedorControllers(), 'actualizar']);
$router->post('/vendedores/eliminar', [new VendedorControllers(), 'eliminar']);

$router->get('/blogs/crear', [new BlogControllers(), 'crear']);
$router->post('/blogs/crear', [new BlogControllers(), 'crear']);
$router->get('/blogs/actualizar', [new BlogControllers(), 'actualizar']);
$router->post('/blogs/actualizar', [new BlogControllers(), 'actualizar']);
$router->post('/blogs/eliminar', [new BlogControllers(), 'eliminar']);

//Zona Publica
$router->get('/', [new PaginasControllers(), 'index']);
$router->get('/nosotros', [new PaginasControllers(), 'nosotros']);
$router->get('/propiedades', [new PaginasControllers(), 'propiedades']);
$router->get('/propiedad', [new PaginasControllers(), 'propiedad']);
$router->get('/blog', [new PaginasControllers(), 'blog']);
$router->get('/entrada', [new PaginasControllers(), 'entrada']);
$router->get('/contacto', [new PaginasControllers(), 'contacto']);
$router->post('/contacto', [new PaginasControllers(), 'contacto']);

//Login y autenticacion
$router->get('/login', [new LoginControllers(), 'login']);
$router->post('/login', [new LoginControllers(), 'login']);
$router->get('/logout', [new LoginControllers(), 'logout']);

$router->comprobarRutas();