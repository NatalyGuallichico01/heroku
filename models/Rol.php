<?php
namespace Model;

class Rol extends ActiveRecord{
    //BASE DE DATOS
    protected static $tabla='perfil';
    protected static $columnasDB=['id', 'descripcion'];

    public $id;
    public $descripcion;

    public function __construct($args=[]){

        //$cliente='Patricia';

        $this->id=$args['id'] ?? null;
        $this->descripcion=$args['descripcion'] ?? '';
       
    }

    //MENSAJES DE VALIDACION PARA LA CREACION DE UNA CUENTA
    public function validate(){
        if(!$this->descripcion){
            self::$alertas['error'][]="El campo descripcion es obligatorio";
        }
       
        return self::$alertas;
    }

}