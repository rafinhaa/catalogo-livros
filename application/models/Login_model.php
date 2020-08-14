<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
    public function login($email=NULL,$senha=NULL){
        if($email && $senha ){

            $this->db->where(['email' => $email,'senha' => $senha,]);
            $this->db->limit(1);
            $query = $this->db->get('usuarios');

            //$query = $this->db->select('*')->from('usuarios')->where('email',$email)->get()->row();

            //echo $query;
            //echo $this->db->last_query();
            if($query->num_rows() == 1){
                return $query->row();
            }else{
                $this->session->set_flashdata('erro_login','Erro ao logar no sistema');
                return FALSE;
            }
        }else{
            $this->session->set_flashdata('erro_login','Erro ao logar no sistema');
            return FALSE;
        }
    }
}