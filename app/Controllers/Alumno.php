<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Alumno extends BaseController
{
    protected $helpers = ['form'];
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
        helper(['form','url']);
        $validation =  \Config\Services::validation();
        if ((strtolower($this->request->getMethod()) !== 'get')) {
            return 
            view('common/head') .
            view('common/menu') .
            view('alumno/agregar') .
            view('common/footer');
        }

        $rules = [];

        if (! $this->validate($rules)) {
            view('common/head') .
        view('common/menu') .
        view('alumno/agregar',['validation' => $validation]) .
        view('common/footer');
        }

        // If you want to get the validated data.
        //$validData = $this->validator->getValidated();
       /* return 
        view('common/head') .
        view('common/menu') .
        view('alumno/agregar') .
        view('common/footer');*/
    }

    public function insert(){
        $alumnoModel = model('AlumnoModel');
        $data = [
            "nombre" => $_POST['nombre'],
            "sexo" => $_POST['sexo'],
            "fechaNacimiento" => $_POST['fechaNacimiento']
        ];
        $alumnoModel->insert($data, false);
        return redirect('alumno/mostrar','refresh');
    }

    public function delete($id){
        $alumnoModel = model('AlumnoModel');
        $alumnoModel->delete($id);
        return redirect('alumno/mostrar','refresh');
    }

    public function editar($id){
        $alumnoModel = model('AlumnoModel');
        $data['alumno'] = $alumnoModel->find($id);

        return 
        view('common/head') .
        view('common/menu') .
        view('alumno/editar',$data) .
        view('common/footer');
    }

    public function update(){
        $alumnoModel = model('AlumnoModel');
        $data = [
            "nombre" => $_POST['nombre'],
            "sexo" => $_POST['sexo'],
            "fechaNacimiento" => $_POST['fechaNacimiento']
        ];
        $alumnoModel->update($_POST['id'],$data);
        return redirect('alumno/mostrar','refresh');
    }

    public function buscar(){
        $alumnoModel = model('AlumnoModel');
        if(isset($_GET['nombre'])){
            $nombre = $_GET['nombre'];
            $sexo=$_GET['sexo'];
            $data['alumnos']= $alumnoModel->like('nombre',$nombre)
                                ->Like('sexo',$sexo)
                                ->findAll();
        }
        else{
            $nombre = "";
            $data['alumnos']=$alumnoModel->findAll();
        }

        return 
            view('common/head') .
            view('common/menu') .
            view('alumno/buscar',$data) .
            view('common/footer');
    }


    public function estadistica(){

    }



}

