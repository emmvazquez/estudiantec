<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {   $db = db_connect();
        $sql = "SELECT Alumno.*, Grupos.grupo, Grados.grado FROM Alumno, Grados, Grupos where Alumno.idGrado = Grados.idGrado and Alumno.idGrupo = Grupos.idGrupo";
        $query = $db->query($sql);
        $data['alumnos'] = $query->getResult();

        return view('home/head') . 
        view('home/menu') . 
        view('home/listaAlumnos',$data) .
        view('home/footer')   
        ;
    }
}
