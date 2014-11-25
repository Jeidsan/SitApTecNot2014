<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Noticia extends CI_Controller {

    function __construct() {
        parent::__construct();
        //Carrega o model das noticias
        $this->load->model('noticia_model');
        //Define a timezone
        date_default_timezone_set('America/Sao_Paulo');
    }

    function ver($idnoticia) {
        $data['noticias'] = $this->noticia_model->get($idnoticia);
        $this->load->view('home-header');
        $this->load->view('noticia_ver', $data);
        $this->load->view('home-footer');
    }

    function salvar() {
        if ($this->input->post('idnoticia') === '') {
            $this->inserir();
        } else {
            $this->atualizar();
        }
    }

    function pontuar($ponto, $idnoticia) {
        $data = array(
            'idnoticia' => $idnoticia,
            'ponto' => $ponto
        );
        if ($this->noticia_model->pontuar($data) === FALSE) {
            echo "<script>alert('Desculpe, não foi possível computar seu voto!');</script>";
        }
        echo '<script>window.history.back(); window.reload(true);</script>';
    }

    function index() {
        //Lista as noticias
        $data['noticias'] = $this->noticia_model->listar();
        $this->load->view('home-header');
        $this->load->view('home', $data);
        $this->load->view('home-footer');
    }

    function nova() {
        if ($this->session->userdata['logado'] == FALSE) {
            redirect('login');
        } else {
            $data['noticias'] = NULL;
            //Falta a categoria
            $this->load->view('home-header');
            $this->load->view('noticia_edit', $data);
            $this->load->view('home-footer');
        }
    }

    function valida() {
        //Define a validação dos campos
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span>', '</span>');
        $this->form_validation->set_rules('titulo', 'Título', 'trim|required|max_length[40]');
        $this->form_validation->set_rules('texto', 'Texto', 'trim|required');

        return $this->form_validation->run();
    }

    function inserir() {

        if ($this->valida() === FALSE) {
            //Aqui deve voltar para a edição...            
        } else {
            //obtem os dados            
            $data['titulo'] = $this->input->post('titulo');
            $data['texto'] = $this->input->post('texto');
            $data['dtCriacao'] = date('Y-m-d H:i:s');
            $data['idusuario'] = $this->session->userdata('idusuario');

            $id = $this->noticia_model->inserir($data);
            //Grava usando o Model
            if ($id !== FALSE) {
                redirect("noticia/ver/{$id}");
            } else {
                log_message('error', 'Erro ao gravar a noticia.');
            }
        }
    }

    function editar($idnoticia) {
        //Busca os dados da noticia
        $data['noticias'] = $this->noticia_model->get($idnoticia);

        if ($this->session->userdata['logado'] == FALSE) {
            redirect('login');
        } elseif ($this->session->userdata['idusuario'] != $data['noticias'][0]->idusuario) {
            echo '<script>window.history.back(); alert(\'Apenas o autor pode editar esta notícia.\')</script>';
        } else {
            //Carrega apágina de edição
            $this->load->view('home-header');
            $this->load->view('noticia_edit', $data);
            $this->load->view('home-footer');
        }
    }

    function atualizar() {
        //Se for inválida...
        if ($this->valida() === FALSE) {
            //retorna ao formulário de edição
            $this->editar($this->input->post('idnoticia'));
        } else {
            //obtem os dados
            $data['idnoticia'] = $this->input->post('idnoticia');
            $data['titulo'] = $this->input->post('titulo');
            $data['texto'] = $this->input->post('texto');
            $data['dtAtualizacao'] = date('Y-m-d H:i:s');
            $data['idusuario'] = $this->session->userdata('idusuario');

            //Tenta atualizar os dados
            if ($this->noticia_model->atualizar($data)) {
                redirect("noticia/ver/{$data['idnoticia']}");
            } else {
                log_message('error', 'Erro ao atualizar o usuario.');
            }
        }
    }

    function deletar($idnoticia) {
       //Busca os dados da noticia
        $data['noticias'] = $this->noticia_model->get($idnoticia);

        if ($this->session->userdata['logado'] == FALSE) {
            redirect('login');
        } elseif ($this->session->userdata['idusuario'] != $data['noticias'][0]->idusuario) {
            echo '<script>window.history.back(); alert(\'Apenas o autor apagar esta notícia.\')</script>';
        } else {
            $this->noticia_model->deletar($idnoticia);
            redirect('noticia');
            echo '<script>alert(\'Sua noticia foi apagada do servidor.\')</script>';
        }
    }

    /**
     * Converte uma data padrão brasileiro DD/MM/AAAA
     * para o padrão MySQL AAAA-MM-DD 
     * @param date $databrasileira
     * @return date
     */
    private function converterDataParaMySql($databrasileira) {
        $data = explode('/', $databrasileira);
        $data = array_reverse($data);
        $dataMySQL = implode('-', $data);
        return $dataMySQL;
    }

    /**
     * Converte uma data padrão MySQL AAAA-MM-DD
     * para o padrão brasileiro DD/MM/AAAA
     * @param date $dataMySQL
     * @return date
     */
    private function converteDataParaPadraoBrasileiro($dataMySQL) {
        $data = explode('-', $dataMySQL);
        $data = array_reverse($data);
        $dataBrasileira = implode('/', $data);
        return $dataBrasileira;
    }

}
