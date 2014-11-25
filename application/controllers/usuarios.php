<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('usuarios_model');
        //Definir o timezone - Fuso Horário
        date_default_timezone_set('America/Sao_Paulo');
    }

    function index() {

        if ($this->session->userdata['logado'] == FALSE) {
            redirect(base_url());
        } else {
            $this->listar();
        }
    }

    function listar() {
        //Busca os usuários
        $data['usuarios'] = $this->usuarios_model->listar();

        //Carrega as views
        $this->load->view('home-header');
        $this->load->view('usuarios_lista', $data);
        $this->load->view('home-footer');
    }

    public function info() {
        phpinfo();
        exit();
    }

    function valida() {
        //Validação
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span>', '</span>');
        $this->form_validation->set_rules('nome', 'Nome', 'required|max_length[40]');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email|max_length[100]');

        return $this->form_validation->run();
    }

    function salvar() {
        if ($this->input->post('idusuario') == FALSE) {
            $this->inserir();
        } else {
            $this->atualizar();
        }
    }

    function ver($idusuario) {
        if ($this->session->userdata['logado'] == FALSE) {
            redirect('login');
        } else {
            //Busca os dados do usuário e converte data para o formato brasileiro
            $data['usuarios'] = $this->usuarios_model->get($idusuario);
            $data['usuarios'][0]->dtNascimento = $this->converteDataParaPadraoBrasileiro($data['usuarios'][0]->dtNascimento);
            $data['usuarios'][0]->dtCriacao = $this->converteDataParaPadraoBrasileiro($data['usuarios'][0]->dtCriacao);
            $data['usuarios'][0]->dtAtualizacao = $this->converteDataParaPadraoBrasileiro($data['usuarios'][0]->dtAtualizacao);

            //Abre as views 
            $this->load->view('home-header');
            $this->load->view('usuarios_ver', $data);
            $this->load->view('home-footer');
        }
    }

    function inserir() {
        if ($this->valida() === FALSE) {
            //Aqui deve voltar à edição...           
        } else {
            //Captura os dados
            $data['nome'] = $this->input->post('nome');
            $data['email'] = $this->input->post('email');
            $data['dtnascimento'] = $this->converterDataParaMySql($this->input->post('dtnascimento'));
            $data['foto'] = $this->input->post('foto') ? $this->input->post('foto') : 'usuario.jpg';
            $data['cidade'] = $this->input->post('cidade');
            $data['estado'] = $this->input->post('estado');
            $data['bairro'] = $this->input->post('bairro');
            $data['endereco'] = $this->input->post('endereco');
            $data['cep'] = $this->input->post('cep');
            $data['telefone'] = $this->input->post('telefone');
            $data['celular'] = $this->input->post('celular');
            $data['dtcriacao'] = date('Y-m-d H:i:s');            
            $data['foto'] = $this->input->post('foto') ? md5($data['nome']) : 'usuario.jpg';
            
            if ($this->input->post('senha')) {
                $data['senha'] = $this->input->post('senha');
            }            
            
            $id = $this->usuarios_model->inserir($data);

            //Grava no banco de dados
            if ($id) {
                redirect("usuarios/ver/{$id}");
            } else {
                log_message('error', 'Erro ao inserir o usuario.');
            }
        }
    }
    
    function novo() {
        $data['usuarios'] = NULL;
        //Abre as views
        $this->load->view('home-header');
        $this->load->view('usuarios_edit', $data);
        $this->load->view('home-footer');
    }

    function editar($id) {
        if ($this->session->userdata['logado'] == FALSE) {
            redirect('login');
        } elseif ($this->session->userdata['idusuario'] != $id) {
            echo '<script>window.history.back(); alert(\'Você não pode editar os dados de outro usuário.\')</script>';
        } else {
            //Busca os dados do usuário e converte data para o formato brasileiro
            $data['usuarios'] = $this->usuarios_model->get($id);
            $data['usuarios'][0]->dtNascimento = $this->converteDataParaPadraoBrasileiro($data['usuarios'][0]->dtNascimento);

            //Abre as views
            $this->load->view('home-header');
            $this->load->view('usuarios_edit', $data);
            $this->load->view('home-footer');
        }
    }

    function atualizar() {
        if ($this->valida() === FALSE) {
            //Aqui deve voltar à edição...           
        } else {
            //Captura os dados
            $data['idusuario'] = $this->input->post('idusuario');
            $data['nome'] = $this->input->post('nome');
            $data['email'] = $this->input->post('email');
            $data['dtnascimento'] = $this->converterDataParaMySql($this->input->post('dtnascimento'));
            $data['foto'] = $this->input->post('foto') ? $this->input->post('foto') : 'usuario.jpg';
            $data['cidade'] = $this->input->post('cidade');
            $data['estado'] = $this->input->post('estado');
            $data['bairro'] = $this->input->post('bairro');
            $data['endereco'] = $this->input->post('endereco');
            $data['cep'] = $this->input->post('cep');
            $data['telefone'] = $this->input->post('telefone');
            $data['celular'] = $this->input->post('celular');
            $data['dtcriacao'] = date('Y-m-d H:i:s');

            if ($this->input->post('senha')) {
                $data['senha'] = $this->input->post('senha');
            }

            //Grava no banco de dados
            if ($this->usuarios_model->atualizar($data)) {
                redirect("usuarios/ver/{$data['idusuario']}");
            } else {
                log_message('error', 'Erro ao atualizar os dados do usuario.');
            }
        }
    }

    function deletar($idusuario) {
        //Tenta deletar o usuário e volta para a lista de usuários
        if ($this->usuarios_model->deletar($idusuario)) {
            redirect('login/sair');
        } else {
            log_message('error', 'Erro ao deletar o usuario.');
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
