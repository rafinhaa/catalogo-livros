<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('site_model','site');
	}

	public function index($string=NULL)
	{
		$data['titulo'] = "Catalago de livros";
		$data['procurar'] = $this->input->post('procurar');

		if(isset($data['procurar']) AND $data['procurar'] != NULL) {
			$data['livros'] = $this->site->listaLivrosNome($data['procurar']);
		}else{
			$data['livros'] = $this->site->listaLivros();
		}
		$this->load->view('web/view_site', $data);
	}
}

/* End of file Controllername.php */
