<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UserController extends BaseController
{
    public function index()
    {
        $data['title']="Agregar Carrera"; 
        $validation =  \Config\Services::validation();
            if (strtolower($this->request->getMethod()) === 'get'){
                return view('common/head') .
                view('usuario/login') .
                view('common/footer');
            }
    
            $rules = [
                'email' => 'required',
                'password'=>'required'
            ];
    
            if (! $this->validate($rules)) {
                return view('common/head') .
                view('usuario/login') .
                view('common/footer');
            }
            else{
                //si pasa las reglas
                $email = $_POST['email'];
                $password = $_POST['password'];
                $userModel = model('UserModel');
                $data['usuario']= $userModel->like('email',$email)
                                ->Like('pass',$password)
                                ->findAll();
                print_r($data['usuario']);
                if(count($data['usuario'])>0){
                    print "creo la sesión";
                    print $data['usuario'][0]->idUsuario;
                    $session = session();

                    $newdata = [
                        'idUsuario' => $data['usuario'][0]->idUsuario,
                        'nombreUsuario'  => $data['usuario'][0]->nombreUsuario,
                        'email'     => $data['usuario'][0]->email,
                        'logged_in' => true,
                    ];
                    
                    $session->set($newdata);

                }
                else{
                    return redirect('usuario/login','refresh');
                }
            }

       
        
    }
}
