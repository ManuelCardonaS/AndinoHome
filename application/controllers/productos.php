<?php
defined('BASEPATH') or exit('No direct script access allowed');

class productos extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('web/Mdl_Productos');
    }

    public function index()
    {
        $categoria = $this->uri->segment(3);
        $id_Categoria = NULL;
        $id_Subcategoria = $this->uri->segment(4);

        $data['titulo'] = $categoria;
        $data['categorias'] = $this->Mdl_Productos->get_Categorias();
        
        foreach ($data['categorias'] as $key => $value) {
            if (strcasecmp($value->CAT_Nombre, $categoria)) {
                $id_Categoria = $value->CAT_Categoria;
                break;
            }
        }

        $data['subcategorias'] = $this->Mdl_Productos->get_Subcategorias($id_Categoria);

        print_r($data['subcategorias'][0]);
        
        $data['productos'] = $this->Mdl_Productos->get_Productos(NULL, $id_Subcategoria);

        $this->load->view('productos', $data, FALSE);
    }
}

/* End of file Controllername.php */
