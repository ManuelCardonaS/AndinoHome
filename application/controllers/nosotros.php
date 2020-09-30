<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class nosotros extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('web/Mdl_Productos');
    }
    
    function index()
    {
        $data['menu'] = "nosotros";
        $data['categorias'] = $this->Mdl_Productos->get_Categorias();

        $this->load->view('nosotros', $data, FALSE);
    }

}

/* End of file Controllername.php */
