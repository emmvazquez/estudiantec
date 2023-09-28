<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Alumno extends BaseController
{

    public function index()
    {
        $data['title']="Agregar alumno";
              
        return view('common/header',$data)
            .  view('common/footer');
    }

    public function agregar()
    {
        $data['title']="Agregar alumno";
        $carreraModel = model('CarreraModel');
        $data['carreras'] = $carreraModel->findAll();


        $data['breadcrumb']=array(
            "0" => array(
                "Id"=>"Inicio",
                "src"=>base_url('index.php/alumno/')),
            "1"=>  array(
                "Id"=>"Alumnos",
                "src"=>base_url('index.php/alumno/mostrar')),
            "2"=>  array(
                "Id"=>"Agregar",
                "src"=>base_url('index.php/alumno/agregar')),
        );  
        
        return view('common/header',$data)
            .  view('common/breadcrumb')
            .  view('alumno/agregar')
            .  view('common/footer');
    }

    public function editar($id="")
    {
        $alumnoModel = model('AlumnoModel');
        $data['title']="Editar alumno";
        $data['alumno'] = $alumnoModel->find($id);
        return view('common/header',$data)
            .  view('alumno/editar')
            .  view('common/footer');
    }


    public function insert()
    {
        $data['title']="Inserta alumno";
        $alumnoModel = model('AlumnoModel');
        
        if (! $this->validate([
            'nombre' => 'required|max_length[50]|min_length[5]'
        ])) {
            // The validation fails, so returns the form.
            return $this->agregar();
        }
        //$post = $this->validator->getValidated();

        $alumno = array(
            'nombre'=>$_POST['nombre'],
            'fechaNacimiento' =>$_POST['fechaNacimiento'],
            'sexo'=>$_POST['sexo']
        );
        
        if($alumnoModel->insert($alumno,false)){
            return redirect('alumno/mostrar','refresh');
        }
        else{
            return redirect('errors/production'); 
        }

    }

    public function update($id)
    {
        $data['title']="actualizar alumno";
        $alumnoModel = model('AlumnoModel');
        
        if (! $this->validate([
            'nombre' => 'required|max_length[50]|min_length[5]'
        ])) {
            // The validation fails, so returns the form.
            return $this->editar();
        }
        //$post = $this->validator->getValidated();

        $alumno = array(
            'nombre'=>$_POST['nombre'],
            'fechaNacimiento' =>$_POST['fechaNacimiento'],
            'sexo'=>$_POST['sexo']
        );
        
        if($alumnoModel->update($id,$alumno)){
            return redirect('alumno/mostrar','refresh');
        }
        else{
            return redirect('errors/production'); 
        }

    }




    public function mostrar($nav)
    {
        $data['title']="Mostrar Alumnos";

       
        $alumnoModel = model('AlumnoModel');
        

        $data['alumnos'] = $alumnoModel->findAll(5,$nav);
        $data['totalAlumnos'] = $alumnoModel->countAll();
        
        
        

        return view('common/header',$data)
            .  view('alumno/mostrar') 
            .  view('common/footer');
    }


    public function borrar($id){
        $alumnoModel = model('AlumnoModel');
        $alumnoModel->delete($id);
        return redirect('alumno/mostrar','refresh');
    }


    public function subirImagen(){

        return view('common/header')
            .  view('alumno/upload_form',['errors' => []])
            .  view('common/footer');
    
    }

    public function upload()
    {
        $validationRule = [
            'userfile' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[userfile]',
                    'is_image[userfile]',
                    'mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    
                ],
            ],
        ];
        if (! $this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];

            return view('alumno/upload_form', $data);
        }

        $img = $this->request->getFile('userfile');

        if (! $img->hasMoved()) {
            $filepath = WRITEPATH . 'uploads/' . $img->store();

            
            $img = $this->request->getFile('userfile');
            $file = new \CodeIgniter\Files\File($filepath);
            $data = ['uploaded_fileinfo' => $file];
           print_r($img);
            //$data = ['uploaded_fileinfo' => $img];
            $alumno = array(
                "id" => 1,
                "idAlumno" =>12,
                "idImagen"=>$img->getName()
            );

            $alumnoImgModel = model('AlumnoImagenModel');
            $alumnoImgModel->insert($alumno,false);
            return view('common/upload_success', $data);
        }

        $data = ['errors' => 'The file has already been moved.'];

        return view('upload_form', $data);
    }
}

