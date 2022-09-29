<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminhistoricos extends MY_Controller {
    
    public function listHistoric(){
        $this->load->database();
        $this->load->model("historicomodel");
        
        $data = array(
            'historico' => $this->historicomodel->listar(),
        );
        
        $this->header(4);
        $this->load->view('restrito/historicos', $data);
        $this->footer();
    }
    
    public function editahistorico(){
        $this->load->database();
        $historico_id = $this->input->post('historico_id');
        $historico_titulo = $this->input->post('historico_titulo');
        $historico_comentario = $this->input->post('historico_comentario');

        
        $this->db->set('historico_titulo', $historico_titulo)
        ->set('historico_comentario', $historico_comentario)
        ->where('historico_id', $historico_id)
        ->update('historicoTipos');
        
        header('location: /admin/adminhistoricos/listhistoric');
    }
    
    public function gravaHistoricos(){
        $this->load->database();
        $this->load->model("historicomodel");
        if($_POST['historico_id']){
            $this->historicomodel->update($_POST);
        }else{
            $this->historicomodel->insert($_POST);
        }
        
        redirect(base_url('admin/adminhistoricos/listHistoric'));
        
    }
    
    
    public function excluihistoricos(){
        $this->load->database();
        $this->load->model("historicomodel");
        $this->historicomodel->exclui($_POST['id']);
        
        redirect(base_url('admin/adminhistoricos/listHistoric'));
    }
    
}