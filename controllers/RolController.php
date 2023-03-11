<?php 
namespace Controllers;

use Model\Rol;
use MVC\Router;


class RolController{
    public static function index(Router $router){
        session_start();
        isAdmin();
        $perfil=Rol::all();
        


        $router->render('rol/index', [
            'nombre'=>$_SESSION['nombre'],
            'perfil'=>$perfil,
            

        ]);
    }

    public static function crear(Router $router){
        session_start();
        isAdmin();

        $perfil=new Rol;
        $alertas=[];

        if($_SERVER['REQUEST_METHOD']==='POST'){
            $perfil->sincronizar($_POST);
            $alertas=$perfil->validate();
            if(empty($alertas)){
                $perfil->guardar();
                header("Location: /roles");
            }
        }

       
         $router->render('rol/crear', [
             'nombre'=>$_SESSION['nombre'],
             'perfil'=>$perfil,
             'alertas'=>$alertas

        ]);
    }

    public static function actualizar(Router $router){
        session_start();
        isAdmin();

        $perfil=new Rol;
        $alertas=[];

        if(!is_numeric($_GET['id'])) return;
        //debuguear($id);
        $perfil= Rol::find($_GET['id']);

        //ALERTAS VACIAS
        $alertas=[];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $perfil->sincronizar($_POST);
            $alertas=$perfil->validate();

            if(empty($alertas)){
                $resultado=$perfil->guardar();
                header('Location:/roles');
            }
        }

        $router->render('rol/actualizar', [
            'nombre'=>$_SESSION['nombre'],
            'perfil'=>$perfil,
            'alertas'=>$alertas

        ]);
    }

    public static function eliminar(){
        session_start();
        isAdmin();
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id=$_POST['id'];
            $rol=Rol::find($id);
            $rol->eliminarLogica();
            header('Location: /roles');
        }

        
    }

    

}