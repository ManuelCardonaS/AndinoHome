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

    public function get_Caracteristicas_Producto($id_Producto)
    {
        $this->db->select('atributoproducto_producto.*, atributoproducto.ATR_Nombre');
        $this->db->from('atributoproducto_producto');
        $this->db->join('atributoproducto', 'atributoproducto.ATR_AtributoProducto = atributoproducto_producto.ATP_ATR_Atributo', 'left');
        $this->db->where('atributoproducto_producto.ATP_PRO_Producto', $id_Producto);

        return $this->db->get()->result();
    }

    public function get_Imagenes_Producto($id_Producto, $estado)
    {
        $this->db->select('*');
        $this->db->from('fotoproducto');
        $this->db->where('FOT_PRO_Producto', $id_Producto);
        $this->db->where('FOT_Estado', $estado);

        return $this->db->get()->result();
    }

}
