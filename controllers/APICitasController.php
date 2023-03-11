<?php

namespace Controllers;

use Model\Cita;

class APICitasController{
    public static function index(){
        //isAdmin();
        $citas=Cita::all();
        echo json_encode($citas);
    }

    public static function horasBloqueadas(){
        //isAdmin();
        $fecha = $_POST['date'];
        $consulta = "SELECT citas.hora ";
        $consulta .= " FROM citas ";
        $consulta .= " WHERE fecha =  '{$fecha}' ";
        $citas=Cita::SQL($consulta);
        echo json_encode($citas);
    }
}