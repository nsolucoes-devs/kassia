<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admindepartamentos extends MY_Controller {
    
    private function include(){
        $this->load->database();
        $this->load->model('departamentos');
    }
    
    public function departamentos(){
        $this->include();
        $this->load->library("pagination");
        
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
            $config["base_url"] = base_url('48b6bbfcf12b55d9b0e4c2ded7384bff');
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
        $this->load->view('restrito/caddepartamento');
        $this->footer();
    }
    
    public function editadepartamento(){
        $this->include();
        
        $id = $this->uri->segment(2);
        
        $data['departamento'] = $this->departamentos->get($id);
        
        $this->header(2);
        $this->load->view('restrito/editadepartamento', $data);
        $this->footer();
    }
    
    public function departamento(){
        $this->include();
        
        $id = $this->uri->segment(2);
        
        $data['departamento'] = $this->departamentos->get($id);
        
        $this->header(2);
        $this->load->view('restrito/verdepartamento', $data);
        $this->footer();
    }
    
    public function insert(){
        $this->include();
        
        if($this->input->post('onmenu') == null || $this->input->post('onmenu') == 0){
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
        
        
         $id = $this->departamentos->insert($new);
        
        $update = [];
        
        if(!empty($_FILES['imagem1']['name'])){
            $update['departamento_imagem'] = '/imagens/departamentos/' . $id . '-imagem.jpg';
            $this->newUploadImagem($id . '-imagem1.jpg', 'imagem1');
        }
        
        $this->session->set_userdata('alert', 1);
        
        if($update){
            $this->departamentos->update($id, $update);
        }
        
        redirect(base_url('48b6bbfcf12b55d9b0e4c2ded7384bff'));
    }
    
    public function update(){
        $this->include();
        
        $id = $this->input->post('id');
        
        $departamento_imagem = $this->input->post('imagem1_verifica');
        
        if(!empty($_FILES['departamento_imagem']['name'])){
            $departamento_imagem = '/imagens/departamentos/' . $id . '-imagem.jpg';
            $this->newUploadImagem($id . '-imagem.jpg', 'departamento_imagem');
        }
        
        echo $this->input->post('onmenu');
        
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
            'departamento_imagem'       => $departamento_imagem,
            'departamento_onmenu'       => $onmenu,
        );
        
        
        $this->departamentos->update($id, $departamento);
        
        $this->session->set_userdata('alert', 2);
        
        redirect(base_url('48b6bbfcf12b55d9b0e4c2ded7384bff'));
    }
    
    public function delete(){
        $this->include();
        
        $id = $this->input->post('id');
        
        $this->departamentos->delete($id);
        
        $this->session->set_userdata('alert', 3);
        
        redirect(base_url('48b6bbfcf12b55d9b0e4c2ded7384bff'));
    }
    
      
    public function newUploadImagem($name, $file){
        $config = array();
        $config['upload_path']          = './imagens/departamentos/';
        $config['allowed_types']        = '*';
        $config['max_size']             = 2000000;
        $config['overwrite']            = true;
        $config['file_name']            = $name;
        
        $this->load->library('upload');
        
        $this->upload->initialize($config);

        $this->upload->do_upload($file);
    }
}