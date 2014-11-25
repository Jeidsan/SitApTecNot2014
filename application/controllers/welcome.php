<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        /**
         * Lista todos os registros da tabela pesssoas
         */
        $data['usuarios'] = $this->usuarios_model->listar();
        $data['noticias'] = $this->noticia_model->listar();
        
        $this->load->view('home-header');
        $this->load->view('home', $data);
        $this->load->view('home-footer');
    }

    function __construct() {
        parent::__construct();
        //Carrega os modelos...
        $this->load->model('usuarios_model');
        $this->load->model('noticia_model');
        //Definir o timezone - Fuso Horário
        date_default_timezone_set('America/Sao_Paulo');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */