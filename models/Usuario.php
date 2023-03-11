<?php
namespace Model;

class Usuario extends ActiveRecord{
    //BASE DE DATOS
    protected static $tabla='usuarios';
    protected static $columnasDB=['id', 'nombre', 'apellido', 'email', 'password', 'telefono', 'admin', 'confirmado', 'token'];

    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $password;
    public $telefono;
    public $admin;
    public $confirmado;
    public $token;

    public function __construct($args=[]){

        //$cliente='Patricia';

        $this->id=$args['id'] ?? null;
        $this->nombre=$args['nombre'] ?? '';
        $this->apellido=$args['apellido'] ?? '';
        $this->email=$args['email'] ?? '';
        $this->password=$args['password'] ?? '';
        $this->telefono=$args['telefono'] ?? '';
        $this->admin=$args['admin'] ?? '0';
        $this->confirmado=$args['confirmado'] ?? '0';
        $this->token=$args['token'] ?? '';
        //$query="SELECT * FROM " . self::$tabla . " WHERE nombre = 'Patricia'";
        //debuguear($query);
    }

    //MENSAJES DE VALIDACION PARA LA CREACION DE UNA CUENTA
    public function validateNewAccount(){
        if(!$this->nombre){
            self::$alertas['error'][]="El campo nombre es obligatorio";
        }
        if(!$this->apellido){
            self::$alertas['error'][]="El campo apellido es obligatorio";
        }
        if(!$this->telefono){
            self::$alertas['error'][]="El campo teléfono es obligatorio";
        }
        if(!$this->email){
            self::$alertas['error'][]="El campo e-mail es obligatorio";
        }
        if(!$this->password){
            self::$alertas['error'][]="El campo contraseña es obligatorio";
        }
        if (strlen($this->password)<6){
            self::$alertas['error'][]="La contraseña debe ser de almenos 6 caracteres";
        }

        return self::$alertas;
    }

    public function validarLogin(){
        if(!$this->email){
            self::$alertas['error'][]='El campo e-mail es obligatorio';
        }
        if(!$this->password){
            self::$alertas['error'][]='El campo contraseña es obligatorio';
        }

        return self::$alertas;
    }

//revisa si el usuario ya existe
    public function userExist(){
        $query="SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";
        $resultado= self::$db->query($query);
        if($resultado->num_rows){
            self::$alertas['error'][]="El usuario ya existe";
        }
       
        return $resultado;
    }

    public function validateEmail(){
        if(!$this->email){
            self::$alertas['error'][]='El campo e-mail es obligatorio';
        }
        return self::$alertas;
    }

    public function validatePassword(){
        if (!$this->password){
            self::$alertas['error'][]='El campo Contraseña es obligatorio';
        }
        if (strlen($this->password)<6){
            self::$alertas['error'][]='El campo Contraseña debe tener al menos 6 caracteres';
        }
        return self::$alertas;
    }

    public function hashPassword(){
        $this->password=password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function createToken(){
        $this->token=uniqid();
    }

    public function checkAndVerifyPassword($password){
        $resultado=password_verify($password, $this->password);
        if (!$resultado || !$this->confirmado){
            self::$alertas['error'][]='Contraseña Incorrecta o no has confirmado tu Cuenta Aún';
        }
        else{
            return true;
        }
    }
   


}