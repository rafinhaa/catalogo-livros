<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site_model extends CI_Model
{
	public function listaLivros()
	{
		$this->db->where('ativo', 1);
		return $this->db->get('livros')->result();
	}

	public function listaLivrosNome($string)
	{
		$this->db->like('titulo', $string);
		return $this->db->get('livros')->result();
	}
}

/* End of file .php */
