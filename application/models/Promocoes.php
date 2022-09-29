<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Promocoes extends CI_Model {

    public function insert($new){
        $this->db->insert('promocoes', $new);
    }
    
    public function update($id, $new){
        $this->db->where('promocao_id', $id);
        $this->db->update('promocoes', $new);
    }
    
    public function delete($id){
        $this->db->where('promocao_id', $id);
        $this->db->delete('promocoes');
    }
    
    public function getAllAtivos(){
        $this->db->where('promocao_datainicial  <=', date('Y-m-d'));
        $itens = $this->db->get('promocoes')->result_array();
        
        $promocoes  = [];
        $cont       = 0;
        
        foreach($itens as $i){
            if($i['promocao_datafinal_ativo'] == 1){
                if($i['promocao_datafinal'] >= date('Y-m-d')){
                    $promocoes[$cont] = array(
                        'promocao_preco'            => $i['promocao_preco'],
                        'promocao_preco_ativo'      => $i['promocao_preco_ativo'],
                        'promocao_desconto'         => $i['promocao_desconto'],
                        'promocao_desconto_ativo'   => $i['promocao_desconto_ativo'],
                        'promocao_cupom'            => $i['promocao_cupom'],
                        'promocao_cupom_ativo'      => $i['promocao_cupom_ativo'],
                        'promocao_produtos'         => $i['promocao_produtos'],
                        'promocao_datainicial'      => $i['promocao_datainicial'],
                        'promocao_datafinal'        => $i['promocao_datafinal'],
                        'promocao_datafinal_ativo'  => $i['promocao_datafinal_ativo'],
                    );
                }
            } else {
                $promocoes[$cont] = array(
                    'promocao_preco'            => $i['promocao_preco'],
                    'promocao_preco_ativo'      => $i['promocao_preco_ativo'],
                    'promocao_desconto'         => $i['promocao_desconto'],
                    'promocao_desconto_ativo'   => $i['promocao_desconto_ativo'],
                    'promocao_cupom'            => $i['promocao_cupom'],
                    'promocao_cupom_ativo'      => $i['promocao_cupom_ativo'],
                    'promocao_produtos'         => $i['promocao_produtos'],
                    'promocao_datainicial'      => $i['promocao_datainicial'],
                    'promocao_datafinal'        => $i['promocao_datafinal'],
                    'promocao_datafinal_ativo'  => $i['promocao_datafinal_ativo'],
                );
            }
            $cont++;
        }
        
        return $promocoes;
    }
    
    public function get($id){
        $this->db->where('promocao_id', $id);
        return $this->db->get('promocoes')->row_array();
    }
    
     public function getAllT(){
        return $this->db->get('promocoes')->row_array();
    }
    
    public function get_count() {
        $this->db->select(" COUNT(*) as pages");
        $a = $this->db->get('promocoes')->row_array();
        return $a['pages'];
    }
    
    public function getAll($limit, $start){
        $this->db->select('promocao_id, promocao_titulo, promocao_datainicial, promocao_datafinal, promocao_preco, promocao_desconto');
        $this->db->order_by('promocao_id', 'desc');
        $this->db->limit($limit, $start);
        $data = $this->db->get('promocoes');
        return $data->result_array();
    }
    
    public function get_countFiltro($filter) {
        $this->db->select(" COUNT(*) as pages");
        $this->db->like('promocao_titulo', $filter, 'both');
        $this->db->or_like('promocao_datainicial', $filter, 'both');
        $this->db->or_like('promocao_datafinal', $filter, 'both');
        $this->db->or_like('promocao_preco', $filter, 'both');
        $this->db->or_like('promocao_desconto', $filter, 'both');
        $a = $this->db->get('promocoes')->row_array();
        return $a['pages'];
    }
    
    public function getAllFiltro($filter, $limit, $start){
        $this->db->select('promocao_id, promocao_titulo, promocao_datainicial, promocao_datafinal, promocao_preco, promocao_desconto');
        $this->db->like('promocao_titulo', $filter, 'both');
        $this->db->or_like('promocao_datainicial', $filter, 'both');
        $this->db->or_like('promocao_datafinal', $filter, 'both');
        $this->db->or_like('promocao_preco', $filter, 'both');
        $this->db->or_like('promocao_desconto', $filter, 'both');
        $this->db->order_by('promocao_id', 'desc');
        $this->db->limit($limit, $start);
        $data = $this->db->get('promocoes');
        return $data->result_array();
    }
 
    public function promocao($id){
        $hoje = date('Y-m-d');
        $this->db->where('produto_id', $id)->where('produto_dataInicial <=', $hoje)->where('produto_dataFinal >=', $hoje);
        $z = $this->db->get("produtos")->row_array();
        $ativo = 0;
        
        
        if($z != null || $z != "" || $z != " "){
            
            if($z['produto_promocaoAtivo'] == 1 && $z['produto_promocaoPreco'] != 0.00){
                $z['produto_valor'] = $z['produto_promocaoPreco'];
                $ativo = 1;
            }
            
            if($z['produto_descontoAtivo'] == 1 && $z['produto_desconto'] != 0){
                $z['produto_valor'] = $z['produto_valor'] * (1-($z['produto_desconto']/100));
                $ativo = 2;
            }
            
            if($z['produto_dataInicial'] >= date('Y-m-d') && $z['produto_dataFinal'] <= date('Y-m-d')){
                $z['produto_valor'] = $z['produto_valor'] * (1-($z['produto_desconto']/100));
                $ativo = 3;
            }
            
            $promocoes = array(
                'promocao_preco'            => $z['produto_valor'],
                'promocao_preco_ativo'      => $z['produto_promocaoAtivo'],
                'promocao_desconto'         => $z['produto_desconto'],
                'promocao_desconto_ativo'   => $z['produto_descontoAtivo'],
                'promocao_cupom'            => $z['produto_cupom'],
                'promocao_cupom_ativo'      => $z['produto_cupomAtivo'],
                'promocao_produtos'         => $z['produto_promocaoPreco'],
                'promocao_datainicial'      => $z['produto_dataInicial'],
                'promocao_datafinal'        => $z['produto_dataFinal'],
                'promocao_datafinal_ativo'  => $z['produto_dataFinalAtivo'],
                'ativo'                     => $ativo,
            );
        }else{
            $promocoes = array();
        } 
        return $promocoes;
    }
    
    public function promocao2($servico){
        
        if($servico['produto_promocaoAtivo'] == 1 && $servico['produto_promocaoPreco'] != 0.00){
            $servico['produto_valor'] = $servico['produto_promocaoPreco'];
        }
        
        if($servico['produto_descontoAtivo'] == 1 && $servico['produto_desconto'] != 0){
            $servico['produto_valor'] = $servico['produto_valor'] * (1-($servico['produto_desconto']/100));
        }
        
        if($servico['produto_dataInicial'] >= date('Y-m-d') && $servico['produto_dataFinal'] <= date('Y-m-d')){
            $servico['produto_valor'] = $servico['produto_valor'] * (1-($servico['produto_desconto']/100));
        }
        
        return $servico;
    }
    
    public function resgataCupom($cupom, $carrinho){
        $hoje = date('Y-m-d');
        $this->db->where('produto_cupom', $cupom)->where('produto_dataInicial_cupom <=', $hoje)->where('produto_dataFinal_cupom >=', $hoje);
        $z = $this->db->get("produtos")->row_array();
        $cupom = 0;
        
        $this->db->where('idTemp', $carrinho);
        $y = $this->db->get("cartunico")->row_array();
        
        $a = explode("¬", $y['listServicosId']);
        
        if(in_array($z['produto_id'], $a)){
            $cupom = $z['produto_desconto'];
        }
        
        $desconto = $z['produto_valor'] * ($cupom / 100);
        
        $y['desconto'] = $desconto;
        
        $this->db->where('idTemp', $y['idTemp']);
        $this->db->update('cartunico', $y);
        
        return $desconto;
    }
    
    
}