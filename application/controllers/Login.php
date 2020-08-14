<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('security');
    }

    public function index(){
        $data['titulo'] = 'Login - Catálogo de Livros';

		if($this->session->userdata('logado') == 1){
			$this->session->set_flashdata('msg_login','Bem Vindo!');
			redirect('/livros');
		}

        $this->form_validation->set_rules('email','E-mail','trim|required');
        $this->form_validation->set_rules('senha','E-mail','trim|required');

        if($this->form_validation->run()){
            /*echo '<pre>';
                print_r($this->input->post());
                echo do_hash($this->input->post('senha'));
			*/
                $email = $this->input->post('email');
                $senha = do_hash($this->input->post('senha'));
                $login = $this->login_model->login($email,$senha);

                echo '<pre>';
                print_r($login);


                if($login){

                    //verificar se o usuario está ativo
                    if($login->ativo == 0){
                        $this->session->set_flashdata('erro_login','Usuário desativado!');
                        redirect('login');
                    }

                    $dadosAcesso = [
                        'logado' => TRUE,
                        'nome' => $login->nome,
                        'email' => $login->email
                    ];

                    $this->session->set_userdata($dadosAcesso);
                    //print_r($dadosAcesso);
                    if($this->session->userdata('logado') == 1){
                        $this->session->set_flashdata('msg_login','Bem Vindo!');
                        redirect('/livros');
                    }else{
                        $this->session->set_flashdata('erro_login','Erro ao logar no sistema');
                        redirect('login');
                    }

                }
            $this->session->set_flashdata('erro_login','Erro ao logar no sistema');
                redirect('login');
        }else{
            $this->load->view('login/view_login',$data);
        }
    }

    public function sair(){
        $this->session->sess_destroy();
        redirect('/');
    }
}
