<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categoria extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('administracion/Mdl_Productos');
        $this->load->model('administracion/Mdl_Categoria');
    }

    public function index()
    {
        $data['Titulo_Nav'] = "Categorías";
        $data['categorias'] = $this->Mdl_Productos->get_Categorias();
        $data['id_Categoria_Seleccionada'] = $this->uri->segment(4);

        if (count($data['categorias']) > 0) {
            if ($data['id_Categoria_Seleccionada'] == "") {
                $data['id_Categoria_Seleccionada'] = $data['categorias'][0]->CAT_Categoria;
            }

            $data['subCategorias'] = $this->Mdl_Productos->get_Subcategorias($data['id_Categoria_Seleccionada']);
            $categoria_Seleccionada = $this->Mdl_Productos->get_Categorias($data['id_Categoria_Seleccionada']);

            if (count($categoria_Seleccionada) > 0) {
                $data['ruta_Imagen_Categoria'] = $categoria_Seleccionada[0]->CAT_Ruta_Imagen;
                $data['mensaje_Categoria'] = $categoria_Seleccionada[0]->CAT_Mensaje_Web;
            }
        }

        $this->load->view('administracion/categoria', $data, FALSE);
    }

    public function guardar_Categoria()
    {
        $this->load->helper('path');

        $arrayDatos['nombre_Categoria'] = $this->input->post("nombre_Categoria");
        $arrayDatos['descripcion_Categoria'] = $this->input->post("descripcion_Categoria");
        $arrayDatos['imagenes'] = $_FILES['file'];

        echo json_encode($this->Mdl_Categoria->guardar_Categoria($arrayDatos));
    }
}
