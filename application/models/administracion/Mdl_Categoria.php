<?php defined('BASEPATH') or exit('No direct script access allowed');

class Mdl_Categoria extends CI_Model
{

    public function guardar_Categoria($datos)
    {
        $this->db->trans_begin();

        $retorno['estado'] = "";
        $retorno['mensaje'] = "";

        $categoria['CAT_Nombre'] = $datos['nombre_Categoria'];
        $categoria['CAT_Mensaje_Web'] = $datos['descripcion_Categoria'];
        $categoria['CAT_Ruta_Imagen'] = $categoria['CAT_Nombre']."/".$datos['imagenes']['name'][0];
        $this->db->insert('categoria', $categoria);

        $subir_Imagenes = $this->subir_Imagenes($categoria['CAT_Nombre'], $datos['imagenes']);

        if ($subir_Imagenes != "ok") {
            $retorno['estado'] = "Error";
            $retorno['mensaje'] = $subir_Imagenes;
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
            $retorno['estado'] = "ok";
            $retorno['mensaje'] = "Categoría almacenada correctamente";
        }

        return $retorno;
    }

    private function createPath($path)
    {
        if (is_dir($path)) return true;
        $prev_path = substr($path, 0, strrpos($path, '/', -2) + 1);
        $return = $this->createPath($prev_path);
        return ($return && is_writable($prev_path)) ? mkdir($path) : false;
    }

    private function subir_Imagenes($categoria, $arrayImagenes)
    {

        $this->load->helper('path');

        $mensaje = NULL;

        $ruta_Base = "./recursos/imagenes/categoria/" . $categoria;

        $this->createPath($ruta_Base);

        $dir = set_realpath($ruta_Base . "/");
        $config['upload_path'] = $dir;
        $config['allowed_types'] = 'jpeg|png|jpg';

        for ($i = 0; $i < count($arrayImagenes['name']); $i++) {

            $_FILES['file']['name'] = $arrayImagenes['name'][$i];
            $_FILES['file']['type'] = $arrayImagenes['type'][$i];
            $_FILES['file']['tmp_name'] = $arrayImagenes['tmp_name'][$i];
            $_FILES['file']['error'] = $arrayImagenes['error'][$i];
            $_FILES['file']['size'] = $arrayImagenes['size'][$i];

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('file')) {
                $this->upload->data();
                $mensaje = "ok";
            } else {
                return $this->upload->display_errors();
            }
        }

        return $mensaje;
    }
}
