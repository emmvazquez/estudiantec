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

