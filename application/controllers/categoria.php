<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Categoria extends CI_Controller {       

    function index() {
        $this->get();        
        
    }

    public function get($idcategoria = NULL) {        
        $this->load->model('categoria_model'); 
        if ($idcategoria != null) {              
            $data['categorias'] = $this->categoria_model->get($idcategoria);
            $this->load->view('categoria_view', $data);
        } else {                        
            $data['categorias'] = $this->categoria_model->get();
            $this->load->view('listaCategoria_view', $data);
        }
    }

    public function update() {        
        $this->load->model('categoria_model'); 
        $idcategoria = $this->input->post('idcategoria');
        $data = array(
            'nome' => $this->input->post('nome')
        );
        $this->categoria_model->update($idcategoria, $data);
        $this->index();
    }

    public function delete($idcategoria) {     
        $this->load->model('categoria_model'); 
        $this->categoria_model->delete($idcategoria);
        $this->index();
    }       
    
    public function create() {                 
        $this->load->model('categoria_model'); 
        $data = array(
            'nome' => $this->input->post('nome')
        );
        $this->categoria_model->create($data);
        $this->index();
    }
}
