<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perguntas extends CI_Model {
    
    public function getAll(){
        $data = $this->db->get('perguntas');
        return $data->result_array();
    }
    
    public function getPergunta(){
        $this->db->where('pergunta_id', 1);
        $data = $this->db->get('perguntas');
        return $data->row_array();
    }
    
    public function updatePergunta($new){
        
        for ($i=0; $i<count($new); $i++){ 
            $this->db->replace('perguntas', $new[$i]);
        }
        
    }
}