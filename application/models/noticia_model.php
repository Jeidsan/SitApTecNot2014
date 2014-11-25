<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Noticia_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function pontuar($data) {
        if (abs($data['ponto']) === 1) {
            $this->db->where('idnoticia', $data['idnoticia']);
            $query = "UPDATE noticia SET " . ($data['ponto'] > 0 ? "positivo = positivo + 1" : "negativo = negativo + 1");
            return $this->db->query($query);
        } else {
            return FALSE;
        }
    }

    function inserir($data) {
        if ($this->db->insert('noticia', $data)) {
            return $this->db->insert_id();
        } else {
            return FALSE;
        }
    }

    function listar() {
        $query = $this->db->get('noticia');
        return $query->result();
    }

    function get($idnoticia) {
        $this->db->where('idnoticia', $idnoticia);
        $query = $this->db->get('noticia');
        return $query->result();
    }

    function atualizar($data) {
        $this->db->where('idnoticia', $data['idnoticia']);
        $this->db->set($data);
        return $this->db->update('noticia');
    }

    function deletar($idnoticia) {
        $this->db->where('idnoticia', $idnoticia);
        return $this->db->delete('noticia');
    }

}
