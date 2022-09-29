<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Model {
    
    public function insert($new){
        $this->db->insert('cliente', $new);
        return $this->db->insert_id();
    }
    
    public function update($id, $new){
        $this->db->where('cliente_id', $id);
        $this->db->update('cliente', $new);
    }
    
    public function replace($new){
        $this->db->where('cliente_id', $new['idCliente']);
        $a = $this->db->get('cliente')->row_array();

        $a['cliente_id']            = $new['idCliente'];
        $a['cliente_nome']          = mb_strtoupper($new['nome']);
        $a['cliente_cpf']           = $new['cpf'];
        $a['cliente_nascimento']    = date('Y-m-d', strtotime(str_replace('/', '-', $new['nascimento'])));
        $a['cliente_cep']           = $new['cep'];
        $a['cliente_endereco']      = mb_strtoupper($new['endereco']);
        $a['cliente_numero']        = $new['numero'];
        $a['cliente_cidade']        = mb_strtoupper($new['cidade']);
        $a['cliente_bairro']        = mb_strtoupper($new['bairro']);
        $a['cliente_estado']        = mb_strtoupper($new['estado']);
        $a['cliente_email']         = mb_strtoupper($new['comprimento']);
        $a['cliente_telefone']      = $new['largura'];
        $a['cliente_genero']        = mb_strtoupper($new['altura']);
        $a['cliente_complemento']   = mb_strtoupper($new['complemento']);

        $this->db->replace('cliente', $a);
    }
    
    public function getCEP($cep){
        $this->db->where('cep', $cep);
        $teste = $this->db->get('cep')->row_array();
        
        if($teste != NULL){
            if($teste['cep_cidadeuf'] == "NULL"){
                $teste['cep_cidadeuf'] = "";
            }
             if($teste['cep_bairro'] == "NULL"){
                $teste['cep_bairro'] = "";
            }
             if($teste['cep_rua'] == "NULL"){
                $teste['cep_rua'] = "";
            }
             if($teste['cep_complemento'] == "NULL"){
                $teste['cep_complemento'] = "";
            }
        }
        return $teste;
    }
    
    
    public function get($id){
        $this->db->where('cliente_id', $id);
        $data = $this->db->get('cliente');
        return $data->row_array();
    }
    
    public function getNumero($id){
        $this->db->select('cliente_numero');
        $this->db->where('cliente_id', $id);
        $data = $this->db->get('cliente');
        return $data->row_array();
    }
    
    public function getClienteById($id){
        $this->db->select('cliente_id, cliente_nome, cliente_cpf, cliente_telefone, cliente_email');
        $this->db->where('cliente_id', $id);
        $data = $this->db->get('cliente');
        return $data->row_array();
    }
    
    public function getAll(){
        $data = $this->db->get('cliente');
        return $data->result_array();
    }
    
    public function getCPF($login){
        $this->db->where('cliente_cpf', $login);
        $data = $this->db->get('cliente');
        return $data->row_array();
    }
    
    public function getSenha($senha){
        $this->db->where('cliente_senha', $senha);
        $data = $this->db->get('cliente');
        return $data->row_array();
    }
    
    public function getSenhaLogin($login, $senha){
        $this->db->where('cliente_cpf', $login);
        $this->db->where('cliente_senha', $senha);
        $data = $this->db->get('cliente');
        return $data->row_array();
    }
    
    public function getAllClientes($limit, $start){
        $this->db->select('cliente_id, cliente_nome, cliente_cpf, cliente_cidade, cliente_email, cliente_telefone, cliente_ativo');
        $this->db->order_by('cliente_id', 'desc');
        $this->db->limit($limit, $start);
        $data = $this->db->get('cliente');
        return $data->result_array();
    }
    
    public function get_count() {
        $this->db->select(" COUNT(*) as pages");
        $a = $this->db->get('cliente')->row_array();
        return $a['pages'];
    }
    
    public function getAllClientesFiltro($filter, $limit, $start){
        $this->db->select('cliente_id, cliente_nome, cliente_cpf, cliente_cidade, cliente_email, cliente_telefone, cliente_ativo');
        $this->db->join('status_cliente', 'cliente.cliente_ativo = status_cliente.status_id');
        $this->db->like('cliente_nome', $filter, 'both');
        $this->db->or_like('cliente_cpf', $filter, 'both');
        $this->db->or_like('cliente_cidade', $filter, 'both');
        $this->db->or_like('cliente_email', $filter, 'both');
        $this->db->or_like('cliente_telefone', $filter, 'both');
        $this->db->or_like('cliente_ativo', $filter, 'both');
        $this->db->or_like('status_nome', $filter, 'both');
        $this->db->order_by('cliente_id', 'desc');
        $this->db->limit($limit, $start);
        $data = $this->db->get('cliente');
        return $data->result_array();
    }
    
    public function get_countFiltro($filter) {
        $this->db->select(" COUNT(*) as pages");
        $this->db->like('cliente_nome', $filter, 'both');
        $this->db->or_like('cliente_cpf', $filter, 'both');
        $this->db->or_like('cliente_cidade', $filter, 'both');
        $this->db->or_like('cliente_email', $filter, 'both');
        $this->db->or_like('cliente_telefone', $filter, 'both');
        $this->db->or_like('cliente_ativo', $filter, 'both');
        $a = $this->db->get('cliente')->row_array();
        return $a['pages'];
    }
    
    public function relatorioClientes(){
        return $this->db->get('cliente')->result_array();
    }
    
    public function relatorioClientesFiltros($filtros){
        if($filtros['datainicio']){
            $this->db->where('cliente_datacadastro >=', $filtros['datainicio']);
        }
        if($filtros['datafim']){
            $this->db->where('cliente_datacadastro <=', $filtros['datafim']);
        }
        if($filtros['estado']){
            $this->db->where('cliente_estado', $filtros['estado']);
        }
        return $this->db->get('cliente')->result_array();
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function relatorioClientesDetalhado(){
        $todosclientes = $this->db->get('cliente')->result_array();
        
        $clientes = [];
        $cont_clientes = 0;
        $totalgeral = 0;
        
        foreach($todosclientes as $c){
            $this->db->where('idClient', $c['cliente_id']);
            $historico = $this->db->get('historicocompras')->result_array();
            
            $pedidos_clientes = [];
            $cont_pedido = 0;
            
            foreach($historico as $h){
                $servicos = [];
                $cont_servicos = 0;
                
                $aux_produtos = explode('¬', $h['listServicosId']);
                $aux_quantidade = explode('¬', $h['qtdServicos']);
                $aux_valor = explode('¬', $h['vlrServicos']);
                
                foreach($aux_produtos as $p){
                    $this->db->select('produto_id, produto_nome, produto_codigo, produto_subtitulo');
                    $this->db->where('produto_id', $p);
                    $servico = $this->db->get('produtos')->row_array();
                    
                    $servicos[$cont_servicos] = array(
                        'produto_codigo'    => $servico['produto_codigo'],
                        'produto_nome'      => $servico['produto_nome'],
                        'produto_subtitulo'    => $servico['produto_subtitulo'],
                        'produto_valor'     => $aux_valor[$cont_servicos],
                        'produto_quantidade'=> $aux_quantidade[$cont_servicos],
                        
                    );
                    $cont_servicos++;
                }
                
                $totalgeral = $totalgeral + (($h['valorCompra']) - $h['desconto']);
                
                $this->db->where('idStatusCompra', $h['statusPagamento']);
                $status = $this->db->get('statuscompras')->row_array();
                
                $pedidos_clientes[$cont_pedido] = array(
                    'idpedido'  => $h['idcompra'],    
                    'dataCompra'=> $h['dataCompra'],   
                    'servicos'  => $servicos,
                    'status'    => $status['nomeStatusCompra'],
                    'forma'     => $h['formaPagamento'],
                    'total'     => $h['valorCompra'],
                    'desconto'  => $h['desconto'],
                );
                $cont_pedido++;
            }
            
            $clientes[$cont_clientes] = array(
                'cliente_nome'          => $c['cliente_nome'],
                'cliente_cpf'           => $c['cliente_cpf'],
                'cliente_endereco'      => $c['cliente_endereco'],
                'cliente_numero'        => $c['cliente_numero'],
                'cliente_complemento'   => $c['cliente_complemento'],
                'cliente_bairro'        => $c['cliente_bairro'],
                'cliente_cep'           => $c['cliente_cep'],
                'cliente_cidade'        => $c['cliente_cidade'],
                'cliente_estado'        => $c['cliente_estado'],
                'cliente_email'         => $c['cliente_email'],
                'cliente_telefone'      => $c['cliente_telefone'],
                'cliente_datacadastro'  => $c['cliente_datacadastro'],
                'pedidos'               => $pedidos_clientes,
            );
            $cont_clientes++;
        }
        
        $data['clientes']   = $clientes;
        $data['totalgeral'] = $totalgeral; 
        
        return $data;
    }
    
    
    
    
    
    
    
    public function relatorioClientesDetalhadoFiltros($filtros){
        if($filtros['datainicio']){
            $this->db->where('cliente_datacadastro >=', $filtros['datainicio']);
        }
        if($filtros['datafim']){
            $this->db->where('cliente_datacadastro <=', $filtros['datafim']);
        }
        if($filtros['estado']){
            $this->db->where('cliente_estado', $filtros['estado']);
        }
        if($filtros['cliente']){
            $this->db->where('cliente_id', $filtros['cliente']);
        }
        
        $todosclientes = $this->db->get('cliente')->result_array();
        
        $clientes = [];
        $cont_clientes = 0;
        $totalgeral = 0;
        
        foreach($todosclientes as $c){
            if($filtros['forma_pagamento']){
                $this->db->where('formaPagamento', $filtros['forma_pagamento']);
            }
            if($filtros['status']){
                $this->db->where('statusPagamento', $filtros['status']);    
            }
            $this->db->where('idClient', $c['cliente_id']);
            $historico = $this->db->get('historicocompras')->result_array();
            
            $pedidos_clientes = [];
            $cont_pedido = 0;
            
            foreach($historico as $h){
                $produtos = [];
                $cont_produtos = 0;
                
                $aux_produtos = explode('¬', $h['listServicosId']);
                $aux_quantidade = explode('¬', $h['qtdServicos']);
                $aux_valor = explode('¬', $h['vlrServicos']);
                
                foreach($aux_produtos as $p){
                    $this->db->select('produto_id, produto_nome, produto_codigo');
                    $this->db->where('produto_id', $p);
                    $produto = $this->db->get('produtos')->row_array();
                    
                    $produtos[$cont_produtos] = array(
                        'produto_codigo'    => $produto['produto_codigo'],
                        'produto_nome'      => $produto['produto_nome'],
                       
                        'produto_valor'     => $aux_valor[$cont_produtos],
                        'produto_quantidade'=> $aux_quantidade[$cont_produtos],
                        
                    );
                    $cont_produtos++;
                }
                
                $totalgeral = $totalgeral + ($h['valorCompra']- $h['desconto']);
                
                $this->db->where('idStatusCompra', $h['statusPagamento']);
                $status = $this->db->get('statuscompras')->row_array();
                
                $pedidos_clientes[$cont_pedido] = array(
                    'idpedido'  => $h['idcompra'],    
                    'dataCompra'=> $h['dataCompra'],  
                    'status'    => $status['nomeStatusCompra'],
                    'forma'     => $h['formaPagamento'],
                    'produtos'  => $produtos,
                    'total'     => $h['valorCompra'],
                    'desconto'  => $h['desconto'],
                );
                $cont_pedido++;
            }
            
            $clientes[$cont_clientes] = array(
                'cliente_nome'          => $c['cliente_nome'],
                'cliente_cpf'           => $c['cliente_cpf'],
                'cliente_endereco'      => $c['cliente_endereco'],
                'cliente_numero'        => $c['cliente_numero'],
                'cliente_complemento'   => $c['cliente_complemento'],
                'cliente_cep'           => $c['cliente_cep'],
                'cliente_bairro'        => $c['cliente_bairro'],
                'cliente_cidade'        => $c['cliente_cidade'],
                'cliente_estado'        => $c['cliente_estado'],
                'cliente_email'         => $c['cliente_email'],
                'cliente_telefone'      => $c['cliente_telefone'],
                'cliente_datacadastro'  => $c['cliente_datacadastro'],
                'pedidos'               => $pedidos_clientes,
            );
            $cont_clientes++;
        }
        
        $data['clientes']   = $clientes;
        $data['totalgeral'] = $totalgeral; 
        
        return $data;
    }
    
}