<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Controller para a classe usuário
 *
 * @author Jeidsan A da C Pereira
 */
class Usuario extends CI_Controller {

    function index() {
        $this->get();        
    }

    public function get($idusuario = NULL) {
        if ($idusuario != null) {            
            $this->load->model('usuario_model');
            $data['usuario'] = $this->usuario_model->get($idusuario);
            $this->load->view('usuario_view', $data);
        } else {            
            $this->load->model('usuario_model');
            $data['usuarios'] = $this->usuario_model->get();
            $this->load->view('listaUsuario_view', $data);
        }
    }

    public function update() {        
        $this->load->model('usuario_model');
        $idusuario = $this->input->post('idusuario');
        $data = array(
            'nome' => $this->input->post('nome'),
            'telefone' => $this->input->post('telefone'),
            'dataNascimento' => $this->input->post('dataNascimento'),
            'email' => $this->input->post('email')
        );
        $this->usuario_model->update($idusuario, $data);
        $this->index();
    }

    public function delete($idusuario) {    
        $this->load->model('usuario_model');
        $this->usuario_model->delete($idusuario);
    }       
}