<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mdl_Productos extends CI_Model
{

    public function get_Categorias($Categoria = NULL)
    {

        $this->db->select('*');
        $this->db->from('categoria');
        $this->db->where('CAT_Estado', 1);
        if ($Categoria != NULL) {
            $this->db->where('CAT_Categoria', $Categoria);
        }

        return $this->db->get()->result();
    }

    public function get_Subcategorias($Categoria, $Subcategoria = NULL)
    {
        $this->db->select('subcategoria.*, categoria.CAT_Nombre');
        $this->db->from('subcategoria');
        $this->db->join('categoria', 'subcategoria.SUB_CAT_Categoria = categoria.CAT_Categoria', 'left');
        $this->db->where('SUB_Estado', 1);
        if ($Categoria != NULL) {
            $this->db->where('subcategoria.SUB_CAT_Categoria', $Categoria);
        }
        if ($Subcategoria != NULL) {
            $this->db->where('subcategoria.SUB_Subcategoria', $Subcategoria);
        }

        return $this->db->get()->result();
    }

    public function get_Productos($id_Producto = NULL, $id_Subcategoria = NULL, $estado = 1)
    {
        $this->db->select('producto.*, fotoproducto.FOT_Ruta');
        $this->db->from('producto');
        $this->db->join('fotoproducto', 'producto.PRO_Producto = fotoproducto.FOT_PRO_Producto', 'left');
        $this->db->where('producto.PRO_Estado', $estado);
        if ($id_Producto != NULL) {
            $this->db->where('PRO_Producto', $id_Producto);
        }
        if ($id_Subcategoria != NULL) {
            $this->db->where('PRO_SUB_Subcategoria', $id_Subcategoria);
        }

        $this->db->group_by('fotoproducto.FOT_PRO_Producto');
        $this->db->order_by('producto.PRO_Producto', 'asc');

        return $this->db->get()->result();
    }

    public function get_Caracteristicas()
    {
        $this->db->select('*');
        $this->db->from('atributoproducto');
        return $this->db->get()->result();
    }

    public function guardar_Producto($datos)
    {
        $this->db->trans_begin();

        $retorno['estado'] = "";
        $retorno['mensaje'] = "";

        $producto['PRO_SUB_Subcategoria'] = $datos['subcategoria'];
        $producto['PRO_Nombre'] = $datos['nombre_Producto'];
        $producto['PRO_Descripcion'] = $datos['descripcion_Producto'];
        $producto['PRO_Precio'] = $datos['precio_Producto'];
        $this->db->insert('producto', $producto);
        $id_Producto = $this->db->insert_id();

        $caracteristicas = array();
        foreach ($datos['caracteristicas'] as $key => $value) {
            $caracteristicas[] = array(
                'ATP_PRO_Producto' => $id_Producto,
                'ATP_ATR_Atributo' => $value->caracteristica->id,
                'ATP_Descripcion' => $value->caracteristica->valor
            );
        }

        $data = $this->get_Subcategorias(NULL, $producto['PRO_SUB_Subcategoria']);

        $nombre_Categoria = $data[0]->CAT_Nombre;
        $nombre_Subcategoria = $data[0]->SUB_Nombre;
        

        $subir_Imagenes = $this->subir_Imagenes($id_Producto, $nombre_Categoria, $nombre_Subcategoria, $datos['imagenes']);

        if ($subir_Imagenes != "ok") {
            $retorno['estado'] = "Error imágenes";
            $retorno['mensaje'] = $subir_Imagenes;
            $this->db->trans_rollback();            
        } else {
            $this->db->insert_batch('atributoproducto_producto', $caracteristicas);

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $retorno['estado'] = "Error atributo";
                $retorno['mensaje'] = "Ocurrió un error al almacenar las características del producto.";
            } else {
                $this->db->trans_commit();
                $retorno['estado'] = "ok";
                $retorno['mensaje'] = "Producto almacenado correctamente";
            }
        }

        return $retorno;
    }

    private function subir_Imagenes($id_Producto, $categoria, $subcategoria, $arrayImagenes)
    {

        $this->load->helper('path');

        $mensaje = NULL;

        $ruta_Base_Db = $categoria . "/" . $subcategoria . "/" . $id_Producto."/";
        $ruta_Base = "./recursos/imagenes/productos/" . $ruta_Base_Db;

        $this->createPath($ruta_Base);

        $ruta_Imagen = array();

        for ($i = 0; $i < count($arrayImagenes['name']); $i++) {
            $ruta_Imagen[] = array(
                'FOT_PRO_Producto' => $id_Producto,
                'FOT_Ruta' =>  $ruta_Base_Db . $arrayImagenes['name'][$i]
            );
        }

        $this->db->trans_begin();

        $this->db->insert_batch('fotoproducto', $ruta_Imagen);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $mensaje = "Se ha producido un error al subir las imágenes";
        } else {
            $this->db->trans_commit();

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
        }

        return $mensaje;
    }

    private function createPath($path)
    {
        if (is_dir($path)) return true;
        $prev_path = substr($path, 0, strrpos($path, '/', -2) + 1);
        $return = $this->createPath($prev_path);
        return ($return && is_writable($prev_path)) ? mkdir($path) : false;
    }
}
