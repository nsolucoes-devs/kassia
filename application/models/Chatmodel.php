<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chatmodel extends CI_Model {
    
    public function get($id){
        $this->db->where('chat_pedido_hash', $id);
        return $this->db->get('chats')->row_array();
    }
    
    public function getAll(){
        return $this->db->get('chats')->result_array();
    }
    
    public function insert($new){
        $this->db->insert('chats', $new);
        return $this->db->insert_id();
    }
    
    public function update($id, $new){
        $this->db->where('chat_id', $id);
        $this->db->update('chats', $new);
    }
    
    
    
    public function getMensagem($id){
        $this->db->where('mensagem_chat', $id);
        return $this->db->get('mensagens')->result_array();
    }
    
    public function getMensagemVisto($id){
        $this->db->where('mensagem_chat', $id);
        $this->db->where('mensagem_visto', 0);
        return $this->db->get('mensagens')->result_array();
    }
    
    public function getAllMensagem(){
        return $this->db->get('mensagens')->result_array();
    }
    
    public function insertMensagem($new){
        $this->db->insert('mensagens', $new);
        return $this->db->insert_id();
    }
    
    public function updateMensagem($id, $new){
        $this->db->where('mensagem_id', $id);
        $this->db->update('mensagens', $new);
    }
}