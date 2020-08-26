<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inicio extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('administracion/Mdl_Productos');
    }


    public function index()
    {
        $data['Titulo_Nav'] = "Productos";

        $this->form_validation->set_rules('ckb_Categorias', 'Categorias', 'required');
        $this->form_validation->set_rules('ckb_Subcategorias', 'Sucategorias', 'required');
        $this->form_validation->set_rules('Ckb_Estado', 'Estado');


        $data['categorias'] = $this->Mdl_Productos->get_Categorias();
        $data['caracteristicas'] = $this->Mdl_Productos->get_Caracteristicas();

        $data['categoria_Seleccionada'] = NULL;
        $data['subcategoria_Seleccionada'] = NULL;
        $data['productos'] = NULL;

        $data['estado'] = $this->input->post('ckb_Estado');
        $data['Estado_Activo'] = NULL;
        $data['Estado_Inactivo'] = "";
        if ($data['estado']) {
            $data['Estado_Activo'] = "selected";
        } else {
            $data['Estado_Inactivo'] = "selected";
        }

        if ($this->form_validation->run()) {
            $data['categoria_Seleccionada'] = $this->input->post('ckb_Categorias');
            $data['subcategoria_Seleccionada'] = $this->input->post('ckb_Subcategorias');
            $data['SubCategorias'] = $this->Mdl_Productos->get_Subcategorias($data['categoria_Seleccionada']);
        } else {
            $data['categoria_Seleccionada'] = $data['categorias'][0]->CAT_Categoria;
            $data['SubCategorias'] = $this->Mdl_Productos->get_Subcategorias($data['categoria_Seleccionada']);
            $data['subcategoria_Seleccionada'] = $data['SubCategorias'][0]->SUB_Subcategoria;
        }

        if ($data['subcategoria_Seleccionada'] != NULL && $data['subcategoria_Seleccionada'] != -1) {
            $data['productos'] = $this->Mdl_Productos->get_Productos(NULL, $data['subcategoria_Seleccionada'], $data['estado']);
        }

        $this->load->view('administracion/index', $data, FALSE);
    }

    public function guardar_Producto()
    {
        $this->load->helper('path');

        $arrayDatos['subcategoria'] = $this->input->post("subcategoria");
        $arrayDatos['nombre_Producto'] = $this->input->post("nombre_Producto");
        $arrayDatos['precio_Producto'] = $this->input->post("precio_Producto");
        $arrayDatos['descripcion_Producto'] = $this->input->post("descripcion_Producto");
        $arrayDatos['caracteristicas'] = json_decode($this->input->post("caracteristicas"));
        $arrayDatos['imagenes'] = $_FILES['file'];

        echo json_encode($this->Mdl_Productos->guardar_Producto($arrayDatos));
    }
}
