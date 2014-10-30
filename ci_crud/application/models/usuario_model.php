<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Classe Usuário
 *
 * @author Jeidsan A da C Pereira
 */
class Usuario_Model extends CI_Model {

    public function get($idusuario = null) {
        if ($idusuario != null) {
            $this->db->where('idusuario', $idusuario);
            $query = $this->db->get('usuario');
            return $query->result_array()[0];
        } else {
            $query = $this->db->get('usuario');
            return $query->result_array();
        }
    }

    public function delete($idusuario) {
        $this->db->where('idusuario', $idusuario);
        $this->db->delete('usuario');
    }

    public function update($idusuario, $usuario) {
        $this->db->where('idusuario', $idusuario);
        $this->db->update('usuario', $usuario);
    }

    public function create($usuario) {
        $this->db->insert('usuario', $usuario);
    }

}
