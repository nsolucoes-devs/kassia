<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Historicomodel extends CI_Model {
    
    public function listar(){
        $a =  $this->db->get('historicoTipos')->result_array();
        
        for($i=0; $i<count($a); $i++){
            $this->db->where('produto_id', $a[$i]['historico_produto_id']);
            $b = $this->db->get('produtos')->row_array();
            
            $a[$i]['historico_produto_id'] = $b['produto_nome'];
        }
        return $a;
        
    }
    
    public function update($dados){
        $this->db->where('historico_id', $dados['historico_id']);
        $a = $this->db->get('historicoTipos')->row_array();
        
        $data= array(
            'historico_id'          => $dados['historico_id'],
            'historico_titulo'      => $dados['historico_titulo'],
            'historico_comentario'  => $dados['historico_comentario'],
            'historico_produto_id'  => $dados['historico_produto_id'],
            'historico_prioridade'  => $dados['historico_prioridade'],
            'historico_ativo'       => $dados['historico_ativo'],
        );
        $this->db->update('historicoTipos', $data);
    }
    
    public function insert($dados){
        $this->db->insert('historicoTipos', $dados);
    }
    
    public function servicos(){
        return $this->db->get('produtos')->result_array();
    }
    
    public function exclui($id){
        $this->db->where('historico_id', $id);
        $this->db->delete('historicoTipos');
    }
}