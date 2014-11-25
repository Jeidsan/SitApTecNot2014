<?php

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('usuarios_model');
    }

    public function index() {
        $this->load->view('home-header');
        $this->load->view('login_view');
        $this->load->view('home-footer');
    }

    public function sair() {
        $this->session->sess_destroy();
        $this->session->set_userdata('logado', FALSE);
        redirect(base_url());
    }

    public function autentica() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span>', '</span>');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required');
        $this->form_validation->set_rules('senha', 'Senha', 'trim|required');

        if ($this->form_validation->run() !== false) {
            $this->login($this->input->post('email'), $this->input->post('senha'));
        }
    }

    public function login($email, $senha) {
        $usuario = $this->usuarios_model->login($email, $senha);       
        if ($usuario == false) {
            $this->index();
        } else {
            $userData = array(
                'nome' => $usuario[0]->nome,
                'email' => $usuario[0]->email,
                'idusuario' => $usuario[0]->idusuario,
                'logado' => TRUE
            );
            $this->session->set_userdata($userData);
            echo '<script>window.history.go(-2); window.reload(true);</script>';
        }
    }

}
