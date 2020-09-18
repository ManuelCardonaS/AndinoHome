<?php
defined('BASEPATH') or exit('No direct script access allowed');

class categoria extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('web/Mdl_Productos');
    }

    public function index()
    {
        $categoria = $this->uri->segment(3);

        if (strlen($categoria) == 0) {
            header('Location: ' . base_url() . "index.php/index");
        }

        $id_Categoria = NULL;

        $data['titulo'] = $categoria;
        $data['categorias'] = $this->Mdl_Productos->get_Categorias();
        
        foreach ($data['categorias'] as $key => $value) {
            if (strcasecmp($value->CAT_Nombre, $categoria) == 0) {
                $id_Categoria = $value->CAT_Categoria;
                $data['mensaje_Categoria'] = $value->CAT_Mensaje_Web;
                $data['imagen_Categoria'] = $value->CAT_Ruta_Imagen;
                break;
            }
        }

        $data['id_Categoria'] = $id_Categoria;
        $data['id_subcategoria'] = $this->uri->segment(4);
        $data['subcategorias'] = $this->Mdl_Productos->get_Subcategorias($id_Categoria);

        if (strlen($data['id_subcategoria']) == 0 && count($data['subcategorias']) > 0) {
            $data['id_subcategoria'] = $data['subcategorias'][0]->SUB_Subcategoria;
        }

        if (count($data['subcategorias']) > 0) {
            $data['productos'] = $this->Mdl_Productos->get_Productos(NULL, $data['id_subcategoria']);
        }

        $this->load->view('categoria', $data, FALSE);
    }
}

/* End of file Controllername.php */
