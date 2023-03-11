<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\APIController;
use Controllers\APICitasController;
use Controllers\CitaController;
use Controllers\LoginController;
use Controllers\AdminController;
use Controllers\ServicioController;
use Controllers\ClienteController;
use Controllers\APIClientes;
use Controllers\RolController;
use MVC\Router;

$router = new Router();

//INICIAR SESION
$router->get('/', [LoginController::class, 'login']);
$router->post('/', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);
$router->get('/perfil', [LoginController::class, 'perfil']);

//home
$router->get('/home', [LoginController::class, 'home']);

//RECUPERAR CONTRASEÑA
$router->get('/olvidarPassword', [LoginController::class, 'olvidarPassword']);
$router->post('/olvidarPassword', [LoginController::class, 'olvidarPassword']);
$router->get('/recuperarPassword', [LoginController::class, 'recuperarPassword']);
$router->post('/recuperarPassword', [LoginController::class, 'recuperarPassword']);

//CREAR CUENTA
$router->get('/crearCuenta', [LoginController::class, 'crearCuenta']);
$router->post('/crearCuenta', [LoginController::class, 'crearCuenta']);

//CONFIRMAR CUENTA
$router->get('/confirmarCuenta', [LoginController::class, 'confirmarCuenta']);
$router->get('/mensaje', [LoginController::class, 'mensaje']);

//AREA PRIVADA
$router->get('/cita', [CitaController::class, 'index']);
$router->get('/admin', [AdminController::class, 'index']);
$router->get('/admin/filtro', [AdminController::class, 'filtro']);
$router->get('/admin/filtrar', [AdminController::class, 'filtrar']);


//$router->get('/reportes', [AdminController::class, 'index']);

//API DE CITAS
$router->get('/api/servicios', [APIController::class, 'index']);
$router->post('/api/citas', [APIController::class, 'guardar']);
$router->post('/api/delete', [APIController::class, 'delete']);

//API DE INFORMACION DE CITAS
$router->get('/api/infoCitas', [APICitasController::class, 'index']);
$router->post('/api/citas/horasBloqueadas', [APICitasController::class, 'horasBloqueadas']);


//API DE CLIENTES
//$router->get('/api/infoCitas', [APICitasController::class, 'index']);
$router->get('/api/clientes', [APIClientes::class, 'index']);


//CRUD de Servicios
$router->get('/servicios', [ServicioController::class, 'index']);
$router->get('/servicios/crear', [ServicioController::class, 'crear']);
$router->post('/servicios/crear', [ServicioController::class, 'crear']);
$router->get('/servicios/actualizar', [ServicioController::class, 'actualizar']);
$router->post('/servicios/actualizar', [ServicioController::class, 'actualizar']);
$router->post('/servicios/eliminar', [ServicioController::class, 'eliminar']);

//CRUD DE CIENTES
$router->get('/clientes', [ClienteController::class, 'index']);
$router->get('/clientes/crear', [ClienteController::class, 'crear']);
$router->post('/clientes/crear', [ClienteController::class, 'crear']);
$router->get('/clientes/actualizar', [ClienteController::class, 'actualizar']);
$router->post('/clientes/actualizar', [ClienteController::class, 'actualizar']);
$router->post('/clientes/eliminar', [ClienteController::class, 'eliminar']);

//CRUD DE ROLES
$router->get('/roles', [RolController::class, 'index']);
$router->get('/roles/crear', [RolController::class, 'crear']);
$router->post('/roles/crear', [RolController::class, 'crear']);
$router->get('/roles/actualizar', [RolController::class, 'actualizar']);
$router->post('/roles/actualizar', [RolController::class, 'actualizar']);
$router->post('/roles/eliminar', [RolController::class, 'eliminar']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();