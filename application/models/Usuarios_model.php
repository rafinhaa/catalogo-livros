<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

    public function doInsert($dados=NULL){
        if(is_array($dados)){
            $this->db->insert('usuarios',$dados);
        }
    }

    public function getUsuarioId($id=NULL){
        if($id){
            //return $this->db->where('id',$id)->limit(1)->get('usuarios')->row();
            return $this->db->select('*')->from('usuarios')->where('id',$id)->get()->row();
        }
    }
    public function doUpdate($dados=NULL, $condicao=NULL){
        if(is_array($dados) && $condicao ){
            $this->db->update('usuarios',$dados,$condicao);
        }
    }

    public function getUsuarios(){
        return $this->db->get('usuarios')->result();
    }

    public function doDelete($id=NULL){
        if($id){
            $this->db->delete('usuarios',$id);
            return true;
        }else{
            return false;
        }
    }

}