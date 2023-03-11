<?php

namespace Controllers;

use Model\Servicio;
use MVC\Router;
use Classes\Paginacion;

class ServicioController{
    public static function index(Router $router){
        session_start();

        isAdmin();



         //PAGINACION
         $paginaActual=$_GET['page'];
         $paginaActual=filter_var($paginaActual, FILTER_VALIDATE_INT);
         if(!$paginaActual || $paginaActual <1){
             header('Location: /servicios?page=1');
         }
         //debuguear($paginaActual);
 
         //$paginaActual=1;
         $registrosPagina=5;
         $total=Servicio::total();
 
         $paginacion=new Paginacion($paginaActual, $registrosPagina, $total);
 
         if($paginacion->totalPaginas() <$paginaActual){
             header('Location: /servicios?page=1');
         }

          //USUARIOS CLIENTES
        $servicios=Servicio::paginar($registrosPagina, $paginacion->offset());
        //debuguear($usuarios);





        //$servicios=Servicio::all();

        $router->render('servicios/index', [
            'nombre'=>$_SESSION['nombre'],
            'servicios'=>$servicios,
            'paginacion'=>$paginacion->paginacion()
        ]);
    }
    public static function crear(Router $router){
        session_start();

        isAdmin();

        $servicio= new Servicio;
        $alertas=[];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $servicio->sincronizar($_POST);
            $alertas=$servicio->validar();
            if(empty($alertas)){
                $servicio->guardar();
                header('Location: /servicios');
                
            }
        }

        $router->render('servicios/crear', [
            'nombre'=>$_SESSION['nombre'],
            'servicio'=>$servicio,
            'alertas'=>$alertas
        ]);
    }
    public static function actualizar(Router $router){
        session_start();

        isAdmin();
       
        if(!is_numeric($_GET['id'])) return;
        $servicio= Servicio::find($_GET['id']);
        $alertas=[];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $servicio->sincronizar($_POST);
            $alertas=$servicio->validar();
            if(empty ($alertas)){
                $servicio->guardar();
                header('Location: /servicios');
            }
        }

        $router->render('servicios/actualizar', [
            'nombre'=>$_SESSION['nombre'],
            'servicio'=>$servicio,
            'alertas'=>$alertas
        ]);
    }
    public static function eliminar(){
        session_start();

        isAdmin();
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id=$_POST['id'];
            $servicio=Servicio::find($id);
            $servicio->eliminarLogica();
            header('Location: /servicios')
;        }
    }
}