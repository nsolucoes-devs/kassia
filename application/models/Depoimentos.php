<?php defined('BASEPATH') OR exit('No direct script access allowed');

class depoimentos extends CI_Model {
    
    public function insert($new){
        $this->db->insert('depoimentos', $new);
        return $this->db->insert_id();
    }
    
    public function update($id, $new){
        $this->db->where('depoimento_id', $id);
        $this->db->update('depoimentos', $new);
    }
    
    public function delete($id){
        $this->db->where('depoimento_id', $id);
        $this->db->delete('depoimentos');
    }
    
    public function getAll(){
        return $this->db->get('depoimentos')->result_array();
    }
     public function getAllView(){
        $this->db->where('depoimento_onindex', 1);
        return $this->db->get('depoimentos')->result_array();
    }
    
    public function getAllAtivos(){
        $this->db->where('depoimento_onindex', 1);
        return $this->db->get('depoimentos')->result_array();
    }
    
    public function get($id){
        $this->db->where('depoimento_id', $id);
        return $this->db->get('depoimentos')->row_array();
    }
    
    public function getAtivo($id){
        $this->db->where('depoimento_onindex', 1);
        $this->db->where('depoimento_id', $id);
        return $this->db->get('depoimentos')->row_array();
    }
    
    public function get_countFiltro($filter) {
        $this->db->select(" COUNT(*) as pages");
        $this->db->like('depoimento_titulo', $filter, 'both');
        $a = $this->db->get('depoimentos')->row_array();
        return $a['pages'];
    }
    
    public function getAllPage($limit, $start){
        $this->db->order_by('depoimento_id', 'desc');
        $this->db->limit($limit, $start);
        $data = $this->db->get('depoimentos');
        return $data->result_array();
    }
    
    public function get_count() {
        $this->db->select(" COUNT(*) as pages");
        $a = $this->db->get('depoimentos')->row_array();
        return $a['pages'];
    }
    
    
    public function getAllFiltro($filter, $limit, $start){
        $this->db->like('depoimento_titulo', $filter, 'both');
        $this->db->order_by('depoimento_id', 'desc');
        $this->db->limit($limit, $start);
        $data = $this->db->get('depoimentos');
        return $data->result_array();
    }
    
    
}