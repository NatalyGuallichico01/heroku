<?php 
namespace Controllers;

use Model\Servicio;
use Model\Usuario;
use MVC\Router;
use Classes\Email;
use Classes\Paginacion;

class ClienteController{
    public static function index(Router $router){
        session_start();
        isAdmin();
        // $clientes=Usuario::all();
        // echo json_encode($clientes);




        //CONSULTAR LA BASE DE DATOS
        //$auth = new Usuario($_POST);
        // $id = ($_GET['id']);
        // $query = "SELECT * FROM usuarios WHERE id= nombre LIKE '%$busqueda'" ;
        // while($row=$query->fetch_array()){
        //     debuguear($query);
        // }
        //$usuario = Usuario::where('nombre', $usuario->id);
       
       
        //error_reporting(0);

        //$cliente=' Patricia';
        //debuguear($cliente);
        

        //PAGINACION
        $paginaActual=$_GET['page'];
        $paginaActual=filter_var($paginaActual, FILTER_VALIDATE_INT);
        if(!$paginaActual || $paginaActual <1){
            header('Location: /clientes?page=1');
        }
        //debuguear($paginaActual);

        //$paginaActual=1;
        $registrosPagina=2;
        $total=Usuario::total();

        $paginacion=new Paginacion($paginaActual, $registrosPagina, $total);

        if($paginacion->totalPaginas() <$paginaActual){
            header('Location: /clientes?page=1');
        }
        
        //USUARIOS CLIENTES
        $usuarios=Usuario::paginar($registrosPagina, $paginacion->offset());
        //debuguear($usuarios);


        $router->render('cliente/index', [
            'nombre'=>$_SESSION['nombre'],
            'usuarios'=>$usuarios,
            'paginacion'=>$paginacion->paginacion()

        ]);
    }

    public static function crear(Router $router){
        session_start();
        isAdmin();

        $usuario=new Usuario;

        //ALERTAS VACIAS
        $alertas=[];
        
        if($_SERVER ['REQUEST_METHOD'] === 'POST'){
            $usuario->sincronizar($_POST);
            $alertas=$usuario->validateNewAccount();
            
            //REVISAR QUE ALERTAS ESTE VACIO
            if (empty($alertas)){
                //verificar que el usuario no este registrado
                $resultado=$usuario->userExist();
                if ($resultado->num_rows){
                    $alertas=Usuario::getAlertas();
                }
                else{
                    //hashear el password
                    $usuario->hashPassword();

                    //generar el token  unico
                    $usuario->createToken();
                    //Enviar el Email
                    $email=new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->sendConfirmation();

                    //CREAR EL USUARIO
                    $resultado=$usuario->guardar();
                    if ($resultado){
                        header('Location: /mensaje');
                    }
                    
                    //debuguear($usuario);
                }
            }
        }

         $router->render('cliente/crear', [
             'nombre'=>$_SESSION['nombre'],
             'usuario'=>$usuario,
             'alertas'=>$alertas

        ]);
    }

    public static function actualizar(Router $router){
        session_start();
        isAdmin();

        if(!is_numeric($_GET['id'])) return;
        //debuguear($id);
        $usuario= Usuario::find($_GET['id']);

        //ALERTAS VACIAS
        $alertas=[];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $usuario->sincronizar($_POST);
            $alertas=$usuario->validateNewAccount();

            if(empty($alertas)){
                $resultado=$usuario->guardar();
                header('Location:/clientes');
            }
        }

        $router->render('cliente/actualizar', [
            'nombre'=>$_SESSION['nombre'],
            'usuario'=>$usuario,
            'alertas'=>$alertas

        ]);
    }

    public static function eliminar(){
        session_start();
        isAdmin();
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id=$_POST['id'];
            $usuario=Usuario::find($id);
            $usuario->eliminar();
            header('Location: /clientes');
        }

        
    }

    

}