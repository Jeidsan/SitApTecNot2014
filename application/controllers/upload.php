<?php

class Upload extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    function index() {
        //$this->load->view('upload_form', array('error' => ' '));
    }

    function do_upload($filename) {
        var_dump($filename);
        $config['upload_path'] = './assets/images/galeria';                
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $filename;
        $config['max_size'] = '10000';
        $config['max_width'] = '10000';
        $config['max_height'] = '10000';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        
        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());            
            //$this->load->view('upload_form', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            /*var_dump($data);
            exit();*/
            return $data['file_name'];
            //$this->load->view('upload_success', $data);
        }
    }

}
