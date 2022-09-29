<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Afiliados extends Public_controller {
    
    public function __construct(){
        parent::__construct();
        date_default_timezone_set('America/Sao_Paulo');
        $this->load->database();
	    $this->load->model('configs');
	    $this->load->model('clientes');
	    $this->load->model('produtos');
	    $this->load->model('departamentos');
    }

    public function novoAfiliado(){
        
    }
    
    function limpa($val){
        $helper = array(",", ".", "(", ")", "+", "-", " ", "/", "_");
        return str_replace($helper, "", $val);
	}
}