<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departamentos extends CI_Model {
    
    public function insert($new){
        $this->db->insert('departamentos', $new);
        return $this->db->insert_id();
    }
    
    public function getAll(){
        $data = $this->db->get('departamentos');
        return $data->result_array();
    }
    
    public function getAllCarousel(){
        $this->db->where('departamento_situacao', 1);
        $this->db->where('departamento_onmenu', 1);
        $data = $this->db->get('departamentos');
        return $data->result_array();
    }
    
    public function get($id){
        $this->db->where('departamento_id', $id);
        $data = $this->db->get('departamentos')->row_array();
        
        if(is_array($data)){
            
                $this->db->select('departamento_nome');
                $this->db->where('departamento_id', $data['departamento_principal']);
                $b = $this->db->get('departamentos')->row_array();
                $data['departamento_principal_nome'] = $b['departamento_nome'];
            
        }
        
        return $data;
    }
    
    public function update($id, $new){
        $this->db->where('departamento_id', $id);
        $this->db->update('departamentos', $new);
    }
    
    public function delete($id){
        $this->db->where('departamento_id', $id);
        $this->db->delete('departamentos');
    }
    
    public function getAllDepartamentos($limit, $start){
        $this->db->select('departamento_id, departamento_nome, departamento_situacao, departamento_principal');
        $this->db->order_by('departamento_id', 'desc');
        $this->db->limit($limit, $start);
        $data = $this->db->get('departamentos')->result_array();
        
        if(is_array($data)){
            for($i=0; $i<count($data); $i++){
                $this->db->select('departamento_nome');
                $this->db->where('departamento_id', $data[$i]['departamento_principal']);
                $b = $this->db->get('departamentos')->row_array();
                $data[$i]['departamento_principal_nome'] = $b['departamento_nome'];
            }
        }
        return $data;
    }
    
    public function get_count() {
        $this->db->select(" COUNT(*) as pages");
        $a = $this->db->get('departamentos')->row_array();
        return $a['pages'];
    }
    
    public function getAllDepartamentosFiltro($filter, $limit, $start){
        $this->db->select('departamento_id, departamento_nome, departamento_situacao, departamento_principal');
        $this->db->like('departamento_nome', $filter, 'both');
        $this->db->order_by('departamento_id', 'desc');
        $this->db->limit($limit, $start);
        $data = $this->db->get('departamentos')->result_array();
        if(is_array($data)){
            for($i=0; $i<count($data); $i++){
                $this->db->select('departamento_nome');
                $this->db->where('departamento_id', $data[$i]['departamento_principal']);
                $b = $this->db->get('departamentos')->row_array();
                $data[$i]['departamento_principal_nome'] = $b['departamento_nome'];
            }
        }
        
        return $data;
    }
    
    public function get_countFiltro($filter) {
        $this->db->select(" COUNT(*) as pages");
        $this->db->like('departamento_nome', $filter, 'both');
        $this->db->or_like('departamento_situacao', $filter, 'both');
        $a = $this->db->get('departamentos')->row_array();
        return $a['pages'];
    }
    
    ///////////////////////////////
    // Novos scripts para header //
    ///////////////////////////////
    
    public function menuDepts(){
        
        $this->db->select('departamento_id, departamento_nome');
        $this->db->where('departamento_onmenu', 1);
        $this->db->where('departamento_situacao', 1);
        $this->db->where('departamento_principal', 0);
        $aux = $this->db->get('departamentos')->result_array();
        
        $this->db->select('departamento_id, departamento_nome, departamento_principal');
        $this->db->where('departamento_situacao', 1);
        $this->db->where('departamento_principal !=', 0);
        $this->db->order_by('departamento_principal', 'ASC');
        $aux2 = $this->db->get('departamentos')->result_array();
        
        $a = [];
        
        for($i=0; $i<count($aux); $i++){
            $a[$i] = array(
		        'departamento'      => $aux[$i]['departamento_nome'],
		        'departamento_id'   => $aux[$i]['departamento_id'],
		        );
		    $pos = 0;      
            for($j=0; $j<count($aux2); $j++){
                if($aux[$i]['departamento_id'] == $aux2[$j]['departamento_principal']){
                    $a[$i]['subs'][$pos] = array(
                        'nome'  => $aux2[$j]['departamento_nome'],
                        'id'    => $aux2[$j]['departamento_id'],
                    );
                    $pos++;
                }
            }
        }
        return $a;
    }
    
    ///////////////////////////////
    // Novos scripts para menu //
    ///////////////////////////////
    
    public function menuDepartamento(){
        
        $this->db->select('departamento_id, departamento_nome');
        $this->db->where('departamento_situacao', 1);
        $this->db->where('departamento_principal', 0);
        $aux = $this->db->get('departamentos')->result_array();
        
        $this->db->select('departamento_id, departamento_nome, departamento_principal');
        $this->db->where('departamento_situacao', 1);
        $this->db->where('departamento_principal !=', 0);
        $this->db->order_by('departamento_principal', 'ASC');
        $aux2 = $this->db->get('departamentos')->result_array();
        
        $a = [];
        
        for($i=0; $i<count($aux); $i++){
            $a[$i] = array(
		        'departamento'      => $aux[$i]['departamento_nome'],
		        'departamento_id'   => $aux[$i]['departamento_id'],
		        );
		    $pos = 0;      
            for($j=0; $j<count($aux2); $j++){
                if($aux[$i]['departamento_id'] == $aux2[$j]['departamento_principal']){
                    $a[$i]['subs'][$pos] = array(
                        'nome'  => $aux2[$j]['departamento_nome'],
                        'id'    => $aux2[$j]['departamento_id'],
                    );
                    $pos++;
                }
            }
        }
        return $a;
    }
    
    
}