<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admindepartamentos extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
        
        $this->load->database();
        $this->load->model('departamentos');
    }
    
    public function departamentos(){
        
        $this->load->library("pagination");
        $data['departamentos'] = $this->departamentos->getAll();
        
        $filtro = $this->input->post('filtro');
        $filtro = mb_strtoupper($filtro);
        if($this->uri->segment(2) == 'f'){
            $filtro = strtoupper(urldecode($this->uri->segment(3))); 
        }
        
        if($filtro){
            $config = array();
            $config["base_url"] = base_url('48b6bbfcf12b55d9b0e4c2ded7384bff/f/' . $filtro . '/');
            $config["total_rows"] = $this->departamentos->get_countFiltro($filtro);
            $config["per_page"] = 10;
            $config["uri_segment"] = 4;
            
            $this->pagination->initialize($config);
            
            $data['links'] = $this->pagination->create_links();
            
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    
            $data['departamentos']  = $this->departamentos->getAllDepartamentosFiltro($filtro, 10, $page);
            $data['filtro']         = $filtro;
        } else {
            $config = array();
            $config["base_url"] = base_url('48b6bbfcf12b55d9b0e4c2ded7384bff/n/');
            $config["total_rows"] = $this->departamentos->get_count();
            $config["per_page"] = 10;
            $config["uri_segment"] = 3;
            
            $this->pagination->initialize($config);
            
            $data['links'] = $this->pagination->create_links();
            
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    
            $data['departamentos']  = $this->departamentos->getAllDepartamentos(10, $page);
        }
        
        if($this->session->userdata('alert')){
            $data['alert'] = $this->session->userdata('alert');
            $this->session->unset_userdata('alert');
        }
        
        $this->header(2);
        $this->load->view('restrito/departamentos', $data);
        $this->footer();
    }
    
    public function caddepartamento(){
        $this->header(2);
        
        $data['departamentos'] = $this->departamentos->getAll();
        
        $this->load->view('restrito/caddepartamento', $data);
        $this->footer();
    }
    
    public function editadepartamento(){
        
        
        $id = $this->uri->segment(2);
        
        $data['departamento'] = $this->departamentos->get($id);
        $data['departamentos'] = $this->departamentos->getAll();
        
    
        $this->header(2);
        $this->load->view('restrito/editadepartamento', $data);
        $this->footer();
    }
    
    public function departamento(){
        
        
        $id = $this->uri->segment(2);
        
        $data['departamento'] = $this->departamentos->get($id);
        $data['departamentos'] = $this->departamentos->getAll();
        
        $this->header(2);
        $this->load->view('restrito/verdepartamento', $data);
        $this->footer();
    }
    
    public function insert(){
        
        // print_r($_POST);
        
        if($this->input->post('onmenu') == null || $this->input->post('onmenu') == ""){
            $onmenu = 0;
        } else {
            $onmenu = 1;
        }
        
        $departamento = array(
            'departamento_nome'         => $this->input->post('nome'),    
            'departamento_descricao'    => $this->input->post('descricao'),
            'departamento_metatitulo'   => $this->input->post('metatitulo'),
            'departamento_metadescricao'=> $this->input->post('metadescricao'),
            'departamento_metapalavra'  => $this->input->post('metapalavra'),
            'departamento_principal'    => $this->input->post('principal'),
            'departamento_situacao'     => $this->input->post('situacao'),
            'departamento_onmenu'       => $onmenu,
        );
        
        
         $id = $this->departamentos->insert($departamento);
        
        $update = [];
        
            $update['departamento_imagem'] = '/imagens/departamentos/' . $id . '-imagem.jpg';
            $this->newUploadImagem($id . '-imagem.jpg', 'departamento_imagem');
            
        $this->session->set_userdata('alert', 1);
        
        if($update){
            $this->departamentos->update($id, $update);
        }
        
        redirect(base_url('48b6bbfcf12b55d9b0e4c2ded7384bff'));
    }
    
    public function update(){
        
        
        $id = $this->input->post('id');
        
        $departamento_imagem = $this->input->post('departamento_imagem');
        
            $departamento_imagem = '/imagens/departamentos/' . $id . '-imagem.jpg';
            $this->newUploadImagem($id . '-imagem.jpg', 'departamento_imagem');
        
        //echo $this->input->post('onmenu');
        
        if($this->input->post('onmenu') == null || $this->input->post('onmenu') == ""){
            $onmenu = 0;
        } else {
            $onmenu = 1;
        }
        
        if($this->input->post('onheader') == null || $this->input->post('onheader') == ""){
            $onheader = 0;
        } else {
            $onheader = 1;
        }
        
        $departamento = array(
            'departamento_nome'             => $this->input->post('nome'),    
            'departamento_descricao'        => $this->input->post('descricao'),
            'departamento_metatitulo'       => $this->input->post('metatitulo'),
            'departamento_metadescricao'    => $this->input->post('metadescricao'),
            'departamento_metapalavra'      => $this->input->post('metapalavra'),
            'departamento_principal'        => $this->input->post('principal'),
            'departamento_situacao'         => $this->input->post('situacao'),
            'departamento_imagem'           => $departamento_imagem,
            'departamento_onmenu'           => $onmenu,
            'departamento_onheader'         => $onheader,
        );
        
        $this->departamentos->update($id, $departamento);
        
        $this->session->set_userdata('alert', 2);
        
        redirect(base_url('48b6bbfcf12b55d9b0e4c2ded7384bff'));
    }
    
    public function delete(){
        
        
        $id = $this->input->post('id');
        
        $this->departamentos->delete($id);
        
        $this->session->set_userdata('alert', 3);
        
        redirect(base_url('48b6bbfcf12b55d9b0e4c2ded7384bff'));
    }
    
      
    public function newUploadImagem($name, $file){
        $config['upload_path']          = './imagens/departamentos/';
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