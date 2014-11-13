<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Categoria_Model extends CI_Model {

    public function get($idcategoria = "") {
        if ($idcategoria != null) {
            $this->db->where('idcategoria', $idcategoria);            
            $query = $this->db->get('categoria');            
            return $query->result_array()[0];
        } else {
            
            $query = $this->db->get('categoria');            
            return $query->result_array();
        }
    }

    public function delete($idcategoria) {
        $this->db->where('idcategoria', $idcategoria);
        $this->db->delete('categoria');
    }

    public function update($idcategoria, $categoria) {
        $this->db->where('idcategoria', $idcategoria);
        $this->db->update('categoria', $categoria);
    }

    public function create($categoria) {
        $this->db->insert('categoria', $categoria);
    }

}
