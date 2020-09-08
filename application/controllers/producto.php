<?php
defined('BASEPATH') or exit('No direct script access allowed');

class producto extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('web/Mdl_Productos');
    }

    public function index()
    {
        $id_Producto = $this->uri->segment(3);

        if (strlen($id_Producto) == 0) {
            header('Location: ' . base_url() . "index.php/index");
        }

        $data['categorias'] = $this->Mdl_Productos->get_Categorias();

        $data['producto'] = $this->Mdl_Productos->get_Productos($id_Producto);
        $data['caracteristicas'] = $this->Mdl_Productos->get_Caracteristicas_Producto($id_Producto);
        $data['imagenes'] = $this->Mdl_Productos->get_Imagenes_Producto($id_Producto, 1);

        $data['titulo'] = $data['producto'][0]->PRO_Nombre;
        
        $this->load->view('producto', $data, FALSE);

    }
}

/* End of file Controllername.php */
