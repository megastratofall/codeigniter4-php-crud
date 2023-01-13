<?php

namespace App\Controllers;

use App\Models\LibroModel;

class Libros extends BaseController
{
    public function index()
    {
        $model = new LibroModel();
        $data['libros'] = $model->orderBy('id', 'ASC')->findAll();
        $data['cabecera'] = view('template/cabecera');
        $data['pie'] = view('template/pie_de_pagina');

        return view('libros/list', $data);
    }

    public function crear()
    {
        $data['cabecera'] = view('template/cabecera');
        $data['pie'] = view('template/pie_de_pagina');
        return view('libros/crear', $data);
    }

    //----INGRESANDO NUEVO LIBRO
    public function guardar()
    {
        $model = new LibroModel();

        $validacion = $this->validate([
            'nombre' => 'required|min_length[3]',
            'autor' => 'required|min_length[5]',
            'fecha_de_edicion' => 'required',
        ]);

        if (!$validacion) {
            $session = session();
            $session->setFlashdata('mensaje', 'Datos no válidos o incompletos!');
            return redirect()->back()->withInput();
            //return $this->response->redirect(site_url('/libros'));
        }
        if ($this->request->getVar('nombre') && $this->request->getVar('autor') && $this->request->getVar('fecha_de_edicion')) {
            $data = [
                'nombre' => $this->request->getVar('nombre'),
                'autor' => $this->request->getVar('autor'),
                'fecha_de_edicion' => $this->request->getVar('fecha_de_edicion')
            ];

            $model->insert($data);
            return $this->response->redirect(site_url('/libros'));
        }
    }

    //--EDITANDO DATOS------------------->
    public function editar($id = null)
    {
        //--->Para saber si llega el id ---> print_r($id);

        $model = new LibroModel();
        $data['libro'] = $model->where('id', $id)->first();

        $data['cabecera'] = view('template/cabecera');
        $data['pie'] = view('template/pie_de_pagina');

        return view('libros/editar', $data);
    }

    //--ACTUALIZACION DE DATOS------------------->
    public function actualizar()
    {
        $model = new LibroModel();

        $data = [
            'nombre' => $this->request->getVar('nombre'),
            'autor' => $this->request->getVar('autor'),
            'fecha_de_edicion' => $this->request->getVar('fecha_de_edicion')
        ];

        //recibo el id para poder hacer el update
        $id = $this->request->getVar('id');

        $validacion = $this->validate([
            'nombre' => 'required|min_length[3]',
            'autor' => 'required|min_length[5]',
            'fecha_de_edicion' => 'required',
        ]);

        if (!$validacion) {
            $session = session();
            $session->setFlashdata('mensaje', 'Datos no válidos o incompletos!');
            return redirect()->back()->withInput();
            //return $this->response->redirect(site_url('/libros'));
        }
        $model->update($id, $data);
        return $this->response->redirect(site_url('/libros'));
    }

    //--BORRADO DE DATOS------------------------>
    public function borrar($id = null)
    {
        $model = new LibroModel();
        $data = $model->where('id', $id)->first();

        $model->where('id', $id)->delete($id);

        return $this->response->redirect(site_url('/libros'));
    }

    //buscar por nombre 
    public function buscar_nombre()
    {
        $data['cabecera'] = view('template/cabecera');
        $data['pie'] = view('template/pie_de_pagina');

        $model = new LibroModel();

        $query = $this->request->getVar('query');
        $data['resultado'] = $model->where('nombre', $query)->findAll();
        /*  var_dump($data);
        var_dump($query); */


        return view('libros/buscar_nombre', $data);
    }

    public function buscar_autor()
    {
        $data['cabecera'] = view('template/cabecera');
        $data['pie'] = view('template/pie_de_pagina');

        $model = new LibroModel();

        $query = $this->request->getVar('query');
        $data['resultado'] = $model->where('autor', $query)->findAll();
        /*  var_dump($data);
        var_dump($query); */


        return view('libros/buscar_autor', $data);
    }

    public function buscar_id()
    {
        $data['cabecera'] = view('template/cabecera');
        $data['pie'] = view('template/pie_de_pagina');

        $model = new LibroModel();

        $query = $this->request->getVar('query');
        $data['resultado'] = $model->where('id', $query)->findAll();
        /*  var_dump($data);
        var_dump($query); */


        return view('libros/buscarId', $data);
    }
}
