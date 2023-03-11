<?php

namespace Model;

class AdminCita extends ActiveRecord{
    protected static $tabla='citasservicios';
    protected static $columnasDB=['id', 'hora', 'cliente', 'email', 'telefono', 'servicio', 'precio', 'estado'];

    public $id;
    public $hora;
    public $cliente;
    public $email;
    public $telefono;
    public $servicio;
    public $precio;
    public $estado;

    public function __construct(){
        $this->id=$args['id'] ?? null;
        $this->hora=$args['hora'] ?? '';
        $this->cliente=$args['cliente'] ?? '';
        $this->email=$args['email'] ?? '';
        $this->telefono=$args['telefono'] ?? '';
        $this->servicio=['servicio'] ?? '';
        $this->estado=['estado'] ?? '0';
    }
}