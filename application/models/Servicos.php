<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Servicos extends CI_Model {
    
    public function insert($new){
        $this->db->insert('servicos', $new);
        return $this->db->insert_id();
    }
    
    public function update($id, $new){
        $this->db->where('produto_id', $id);
        $this->db->update('servicos', $new);
    }
    
    public function delete($id){
        $this->db->where('produto_id', $id);
        $this->db->delete('servicos');
    }
    
    public function getAll(){
        return $this->db->get('produtos')->result_array();
    }
    public function getAllSimplificado(){
        $this->db->select('*');
        $this->db->where('produto_habilitado', 1);
        return $this->db->get('produtos')->result_array();
    }
    
    public function getAllAtivos(){
        $this->db->where('produto_habilitado', 1);
        return $this->db->get('produtos')->result_array();
    }

    public function getAllLista(){
        $this->db->select('produto_id, produto_nome, ');
        $this->db->where('produto_habilitado', 1);
        return $this->db->get('produtos')->result_array();
    }
    
    public function getAllDestaques(){
         $this->db->select('*');
        $this->db->where('produto_habilitado', 1);
        $this->db->where('produto_destaque', 1);
        return $this->db->get('produtos')->result_array();
    }
    
    public function getAllDDepartamento($departamento){
        $this->db->where('produto_habilitado', 1);
        $this->db->select('
            produto_id, 
            produto_nome, 
            produto_valor, 
            produto_imagem1,
            produto_resumo,
            produto_qtd_parcela, 
            produto_parcelamento, 
            produto_subtitulo,
            produto_cupomAtivo,
            produto_dataInicial_cupom,
            produto_dataFinal_cupom,
            produto_promocaoPreco,
            produto_promocaoAtivo,
            produto_desconto,
            produto_descontoAtivo,
            produto_dataInicial,
            produto_dataFinal,
            produto_departamento
        ');
        $servicos = $this->db->get('produtos')->result_array();
        
        $cont = 0;
        $query = [];
        
        foreach($servicos as $p) {
            if($p['produto_departamento']) {
                 $aux = explode('¬', $p['produto_departamento']);
                 for($i = 0; $i < count($aux); $i++) {
                     if($departamento == $aux[$i]){
                         $query[$cont] = $p;
                         $cont++;
                     }
                 }
            }
        }
        
        return $query;
    }
    
     public function getRandom(){
        $this->db->where('produto_habilitado', 1);
        $this->db->select('*');$this->db->order_by('rand()');
        $this->db->limit(6);
        $query = $this->db->get('produtos');
        return $query->result_array();
    }
    
    public function get($id){
        $this->db->where('produto_id', $id);
        return $this->db->get('produtos')->row_array();
    }
    
    public function getAtivo($id){
        $this->db->where('produto_habilitado', 1);
        $this->db->where('produto_id', $id);
        return $this->db->get('produtos')->row_array();
    }
    
    public function get_countFiltro($filter) {
        $this->db->select(" COUNT(*) as pages");
        $this->db->join('status s', 'servicos.produto_habilitado = s.status_id');
        $this->db->like('status_nome', $filter, 'both');
        $this->db->or_like('produto_nome', $filter, 'both');
        $this->db->or_like('produto_codigo', $filter, 'both');
        
        $a = $this->db->get('produtos')->row_array();
        return $a['pages'];
    }
    
    public function getAllFiltro($filter, $limit, $start){
        $this->db->join('status s', 'servicos.produto_habilitado = s.status_id');
        // $this->db->like('status_nome', $filter, 'both');
        $this->db->or_like('produto_nome', $filter, 'both');
        
        $this->db->order_by('produto_id', 'desc');
        $this->db->limit($limit, $start);
        $data = $this->db->get('produtos');
        return $data->result_array();
    }
    
    
    
    public function retrieveBusca($termo, $start, $stop){
        $this->db->where('produto_habilitado', 1);
        $busca = explode(" ", $termo);
        $this->db->where('produto_nome LIKE', '%'.$busca[0].'%');    
        for($i=1; $i<count($busca); $i++){
            $this->db->or_where('produto_nome LIKE', '%'.$busca[$i].'%');    
        }
        $this->db->limit($stop, $start);
        $this->db->order_by('produto_id', 'DESC');
        $a = $this->db->get('produtos')->result_array();
        return $a;
    }
    
    public function countBusca($termo){
        $busca = explode(" ", $termo);
        $this->db->select("COUNT('produto_id') as count");
        $this->db->where('produto_nome LIKE', '%'.$busca[0].'%');    
        for($i=1; $i<count($busca); $i++){
            $this->db->or_where('produto_nome LIKE', '%'.$busca[$i].'%');    
        }
        $a = $this->db->get('produtos')->row_array();
        return $a;
    }
    
    public function countDepartamento($termo){
        $busca = explode(" ", $termo);
        $this->db->select("COUNT('produto_id') as count");
        $this->db->where('produto_nome LIKE', '%'.$busca[0].'%');    
        for($i=1; $i<count($busca); $i++){
            $this->db->or_where('produto_nome LIKE', '%'.$busca[$i].'%');    
        }
        $a = $this->db->get('produtos')->row_array();
        return $a;
    }
    
    
    public function getAllCad(){
        $this->db->select("produto_id as id, produto_nome as nome");
        $a = $this->db->get('produtos')->result_array();
        return $a;
    }
    
    public function getServicoAdd($id){
        $this->db->select('produto_id, produto_nome, produto_subtitulo, produto_valor,  produto_qtd_parcela, produto_parcelamento');
        $this->db->where('produto_id', $id);
        $data = $this->db->get('produtos')->row_array();
        
        $data['produto_valor'] = number_format($data['produto_valor'],2,',','.');
        
        return $data;
    }
    
    public function termo($id){
        if($id == 1){
            $this->db->select('termos as dado');    
        }else{
            $this->db->select('politica_entrega as dado');
        }
        $a = $this->db->get('site')->row_array();
        return $a['dado'];
    }
    
    public function servicosHistorico(){
        $this->db->where('historico_ativo', 1);
        return $this->db->get("historicoTipos")->result_array();
        
        

    }
    
    public function servicosComentario($id){
        $this->db->select("historico_comentario as mensagem");
        $this->db->where('historico_id', $id);
        $a =  $this->db->get("historicoTipos")->row_array();
        
        return $a['mensagem'];
    }
    
}