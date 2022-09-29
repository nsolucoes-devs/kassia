<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Model {
    
    // *********************  Produtos  ********************* 
    
    public function insert($new){
        $this->db->insert('produtos', $new);
        return $this->db->insert_id();
    }
    public function getAllIndex(){
        $this->db->where('produto_quantidade >', 0);
        //$this->db->where('produto_valor >', 0);
        $this->db->order_by('produto_id', 'desc');
        $this->db->limit(8);
        return $this->db->get('produtos')->result_array();
    }
    
    public function update($id, $new){
        $this->db->where('produto_id', $id);
        $this->db->update('produtos', $new);
    }
    
    public function delete($id){
        $this->db->where('produto_id', $id);
        $this->db->delete('produtos');
    }
    
    public function getAll(){
        //return $this->db->get('produtos')->result_array();
    }
    
    public function getAllAtivos(){
        $this->db->where('produto_habilitado', 1);
        return $this->db->get('produtos')->result_array();
    }
    
    public function get($id){
        $this->db->where('produto_id', $id);
        $data = $this->db->get('produtos');
        return $data->row_array();
    }
    
    public function getAtivo($id){
        $this->db->where('produto_habilitado', 1);
        $this->db->where('produto_id', $id);
        $data = $this->db->get('produtos');
        return $data->row_array();
    }
    
    public function get_count() {
        $this->db->select(" COUNT(*) as pages");
        $a = $this->db->get('produtos')->row_array();
        return $a['pages'];
    }
    
    public function getAllProdutos($limit, $start){
        $this->db->select('*');
        $this->db->order_by('produto_id', 'desc');
        $this->db->limit($limit, $start);
        $data = $this->db->get('produtos');
        return $data->result_array();
    }
    
    public function get_countFiltro($filter) {
        $this->db->select(" COUNT(*) as pages");
        $this->db->join('status', 'produtos.produto_habilitado = status.status_id');
        $this->db->like('produto_nome', $filter, 'both');
        $this->db->or_like('produto_modelo', $filter, 'both');
        $this->db->or_like('produto_quantidade', $filter, 'both');
        $this->db->or_like('produto_valor', $filter, 'both');
        $this->db->or_like('produto_habilitado', $filter, 'both');
        $this->db->or_like('status_nome', $filter, 'both');
        $a = $this->db->get('produtos')->row_array();
        return $a['pages'];
    }
    
    public function getAllProdutosFiltro($filter, $limit, $start){
        $this->db->select('produto_id, produto_nome, produto_modelo, produto_quantidade, produto_valor, produto_habilitado');
        $this->db->join('status', 'produtos.produto_habilitado = status.status_id');
        $this->db->like('produto_nome', $filter, 'both');
        $this->db->or_like('produto_modelo', $filter, 'both');
        $this->db->or_like('produto_quantidade', $filter, 'both');
        $this->db->or_like('produto_valor', $filter, 'both');
        $this->db->or_like('produto_habilitado', $filter, 'both');
        $this->db->or_like('status_nome', $filter, 'both');
        $this->db->order_by('produto_id', 'desc');
        $this->db->limit($limit, $start);
        $data = $this->db->get('produtos');
        return $data->result_array();
    }
    
    // *********************  Solicitação  ********************* 
    
    public function insertSolicitacao($new){
        $this->db->insert('solicitacoes', $new);
    }

    
    public function getAllSolicitacoes(){
        $this->db->select('solicitacoes.solitacao_id, solicitacoes.solicitacao_nome, solicitacoes.solicitacao_empresa, solicitacoes.solicitacao_empresa, solicitacoes.solicitacao_cnpj, solicitacoes.solicitacao_status, status_solicitacoes.status_nome, status_solicitacoes.status_id');
        $this->db->join('status_solicitacoes', 'solicitacoes.solicitacao_status = status_solicitacoes.status_id');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function getSolicitacao($id){
        $this->db->where('solicitacao_id', $id);
        $data = $this->db->get('solicitacoes');
        return $data->row_array();
    }
    
    public function updateSolicitacao($id, $new){
        $this->db->where('solicitacao_id', $id);
        $this->db->update('solicitacoes', $new);
    }
    
    public function get_countSolicitacoes() {
        $this->db->select(" COUNT(*) as pages");
        $a = $this->db->get('solicitacoes')->row_array();
        return $a['pages'];
    }
    
    public function getAllSolicitacoesPagination($limit, $start){
        $this->db->select('solicitacao_id, solicitacao_nome, solicitacao_empresa, solicitacao_cnpj, solicitacao_status');
        $this->db->limit($limit, $start);
        $data = $this->db->get('solicitacoes');
        return $data->result_array();
    }
    
    public function get_countSolicitacoesFiltro($filter) {
        $this->db->select(" COUNT(*) as pages");
        $this->db->like('solicitacao_nome', $filter, 'both');
        $this->db->or_like('solicitacao_empresa', $filter, 'both');
        $this->db->or_like('solicitacao_cnpj', $filter, 'both');
        $this->db->or_like('solicitacao_status', $filter, 'both');
        $a = $this->db->get('solicitacoes')->row_array();
        return $a['pages'];
    }
    
    public function getAllSolicitacoesPaginationFiltro($filter, $limit, $start){
        $this->db->select('solicitacao_id, solicitacao_nome, solicitacao_empresa, solicitacao_cnpj, solicitacao_status');
        $this->db->join('status_solicitacoes', 'solicitacoes.solicitacao_status = status_solicitacoes.status_id');
        $this->db->like('solicitacao_nome', $filter, 'both');
        $this->db->or_like('solicitacao_empresa', $filter, 'both');
        $this->db->or_like('solicitacao_cnpj', $filter, 'both');
        $this->db->or_like('solicitacao_status', $filter, 'both');
        $this->db->or_like('status_nome', $filter, 'both');
        $this->db->order_by('solicitacao_id', 'desc');
        $this->db->limit($limit, $start);
        $data = $this->db->get('solicitacoes');
        return $data->result_array();
    }
    
    
    // *********************   ANDAMENTOS  ********************* 
    //  ------- GETS ------- 
    public function getAndamento($id){
        $this->db->where('andamento_id', $id);
        $data = $this->db->get('andamentos');
        return $data->row_array();
    }   
    
    public function getAllAndamento($id){
        $this->db->where('andamento_solicitacao_id', $id);
        $data = $this->db->get('andamentos');
        return $data->result_array();
    }
    
    // ------- INSERTS ------- 
    public function insertAndamento($new){
        $this->db->insert('andamentos', $new);
    }
    
    // ------- UPDATES ------- 
    public function updateAndamento($id, $new){
        $this->db->where('andamento_id', $id);
        $this->db->update('andamentos', $new);
    }
    
    //  ------- DELETE ------- 
    public function deleteAndamento($id){
        $this->db->where('andamento_id', $id);
        $this->db->delete('andamentos');
    }
    
    //*************  Consultas  *******************
    public function getProdutoAdd($id){
        $this->db->select('produto_id, produto_nome, produto_modelo, produto_valor');
        $this->db->where('produto_id', $id);
        $data = $this->db->get('produtos')->row_array();
        
        $data['produto_valor'] = number_format($data['produto_valor'],2,',','.');
        
        return $data;
    }
    
}