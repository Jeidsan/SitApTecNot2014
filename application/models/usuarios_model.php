<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function inserir($data) {
        if ($this->db->insert('usuario', $data)) {
            return TRUE;//$this->db->last_insert();
        } else {
            return FALSE;
        }
    }

    function listar() {
        $query = $this->db->get('usuario');
        return $query->result();
    }

    /* function editar($idusuario) {
      $this->db->where('idusuario', $idusuario);
      $query = $this->db->get('usuario');
      return $query->result();
      } */

    function get($idusuario) {
        $this->db->where('idusuario', $idusuario);
        $query = $this->db->get('usuario');
        return $query->result();
    }

    function login($email, $senha) {        
        $this->db->like('email', $email);
        $this->db->where('senha', $senha);
        $this->db->limit(1);
        $query = $this->db->get('usuario');        
        return $query->result();
    }

    function atualizar($data) {
        $this->db->where('idusuario', $data['idusuario']);
        $this->db->set($data);
        return $this->db->update('usuario');
    }

    function deletar($idusuario) {
        $this->db->where('idusuario', $idusuario);
        return $this->db->delete('usuario');
    }

}

/* End of file usuarios_model.php */
/* Location: ./application/models/usuarios_model.php */