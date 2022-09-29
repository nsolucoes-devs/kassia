<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ebook extends CI_Model {
    
    public function insert($new){
        $this->db->insert('clienteEbook', $new);
        return $this->db->insert_id();
    }
    
    public function update($id, $new){
        $this->db->where('ce_id', $id);
        $this->db->update('clienteEbook', $new);
    }
    
    public function delete($id){
        $this->db->where('ce_id', $id);
        $this->db->delete('clienteEbook');
    }
    
    public function getAll(){
        return $this->db->get('clienteEbook')->result_array();
    }
    
    public function get($id){
        $this->db->where('ce_id', $id);
        return $this->db->get('clienteEbook')->row_array();
    }
    
    public function get_countFiltro($filter) {
        $this->db->select(" COUNT(*) as pages");
        $this->db->like('ce_nome', $filter, 'both');
        $this->db->or_like('ce_email', $filter, 'both');
        
        $a = $this->db->get('clienteEbook')->row_array();
        return $a['pages'];
    }
    
    public function getAllFiltro($filter, $limit, $start){
        $this->db->or_like('ce_nome', $filter, 'both');
        $this->db->or_like('ce_email', $filter, 'both');
        
        $this->db->order_by('ce_id', 'desc');
        $this->db->limit($limit, $start);
        $data = $this->db->get('clienteEbook');
        return $data->result_array();
    }
    
    
}