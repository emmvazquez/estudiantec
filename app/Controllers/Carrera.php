<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Carrera extends BaseController
{
    public function index()
    {
       $this->mostrar($nav=null);
    }

    public function mostrar($nav=null)
    {
        $data['title']="Mostrar Carreras";

       
        $carreraModel = model('CarreraModel');
        $data['carreras'] = $carreraModel->findAll();
        $data['totalCarreras'] = $carreraModel->countAll();
        
        

        return view('common/header',$data)
            .  view('carrera/mostrar')
            .  view('common/footer');
    }
}

