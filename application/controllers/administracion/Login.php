<?php defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();       
        $this->load->model('administracion/Mdl_Login');
    }
    

    public function index()
    {
        if (sesion()) {
            redirect(base_url() . 'index.php/administracion/inicio');
        }
        
        $this->form_validation->set_rules('txt_Usuario', 'Usuario', 'trim|required');
        $this->form_validation->set_rules('txt_Contrasena', 'Contraseña', 'trim|required');

        $data['bienvenido'] = NULL;
        $data['Usuario'] = NULL;
        $data['Contrasena'] = NULL;

        if ($this->form_validation->run()) {
            
            $Usuario = htmlentities($this->input->post('txt_Usuario'));            
            $Contrasena = htmlentities($this->input->post('txt_Contrasena'));

            $data['Usuario'] = $Usuario;
            $data['Contrasena'] = $Contrasena;
            $respuesta = $this->Mdl_Login->Login($Usuario, $Contrasena);

            $data['bienvenido'] = $respuesta['mensaje'];
            $this->session->set_userdata($respuesta['datos']);

        }
        
        
        $this->load->view('administracion/login', $data, FALSE);
    }

    public function cerrarSesion()
    {
        $this->session->sess_destroy();

        redirect(base_url() . 'index.php/administracion/login', 'refresh');
    }

}
