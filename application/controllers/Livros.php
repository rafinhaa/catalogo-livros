<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Livros extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('logado')){
            $this->session->set_flashdata('erro_login','Atenção! Faça login primeiro.');
            redirect('/login');
        }

        //carregar o helper
        $this->load->helper('funcoes_helper','funcoes');

        //carregar o model livros_model.php
        $this->load->model('livros_model','livros');
        $this->load->helper('form');
		$this->load->library('form_validation');
    }

    public function index()
    {
        $this->listar();
    }
    
    public function listar()
    {
        $data['titulo'] = 'Painel - Catálogo de Livros';
        $data['headerTitulo'] = 'Listagem de Livros';
        //$data['livros'] = $this->livros_model->listarLivros();
        $data['livros'] = $this->livros->listarLivros();
        $this->load->view('layout/topo',$data);
        $this->load->view('livros/view_listar');
        $this->load->view('layout/rodape');
    }

    public function adicionar()
    {
		$data['titulo'] = 'Painel - Catálogo de Livros';
		$data['headerTitulo'] = 'Adicionar Livro';

		$this->form_validation->set_rules('titulo', 'Titulo', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('autor', 'autor', 'required');
		$this->form_validation->set_rules('valor', 'valor', 'required');
		$this->form_validation->set_rules('resumo', 'resumo', 'required');

		if ($this->form_validation->run() == TRUE ) {
			//UPLOAD DA IMAGEM
			$config['upload_path'] = './upload/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '2048';
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);

			/*echo '<pre>';
				print_r($this->input->post());
				echo $this->upload->do_upload('foto_livro');
				echo $this->upload->display_errors();
				exit();*/

			if ( ! $this->upload->do_upload('foto_livro')){
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('msg','<div class="alert alert-danger role alert">Erro ao cadastrar o livro</div>');
				redirect('livros');
			}
			else{
				$data = array('upload_data' => $this->upload->data());
				echo "success";
				/*echo '<pre>';
				print_r($this->input->post());
				print_r($this->upload->data());
				*/
				$inputAdicionar['titulo'] = $this->input->post('titulo');
				$inputAdicionar['autor'] = $this->input->post('autor');
				$inputAdicionar['preco'] = $this->input->post('valor');
				$inputAdicionar['resumo'] = $this->input->post('resumo');
				$inputAdicionar['ativo'] = $this->input->post('ativo');
				$inputAdicionar['img'] = $this->upload->data('file_name');

				$this->livros->cadastrarLivro($inputAdicionar);
				$this->session->set_flashdata('msg','<div class="alert alert-success role alert">Livro cadastrado com Sucesso</div>');
				redirect('livros');
			}
		} else {
			$this->load->view('layout/topo', $data);
			$this->load->view('livros/view_adicionar');
			$this->load->view('layout/rodape');
		}
    }
    public function editar($id=NULL)
    {
		$data['titulo'] = 'Painel - Catálogo de Livros';
		$data['headerTitulo'] = 'Editar Livro';

    	if(!$id){
			$this->session->set_flashdata('msg','<div class="alert alert-danger role alert">Erro voce tem que selecionar um livro</div>');
			redirect('livros','refresh');
		}
    	$query = $this->livros->pegaLivroID($id);
		if(!$query){
			$this->session->set_flashdata('msg','<div class="alert alert-danger role alert">Erro. Livro não encontrado</div>');
			redirect('livros','refresh');
		}
		$this->form_validation->set_rules('titulo', 'Titulo', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('autor', 'autor', 'required');
		$this->form_validation->set_rules('valor', 'valor', 'required');
		$this->form_validation->set_rules('resumo', 'resumo', 'required');
		if ($this->form_validation->run() == TRUE ) {
			/*echo '<pre>';
			 print_r($this->input->post());*/

			$nome_imagem = NULL;
			//UPLOAD DA IMAGEM
			$config['upload_path'] = './upload/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '2048';
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			if ( $this->upload->do_upload('foto_livro')){
				$nome_imagem = $this->upload->data(file_name);
			}

			$inputEditar['titulo'] = $this->input->post('titulo');
			$inputEditar['autor'] = $this->input->post('autor');
			$inputEditar['preco'] = $this->input->post('valor');
			$inputEditar['resumo'] = $this->input->post('resumo');
			$inputEditar['ativo'] = $this->input->post('ativo');

			if($nome_imagem){
				$inputEditar['img'] = $nome_imagem;
			}

			$this->livros->atualizaLivro($inputEditar,array('id' => $this->input->post('id_livro')));
			$this->session->set_flashdata('msg','<div class="alert alert-success role alert">Livro editado com Sucesso</div>');
			redirect('livros');
		} else {
			$data['query'] = $query;
			$this->load->view('layout/topo',$data);
			$this->load->view('livros/view_editar');
			$this->load->view('layout/rodape');
		}


    }
    public function apagar($id=NULL)
    {
		if(!$id){
			$this->session->set_flashdata('msg','<div class="alert alert-danger role alert">Erro voce tem que selecionar um livro</div>');
			redirect('livros','refresh');
		}
		$query = $this->livros->pegaLivroID($id);
		if(!$query){
			$this->session->set_flashdata('msg','<div class="alert alert-danger role alert">Erro. Livro não encontrado</div>');
			redirect('livros','refresh');
		}
		$this->livros->apagarLivro($query->id);
		$this->session->set_flashdata('msg','<div class="alert alert-success role alert">Livro apagado com Sucesso!</div>');
		redirect('livros','refresh');
    }
    public function ativar($id=NULL)
    {
		if(!$id){
			$this->session->set_flashdata('msg','<div class="alert alert-danger role alert">Erro voce tem que selecionar um livro</div>');
			redirect('livros','refresh');
		}
		$query = $this->livros->pegaLivroID($id);
		if(!$query){
			$this->session->set_flashdata('msg','<div class="alert alert-danger role alert">Erro. Livro não encontrado</div>');
			redirect('livros','refresh');
		}
		$this->livros->atualizaLivro(array('ativo' =>1), array('id' => $query->id));
		$this->session->set_flashdata('msg','<div class="alert alert-success role alert">Livro apagado com Sucesso</div>');
		redirect('livros','refresh');
    }
    public function desativar($id=NULL)
    {
		if(!$id){
			$this->session->set_flashdata('msg','<div class="alert alert-danger role alert">Erro voce tem que selecionar um livro</div>');
			redirect('livros','refresh');
		}
		$query = $this->livros->pegaLivroID($id);
		if(!$query){
			$this->session->set_flashdata('msg','<div class="alert alert-danger role alert">Erro. Livro não encontrado</div>');
			redirect('livros','refresh');
		}
		$this->livros->atualizaLivro(array('ativo' =>0), array('id' => $query->id));
		$this->session->set_flashdata('msg','<div class="alert alert-success role alert">Livro desativado com Sucesso</div>');
		redirect('livros','refresh');
    }
}
