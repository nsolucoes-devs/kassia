<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admindestaques extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
        
        $this->load->database();
        $this->load->model('servicos');
        $this->load->helper('url');
    }
    
    public function destaques(){
        
        
        $destaques  = $this->servicos->getAllDestaques();
        $produtos = $this->servicos->getAllAtivos();
        
        $data['destaques'] = $destaques;
        $data['produtos'] = $produtos;
        
        
        $this->header(2);
        $this->load->view('restrito/destaques', $data);
        $this->footer();
    }
	
	public function excluiDestaque($id){
	    
	    
	   	$servico = array(
            'produto_destaque'  => "0",
        );
        
        /*echo '<pre>';
        print_r($id);
        print_r($servico);
        echo '</pre>';*/
        
        $this->servicos->update($id, $servico);
        
        $this->session->set_userdata('alert', 2);
        
        redirect(base_url('admin/admindestaques/destaques'));
	}
	
	public function updateDestaque(){
	    
	    
	    $id = $this->input->post('destaque_id');
        
	    $servico = array(
            'produto_destaque'  => "1",
        );
        
        
        
        // echo '<pre>';
        
        // print_r($servico);
        // print_r($id);
        
        // echo '</pre>';
        
        
        $this->servicos->update($id, $servico);
        
        $this->session->set_userdata('alert', 2);
        
        redirect(base_url('admin/admindestaques/destaques'));
	}
	
    
    public function logBlock(){
        $this->load->model('Logger');
        $this->load->model('usuarios');
        date_default_timezone_set('America/Sao_Paulo');
        
        $log = array(
            'log_ip'             => $_SERVER['REMOTE_ADDR'],
            'log_user_id'        => $this->session->userdata('user_id'),
            'log_nome'           => $this->session->userdata('nome'),
            'log_data'           => date('Y-m-d'),
            'log_hora'           => date('H:i:s'),
            'log_funcao'         => '391a027a8fef2eba4487a00156901156',  
            'log_tipo'           => 'SENHA',  
        );
        
        
        if($this->session->userdata('user_block')){
            $cont = $this->session->userdata('user_block');
            $this->session->set_userdata('user_block', $cont + 1);
        } else {
            $this->session->set_userdata('user_block', 1);
        }
        
        if($this->session->userdata('user_block') >= 3){
            $user_content = array(
                'ativo' => 0,
            );
            $this->usuarios->atualizarUsuario($user_content, $this->session->userdata('user_id'));
            
            $this->session->unset_userdata('user_block');
            
            redirect(base_url('dc28f82848daefd26e2f0f38094d5818'));
        }
        
        
        $this->logger->logBlock($log);
    }
}