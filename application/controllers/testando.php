<?php

/**
 * Classe teste para o conceito de Controller com CodeIgnater
 *
 * @author Jeidsan A. da C. Pereira
 */
class Testando extends CI_Controller {

    function index() {
        /* carrega a nossa view */
        $this->load->view('testando');
        $this->load->view('testando');
    }

}
