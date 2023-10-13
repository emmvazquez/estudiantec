<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Carrera extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
       $this->mostrar($nav=null);
    }

    public function agregar(){
        $data['title']="Agregar Carrera";   
        $validation =  \Config\Services::validation();
            if (strtolower($this->request->getMethod()) === 'get'){
                return view('common/head',$data)
                .  view('carrera/agregar')
                .  view('common/footer');
            }
    
            $rules = [
                'carrera' => 'required|max_length[30]'
            ];
    
            if (! $this->validate($rules)) {
                return view('common/head',$data)
                .  view('carrera/agregar',['validation' => $validation])
                .  view('common/footer');
            }
            else{
                if($this->insert()){
                    return redirect('alumno/mostrar','refresh');
                }
            }

    }

    public function insert(){
        $carreraModel = model('CarreraModel');
        $data = [
            "nombre" => $_POST['carrera'],
            "acronimo" => $_POST['acronimo']
        ];
        $carreraModel->insert($data, false);
        return true;
    }



    public function mostrar($nav=null)
    {
        $data['title']="Mostrar Carreras";

       
        $carreraModel = model('CarreraModel');
        $data['carreras'] = $carreraModel->findAll();
        $data['totalCarreras'] = $carreraModel->countAll();
        
        

        return view('common/head',$data)
            .  view('carrera/mostrar')
            .  view('common/footer');
    }
}

