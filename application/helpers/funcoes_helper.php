<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function formataDataBr($data=NULL){
    if($data){
        $data_funcao = explode('-',$data);
        return $data_funcao[2] . '/' . $data_funcao[1] . '/' . $data_funcao[0];
    }
}

function formataMoeda($valor=NULL){
    if($valor){
        return 'R$' . number_format($valor,2,',','.');
    }
}