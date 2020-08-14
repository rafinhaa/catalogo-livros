<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
		if(!$this->session->userdata('logado')){
			$this->session->set_flashdata('erro_login','Atenção! Faça login primeiro.');
			redirect('/login');
		}

        $this->load->model('usuarios_model');
        $this->load->helper('security');
        $this->load->library('form_validation');
    }

    public function index(){
        $data['titulo'] = 'Painel - Usuarios';
        $data['headerTitulo'] = 'Listagem de Usuarios';
        $data['usuarios'] = $this->usuarios_model->getUsuarios();

        $this->load->view('layout/topo',$data);
        $this->load->view('usuarios/view_listar');
        $this->load->view('layout/rodape');
    }
    public function add(){
		$data['titulo'] = 'Painel - Adicionar Usuario';
		$data['headerTitulo'] = 'Adicionar Usuario';

        $this->form_validation->set_rules('nome','Nome','required|min_length[3]');
        $this->form_validation->set_rules('email','Email','required|valid_email',
            array('valid_email'=>'E-mail incorreto!')
        );
        $this->form_validation->set_rules('codigo','Código','numeric',
            array('numeric'=>'Somente números manolo')
        );
        $this->form_validation->set_rules('senha','Senha','trim|required|min_length[2]|max_length[8]',
            array(
                'required'=>'A senha é obrigatorio',
                'min_length'=>'A senha deve ter seis caracteres no mínimo',
                'max_length'=>'A senha não pode ter mais que oito caracteres'
            )
        );

        $this->form_validation->set_rules('senha2','Repita a senha','required|matches[senha]',
            array('matches'=>'As senhas não são iguais!')
        );

        if($this->form_validation->run() == TRUE){
            //echo '<pre>';
            //salva no banco
            $dados['nome'] = $this->input->post('nome');
            $dados['email'] = $this->input->post('email');
            $dados['senha'] = do_hash($this->input->post('senha'));
            $dados['ativo'] = 1;

            $this->usuarios_model->doInsert($dados);

            redirect('usuarios','refresh');

        }else{
            $this->load->view('layout/topo',$data);
            $this->load->view('usuarios/view_adicionar');
            $this->load->view('layout/rodape');
        }
    }
    public function edit($id=NULL){
		$data['titulo'] = 'Painel - Editar Usuario';
		$data['headerTitulo'] = 'Editar Usuario';

        if(!$id){
            $this->session->set_flashdata('msg','Você deve passar um ID');
            redirect('usuarios');
        }

        if(!$this->usuarios_model->getUsuarioId($id)){
            $this->session->set_flashdata('msg','Não encontrei esse usuário');
            redirect('usuarios');
        }

        $data['query']  = $this->usuarios_model->getUsuarioId($id);

        $this->form_validation->set_rules('nome','Nome','required|min_length[3]');
        $this->form_validation->set_rules('email','Email','required|valid_email',
            array('valid_email'=>'E-mail inválido!')
        );
        $this->form_validation->set_rules('codigo','Código','numeric',
            array('numeric'=>'Somente números para o código!')
        );

        if($this->form_validation->run() == TRUE){

            //salva no banco
            $dados['nome'] = $this->input->post('nome');
            $dados['email'] = $this->input->post('email');
            $dados['ativo'] = 1;

            $this->usuarios_model->doUpdate($dados, ['id'=> $this->input->post('id')]);
			$this->session->set_flashdata('msg','<div class="alert alert-success role alert">Sucesso! Usuário alterado.</div>');
            redirect('usuarios','refresh');
        }else {
            $this->load->view('layout/topo', $data);
            $this->load->view('usuarios/view_editar');
            $this->load->view('layout/rodape');
        }
    }
    public function del($id=NULL){
        if(!$id){
            $this->session->set_flashdata('msg','<div class="alert alert-danger role alert">Erro. Você precisa passar um ID!</div>');
            redirect('usuarios');
        }
        //verifica se tem cadastro
        $query = $this->usuarios_model->getUsuarioId($id);

        if(!$query){
            $this->session->set_flashdata('msg','<div class="alert alert-danger role alert">Erro. Não encontrei esse usuário!</div>');
            redirect('usuarios');
        }
        if($query->email == $this->session->userdata('email')){
            $this->session->set_flashdata('msg','<div class="alert alert-danger role alert">Erro. Você não pode se apagar!</div>');
            redirect('usuarios');
        }

        $this->usuarios_model->doDelete(['id' => $id]);
        $this->session->set_flashdata('msg','<div class="alert alert-success role alert">Sucesso! Usuário removido.</div>');
        redirect('usuarios');

    }

    public function ativo($id=NULL){
        if(!$id){
			$this->session->set_flashdata('msg','<div class="alert alert-danger role alert">Erro. Você precisa passar um ID!</div>');
            redirect('usuarios');
        }
        //verifica se tem cadastro
        $query = $this->usuarios_model->getUsuarioId($id);

        if(!$query){
            $this->session->set_flashdata('msg','<div class="alert alert-warning" role="alert">Atenção! Você não pode ser ativar.</div>');
            redirect('usuarios');
        }
        if($query->email == $this->session->userdata('email')){
			$this->session->set_flashdata('msg','<div class="alert alert-warning" role="alert">Atenção! Você não pode ser alterar.</div>');
            redirect('usuarios');
        }
        $dados['ativo'] = 1;
        $this->usuarios_model->doUpdate($dados,['id' => $query->id]);
        $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert">Usuario ativo com sucesso!</div>');
        redirect('usuarios');

    }
    public function inativo($id=NULL){
        if(!$id){
			$this->session->set_flashdata('msg','<div class="alert alert-danger role alert">Erro. Você precisa passar um ID!</div>');
            redirect('usuarios');
        }
        //verifica se tem cadastro
        $query = $this->usuarios_model->getUsuarioId($id);
        if(!$query){
			$this->session->set_flashdata('msg','<div class="alert alert-warning" role="alert">Atencão! Você não pode alterar esse status.</div>');
            redirect('usuarios');
        }
        if($query->email == $this->session->userdata('email')){
			$this->session->set_flashdata('msg','<div class="alert alert-warning" role="alert">Atencão! Você não pode se alterar.</div>');
            redirect('usuarios');
        }
        $dados['ativo'] = 0;
        $this->usuarios_model->doUpdate($dados,['id' => $query->id]);
		$this->session->set_flashdata('msg','<div class="alert alert-success" role="alert">Inativado com sucesso!</div>');
        redirect('usuarios');
    }
}
