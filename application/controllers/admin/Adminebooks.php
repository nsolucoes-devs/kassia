<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminebooks extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('ebook');
    }
    
    public function ebooks(){
        
        $this->load->library("pagination");
        
        $filtro = $this->input->post('filtro');
        $filtro = mb_strtoupper($filtro);
        if($this->uri->segment(4) == 'f'){
            $filtro = strtoupper(urldecode($this->uri->segment(5))); 
        }
        
        $uri_segment = 6;
        
        $config = array();

        if($filtro){
            $config["base_url"] = base_url('admin/adminebooks/ebooks/f/' . $filtro . '/');
        } else {
            $config["base_url"] = base_url('admin/adminebooks/ebooks/n/');
            $uri_segment = 5;
        }
        
        $config["total_rows"] = $this->ebook->get_countFiltro($filtro);
        $config["per_page"] = 10;
        
        $config["uri_segment"] = $uri_segment;
        
        $this->pagination->initialize($config);
        
        $data['links'] = $this->pagination->create_links();
        
        $page = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;

        $data['ebooks']  = $this->ebook->getAllFiltro($filtro, 10, $page);
        $data['filtro']    = $filtro;

        if($this->session->userdata('alert')){
            $data['alert'] = $this->session->userdata('alert');
            $this->session->unset_userdata('alert');
        }
        
        $this->header(3);
        $this->load->view('restrito/ebooks', $data);
        $this->footer();
    }
	
	public function cadastrar(){
        
        
        $new = array(
            'ce_nome'         => $this->input->post('nome'),
            'ce_email'        => $this->input->post('email'),
        );
        
        $this->ebook->insert($new);
        
        $this->session->set_userdata('ebook_solicitado', 1);
        
        redirect(base_url());
    }
    
    public function excluirEbook(){
	    
	    
        $this->ebook->delete($this->input->post('id'));    

	    $this->session->set_userdata('alert', 3);
	    
	    redirect(base_url('admin/adminebooks/ebooks'), 'refresh');
	}
    
        
}