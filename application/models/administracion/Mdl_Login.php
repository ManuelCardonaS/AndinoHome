<?php defined('BASEPATH') or exit('No direct script access allowed');

class Mdl_Login extends CI_Model
{
    
    public function __construct()
    {
        parent::__construct();
    }
    

    public function Login($Usuario, $Contrasena)
    {

        $retorno['mensaje'] = NULL;
        $retorno['datos'] = NULL;

        $this->db->select('login.*');
        $this->db->from('login');
        $this->db->where('LOG_Usuario like binary', $Usuario);

        $resultado = $this->db->get()->result();
        if (count($resultado) == 1) {
            $usuario = $resultado[0];

            if ($Contrasena ===  $this->encryption->decrypt($usuario->LOG_Contrasena)) {

                $this->db->select('usuario.*');
                $this->db->from('usuario');
                $this->db->where('USU_Usuario', $usuario->LOG_USU_Usuario);
                $this->db->where('USU_Estado', 1);                

                $result = $this->db->get()->result();
                if (count($result) == 1) {
                    $resultado_Usuario = $result[0];
                    $retorno['mensaje'] = "ok";
                    $arraydata = array(
                        'USU_Usuario' => $resultado_Usuario->USU_Usuario,
                        'USU_ROL_Rolusuario' => $resultado_Usuario->USU_ROL_Rolusuario,
                        'USU_Nombre' => $resultado_Usuario->USU_Nombre,
                        'USU_Apellido' => $resultado_Usuario->USU_Apellido,
                        //'USU_Url_Img' => $resultado_Usuario->USU_Url_Img
                    );
                    $retorno['datos'] = $arraydata;
                }
            } else {
                $retorno['mensaje'] = "La contraseña es errónea";
            }
        } else {
            $retorno['mensaje'] = "No se encuentra el usuario";
        }

        return $retorno;
    }

}
