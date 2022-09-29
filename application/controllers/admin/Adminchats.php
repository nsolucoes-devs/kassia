<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminchats extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
        
        $this->load->database();
        $this->load->model('chatmodel');
        $this->load->model('clientes');
        $this->load->model('comprasmodel');
    }
    
    public function chats(){
        
        $this->load->library("pagination");
        
        $filtro = $this->input->post('filtro');
        $filtro = mb_strtoupper($filtro);
        if($this->uri->segment(4) == 'f'){
            $filtro = strtoupper(urldecode($this->uri->segment(5))); 
        }
        
        if($filtro){
            $config = array();
            $config["base_url"] = base_url('admin/adminchats/chats/f/' . $filtro . '/');
            $config["total_rows"] = $this->comprasmodel->get_countFiltro($filtro);
            $config["per_page"] = 10;
            $config["uri_segment"] = 6;
            
            $this->pagination->initialize($config);
            
            $data['links'] = $this->pagination->create_links();
            
            $page = ($this->uri->segment(6)) ? $this->uri->segment(6) : 0;
    
            $data['chats']  = $this->comprasmodel->getAllPedidosFiltro($filtro, 10, $page);
            $data['filtro']  = $filtro;
        } else {
            $config = array();
            $config["base_url"] = base_url('admin/adminchats/chats/n/');
            $config["total_rows"] = $this->comprasmodel->get_count();
            $config["per_page"] = 10;
            $config["uri_segment"] = 5;
            
            $this->pagination->initialize($config);
            
            $data['links'] = $this->pagination->create_links();
            
            $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
    
            $data['chats']  = $this->comprasmodel->getAllPedidos(10, $page);
        }


        $this->header(4);
        $this->load->view('restrito/chats', $data);
        $this->footer();
    }

}