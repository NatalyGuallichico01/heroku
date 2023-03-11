<?php
namespace Controllers;

use Classes\Email;
use MVC\Router;
use Model\Usuario;

class LoginController{
    public  static function login(Router $router){
        
        $alertas=[];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth = new Usuario($_POST);
            $alertas = $auth->validarLogin();

            if(empty($alertas)){
                //comprobar que el usuario existe
                $usuario = Usuario::where('email',  $auth->email);
                //debuguear($usuario);
                if($usuario){
                    //Verificar la contraseña
                    if($usuario->checkAndVerifyPassword($auth->password)){
                        //Autenticar al Usuario
                        session_start();

                        $_SESSION['id']=$usuario->id;
                        $_SESSION['nombre']=$usuario->nombre .  " " . $usuario->apellido;
                        $_SESSION['email']=$usuario->email;
                        $_SESSION['login']=true;

                        //redireccionamiento
                        if($usuario->admin === "1"){
                            $_SESSION['admin']=$usuario->admin ?? null;
                            header('Location: /admin');
                        }
                        else{
                            header('Location: /cita');
                        }
                        
                    }
                }
                else{
                    Usuario::setAlerta('error', 'El Usuario ingresado No Existe');
                }
            }
            
        }

        $alertas=Usuario::getAlertas();

        $router->render('auth/login', [
            'alertas' => $alertas
        ]);
    }

    public  static function logout(){
        session_start();
        
        $_SESSION=[];
        header('Location: /');
    }

     
    public  static function olvidarPassword(Router $router){

        $alertas=[];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth= new Usuario($_POST);
            $alertas= $auth->validateEmail();

            if(empty($alertas)){
                $usuario=Usuario::where('email', $auth->email);
                if($usuario && $usuario->confirmado === "1"){
                    //Generar un token de un solo uso
                    $usuario->createToken();
                    $usuario->guardar();

                    //TODO: enviar el emailpara recuperar la contraseña
                    $email=new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->sendInstructions();

                    //Alerta de exito
                    Usuario::setAlerta('exito', 'Revisa tu E-mail');
                }

                else{
                    Usuario::setAlerta('error', 'El usuario no existe o no esta confimado');
                }
            }
        }

        $alertas=Usuario::getAlertas();

        $router->render('auth/olvidar_password', [
            'alertas'=>$alertas
        ]);
    }

    public  static function recuperarPassword(Router $router){

        $alertas=[];
        $error=false;

        $token= s($_GET['token']);

        //Buscar Usuario por su token
        $usuario=Usuario::where('token', $token);

        if(empty($usuario)){
            Usuario::setAlerta('error', 'Token no válido');
            $error=true;
        }

        if($_SERVER['REQUEST_METHOD']=='POST'){
            //LEER LA NUEVA CONTRASEÑA Y GUARDAR
            $password= new Usuario($_POST);
            $alertas=$password->validatePassword();
            
            if(empty($alertas)){
                $usuario->password='';
                $usuario->password=$password->password;
                $usuario->hashPassword();
                $usuario->token=null;
                $resultado=$usuario->guardar();
                if($resultado){
                    header('Location: /');
                }
                //debuguear($usuario);
            }
        }

        //debuguear($usuario);

        $alertas=Usuario::getAlertas();

        $router->render('auth/recuperar_password', [
            'alertas'=>$alertas,
            'error'=>$error
        ]);
    }

    public  static function crearCuenta(Router $router){
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
        $router->render('auth/crear_cuenta', [
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }

    public static function mensaje (Router $router){
        $router->render('auth/mensaje');
    }

    public static function confirmarCuenta(Router $router){

        $alertas=[];

        $token = s($_GET['token']);
        
        $usuario = Usuario::where('token', $token);
        //debuguear($usuario);

        if(empty($usuario)){
            //mostrar mensaje de error
            Usuario::setAlerta('error', 'Token no válido');
        }
        else{
            //modificar el usuario confirmado
            $usuario->confirmado="1";
            $usuario->token='';
            $usuario->guardar();
            Usuario::setAlerta('exito', 'Verificación de Cuenta Exitosa');
        }
        
        //obtener alertas
        $alertas=Usuario::getAlertas();

        //renderizar la vista
        $router->render('auth/confirmar_cuenta', [
            'alertas' => $alertas
        ]);
    }

}