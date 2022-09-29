<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admindepoimentos extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
    
        date_default_timezone_set('America/Sao_Paulo');
        
        $this->load->database();
        $this->load->model('depoimentos');
        
    }
    public function depoimentos(){
        
        $this->load->library("pagination");
        $data['depoimentos'] = $this->depoimentos->getAll();
        
        $filtro = $this->input->post('filtro');
        $filtro = mb_strtoupper($filtro);
        if($this->uri->segment(2) == 'f'){
            $filtro = strtoupper(urldecode($this->uri->segment(3))); 
        }
        
        if($filtro){
            $config = array();
            $config["base_url"] = base_url('42f4c8bb06112b55d9b0e4c2f81203e5/f/' . $filtro . '/');
            $config["total_rows"] = $this->depoimentos->get_countFiltro($filtro);
            $config["per_page"] = 10;
            $config["uri_segment"] = 4;
            
            $this->pagination->initialize($config);
            
            $data['links'] = $this->pagination->create_links();
            
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    
            $data['depoimentos']    = $this->depoimentos->getAllFiltro($filtro, 10, $page);
            $data['filtro']         = $filtro;
        } else {
            $config = array();
            $config["base_url"] = base_url('42f4c8bb06112b55d9b0e4c2f81203e5/n/');
            $config["total_rows"] = $this->depoimentos->get_count();
            $config["per_page"] = 10;
            $config["uri_segment"] = 3;
            
            $this->pagination->initialize($config);
            
            $data['links'] = $this->pagination->create_links();
            
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    
            $data['depoimentos']  = $this->depoimentos->getAllPage(10, $page);
        }
        
        if($this->session->userdata('alert')){
            $data['alert'] = $this->session->userdata('alert');
            $this->session->unset_userdata('alert');
        }
        
        $this->header(2);
        $this->load->view('restrito/depoimentos', $data);
        $this->footer();
    }
    
    public function caddepoimento(){
        $this->header(2);
        
        $this->load->view('restrito/caddepoimento');
        $this->footer();
    }
    
    public function editadepoimento($id){
        
        if($id) {
            $data['depoimento'] = $this->depoimentos->get($id);
        }
        $this->header(2);
        $this->load->view('restrito/editadepoimento', $data);
        $this->footer();
    }
    
    public function depoimento($id){
        
        
        $data['depoimento'] = $this->depoimentos->get($id);
        
        $this->header(2);
        $this->load->view('restrito/verdepoimento', $data);
        $this->footer();
    }
    
    public function insert(){
        
        
        if($this->input->post('ativoimagem') == null || $this->input->post('ativoimagem') == ""){
            $ativoimagem = 0;
        } else {
            $ativoimagem = 1;
        }
        
        $depoimentos = array(
            'depoimento_titulo'         => $this->input->post('nome'),    
            'depoimento_texto'          => $this->input->post('comentario'),
            'depoimento_onindex'        => $this->input->post('onindex'),
            'depoimento_ativoimagem'    => $ativoimagem,
        );
        
        
         $id = $this->depoimentos->insert($depoimentos);
        
        $update = [];
        
            $update['depoimento_anexo'] = '/imagens/depoimentos/' . $id . '-imagem.jpg';
            $this->newUploadImagem($id . '-imagem.jpg', 'depoimento_anexo');
            
        $this->session->set_userdata('alert', 1);
        
        if($update){
            $this->depoimentos->update($id, $update);
        }
        
        redirect(base_url('42f4c8bb06112b55d9b0e4c2f81203e5'));
    }
    
    public function update(){
        
        
        $id = $this->input->post('id');
        
        $depoimento_anexo = $this->input->post('depoimento_anexo');
        
            $depoimento_anexo = '/imagens/depoimentos/' . $id . '-imagem.jpg';
            $this->newUploadImagem($id . '-imagem.jpg', 'depoimento_anexo');
        
        if($this->input->post('ativoimagem') == null || $this->input->post('ativoimagem') == ""){
            $ativoimagem = 0;
        } else {
            $ativoimagem = 1;
        }
        
        $depoimentos = array(
            'depoimento_titulo'         => $this->input->post('nome'),    
            'depoimento_texto'          => $this->input->post('comentario'),
            'depoimento_onindex'        => $this->input->post('onindex'),
            'depoimento_anexo'          => $depoimento_anexo,
            'depoimento_ativoimagem'    => $ativoimagem,
        );
        
        
        $this->depoimentos->update($id, $depoimentos);
        
        $this->session->set_userdata('alert', 2);
        
        redirect(base_url('42f4c8bb06112b55d9b0e4c2f81203e5'));
    }
    
    public function delete(){
        
        
        $id = $this->input->post('id');
        
        $this->depoimentos->delete($id);
        
        $this->session->set_userdata('alert', 3);
        
        redirect(base_url('42f4c8bb06112b55d9b0e4c2f81203e5'));
    }
    
    public function newUploadImagem($name, $file){
        $config['upload_path']          = './imagens/depoimentos/';
        $config['allowed_types']        = '*';
        $config['max_size']             = 2000000;
        $config['overwrite']            = true;
        $config['file_name']            = $name;
        
        $this->load->library('upload', $config);
    
        if ( ! $this->upload->do_upload($file)){
            $error = array('error' => $this->upload->display_errors());
        }

    }
    
}