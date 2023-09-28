<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Alumno extends BaseController
{
    public function index()
    {
        //
    }

    public function mostrar(){
        $alumnoModel = model('AlumnoModel');
        $data['alumnos'] = $alumnoModel->findAll();
        return 
        view('common/head') .
        view('common/menu') .
        view('alumno/mostrar',$data) .
        view('common/footer');
    }

    public function agregar(){
        return 
        view('common/head') .
        view('common/menu') .
        view('alumno/agregar') .
        view('common/footer');
    }

    public function editar(){

    }

    public function estadistica(){

    }



}

