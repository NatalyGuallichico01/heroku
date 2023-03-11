<?php
namespace Controllers;
use Model\Usuario;

class APIClientes{
    public static function index(){
        session_start();
        isAdmin();
        $clientes= Usuario::all();
        echo json_encode($clientes);
        //debuguear($clientes);
    }
}