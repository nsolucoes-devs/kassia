<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comprasmodel extends CI_Model {
    
    public function getPedido($id){
        $this->db->where('idcompra', $id);
        return $this->db->get('historicocompras')->row_array();
    }
    
    public function getStatus($id){
        $this->db->where('idStatusCompra', $id);
        return $this->db->get('statuscompras')->row_array();
    }
    
    public function getStatusServicos(){
        $this->db->where('tipoStatusCompra', 'Servico');
        return $this->db->get('statuscompras')->result_array();
    }
    
    public function updateHistoricoUnico($idHistorico, $idPedido){
        $this->db->where('historico_id', $idHistorico);
        $this->db->update('historico_pedido', array('historico_realizado' => 1, 'historico_data' => date('Y-m-d'), 'historico_hora' => date('H:i')));

        return $this->insertMensagem($idHistorico, $idPedido);
    }
    
    function insertMensagem($idHistorico, $idPedido){
        $this->db->where('historico_id', $idHistorico);
        $historico = $this->db->get('historico_pedido')->row_array();
        
        $this->db->where('chat_pedido_hash', md5($idPedido));
        $chat = $this->db->get('chats')->row_array();
        
        if($chat){
           $mensagem = array(
                'mensagem_chat'     => $chat['chat_id'],
                'mensagem_conteudo' => $historico['historico_comentario'],
                'mensagem_visto'    => 0,
                'mensagem_remetente'=> "Sistema",
                'mensagem_admin'    => 2,
                'mensagem_dataHora' => date('Y-m-d H:i'),  
            );   
            
            $this->db->insert('mensagens', $mensagem); 
        }
        
        return $historico['historico_comentario'];
    }
    
    public function relatorioPedidosAfiliados($id, $data_inicio, $data_fim){
        
        if(!empty($data_inicio)){
            $data_inicio = $data_inicio;
        }else{
            $data_inicio = date('Y-m-d 00:00:00');
        }
        
        if(!empty($data_fim)){
            $data_fim = $data_fim;
        }else{
            $data_fim = date('Y-m-d 23:59:59');
        }
        
        $this->db->where('afiliado_id', $id);
        $a = $this->db->get('afiliadosLogin')->row_array();
        
        
        $this->db->where('statusPagamento', 17);
        $this->db->where('afiliado', $a['afiliado_codigo']);
        $this->db->or_where('afiliado', $a['afiliado_apelido']);
        $this->db->where('dataCompra >=', $data_inicio);
        $this->db->where('dataCompra <=', $data_fim);
        $result = $this->db->get('historicocompras')->result_array();
        
        $i              = 0;
        $total_geral    = 0;
        $pedidos        = [];
        
        foreach($result as $aux){
            $this->db->select('cliente_nome, cliente_cpf');
            $this->db->where('cliente_id', $aux['idClient']);
            $cliente = $this->db->get('cliente')->row_array();
            
            $this->db->where('idStatusCompra', $aux['statusPagamento']);
            $this->db->select('nomeStatusCompra');
            $sts = $this->db->get('statuscompras')->row_array();
            
            $total_geral = $total_geral + ($aux['valorCompra'] + $aux['freteValor'] - $aux['desconto']);
            
            if($cliente){
                $nome_cliente       = $cliente['cliente_nome'];
                $cpf_cliente        = $cliente['cliente_cpf'];
            } else {
                $nome_cliente       = 'Cliente excluído';
                $cpf_cliente        = 'Cliente excluído';
            }
            
            $pedidos[$i] = array(
                'idpedido'      => $aux['idcompra'],
                'cliente'       => $nome_cliente,
                'cpf'           => $cpf_cliente,
                'total'         => $aux['valorCompra'] + $aux['freteValor'] - $aux['desconto'],
                'cadastro'      => $aux['dataCompra'],
                'status'        => $sts['nomeStatusCompra'],
                'forma'         => $aux['formaPagamento'],
                'desconto'      => $aux['desconto'],
            );
            $i++;
        }
        $data['pedidos']        = $pedidos;
        $data['total_geral']    = $total_geral;
        
        return $data;
    }
    
    public function pedidos(){
            
        $result = $this->db->get('historicocompras')->result_array();
        $i=0;
        foreach($result as $aux){
            
            $this->db->where('cliente_id', $aux['idClient']);
            $this->db->select('cliente_nome');
            $nome = $this->db->get('cliente')->row_array();
            
            $this->db->where('idStatusCompra', $aux['statusCompra']);
            $this->db->select('nomeStatusCompra');
            $sts = $this->db->get('statuscompras')->row_array();
            
            $pedidos[$i] = array(
                'idpedido'      => $aux['idcompra'],
                'cliente'       => $nome['cliente_nome'],
                'total'         => $aux['valorCompra'],
                'cadastro'      => $aux['dataCompra'],
                'modificacao'   => $aux['dataAlteracao'],
                'status'        => $sts['nomeStatusCompra'],
                'forma'         => $aux['formaPagamento'],
                'desconto'      => $aux['desconto'],
                'boletoCDBar'   => $aux['boleto_barcode'],
                'boletoURL'     => $aux['boleto_url'],
                'vencimento'    => $aux['boleto_expiration_date'],
            );
            $i++;
        }
        
        return $pedidos;
    }
    
    public function insertHistorico($historico){
        $this->db->insert('historico_pedido', $historico);
        
        $a = $this->db->insert_id();
        
        $this->db->where('historico_id', $a);
        $b = $this->db->get('historico_pedido')->row_array();        
    }
    
    public function updatePedido($id, $pedido){
        $this->db->where('idcompra', $id);
        $a = $this->db->get('historicocompras')->row_array();

        if(isset($pedido['listServicosId'])){
            $a['listServicosId']    = $pedido['listServicosId'];
            $a['qtdServicos']       = $pedido['qtdServicos'];
            $a['vlrServicos']       = $pedido['vlrServicos'];
            $a['valorCompra']       = $pedido['valorCompra'];
        }
        $a['statusCompra'] = $pedido['statusCompra'];
        $test = $this->db->replace('historicocompras', $a);
    }

    
    
    public function updateFrete($id, $pedido){
        $this->db->where('idcompra', $id);
        $a = $this->db->get('historicocompras')->row_array();
        
        $a['freteValor'] = $pedido['freteValor'];
        $this->db->replace('historicocompras', $a);
    }
    
    public function deleteHistorico($id){
        $this->db->where('historico_id', $id);
        $this->db->delete('historico_pedido');
    }
    
    public function relatorioPedidos(){
            
        $result         = $this->db->get('historicocompras')->result_array();
        $i              = 0;
        $total_geral    = 0;
        $pedidos        = [];
        
        foreach($result as $aux){
            $this->db->select('cliente_nome, cliente_cpf');
            $this->db->where('cliente_id', $aux['idClient']);
            $cliente = $this->db->get('cliente')->row_array();
            
            $this->db->where('idStatusCompra', $aux['statusPagamento']);
            $this->db->select('nomeStatusCompra');
            $sts = $this->db->get('statuscompras')->row_array();
            
            $total_geral = $total_geral + ($aux['valorCompra'] + $aux['freteValor'] - $aux['desconto']);
            
            if($cliente){
                $nome_cliente       = $cliente['cliente_nome'];
                $cpf_cliente        = $cliente['cliente_cpf'];
            } else {
                $nome_cliente       = 'Cliente excluído';
                $cpf_cliente        = 'Cliente excluído';
            }
            
            $pedidos[$i] = array(
                'idpedido'      => $aux['idcompra'],
                'cliente'       => $nome_cliente,
                'cpf'           => $cpf_cliente,
                'total'         => $aux['valorCompra'] + $aux['freteValor'] - $aux['desconto'],
                'cadastro'      => $aux['dataCompra'],
                'status'        => $sts['nomeStatusCompra'],
                'forma'         => $aux['formaPagamento'],
                'desconto'      => $aux['desconto'],
            );
            $i++;
        }
        $data['pedidos']        = $pedidos;
        $data['total_geral']    = $total_geral;
        
        return $data;
    }
    
    
    public function relatorioPedidosFiltros($filtros){
        if($filtros['datainicio']){
            $this->db->where('dataCompra >=', $filtros['datainicio']);
        }
        if($filtros['datafim']){
            $this->db->where('dataCompra <=', $filtros['datafim']);
        }
        if($filtros['forma_pagamento']){
            $this->db->where('formaPagamento', $filtros['forma_pagamento']);
        }
        if($filtros['status']){
            $this->db->where('statusPagamento', $filtros['status']);    
        }
        if($filtros['estado']){
            $this->db->join('cliente', 'cliente.cliente_id = historicocompras.idClient');
            $this->db->where('cliente.cliente_estado', $filtros['estado']);  
        }
        $result         = $this->db->get('historicocompras')->result_array();
        $i              = 0;
        $total_geral    = 0;
        $pedidos        = [];
        
        foreach($result as $aux){
            $this->db->select('cliente_nome, cliente_cpf');
            $this->db->where('cliente_id', $aux['idClient']);
            $cliente = $this->db->get('cliente')->row_array();
            
            $this->db->where('idStatusCompra', $aux['statusPagamento']);
            $this->db->select('nomeStatusCompra');
            $sts = $this->db->get('statuscompras')->row_array();
            
            $total_geral = $total_geral + ($aux['valorCompra'] + $aux['freteValor']  - $aux['desconto']);
            
            if($cliente){
                $nome_cliente       = $cliente['cliente_nome'];
                $cpf_cliente        = $cliente['cliente_cpf'];
            } else {
                $nome_cliente       = 'Cliente excluído';
                $cpf_cliente        = 'Cliente excluído';
            }
            
            $pedidos[$i] = array(
                'idpedido'      => $aux['idcompra'],
                'cliente'       => $nome_cliente,
                'cpf'           => $cpf_cliente,
                'total'         => $aux['valorCompra'] + $aux['freteValor'] - $aux['desconto'],
                'cadastro'      => $aux['dataCompra'],
                'status'        => $sts['nomeStatusCompra'],
                'forma'         => $aux['formaPagamento'],
            );
            $i++;
        }
        
        $data['pedidos']        = $pedidos;
        $data['total_geral']    = $total_geral;
        
        return $data;
    }
    
    public function relatorioPedidosDetalhado($filtros){
        
        if($filtros['cliente']){
            $this->db->where('idClient', $filtros['cliente']);
        }
        if($filtros['produto']){
            $this->db->like('listServicosId', $filtros['produto'], 'both'); 
        }
        if($filtros['datainicio']){
            $this->db->where('dataCompra >=', $filtros['datainicio']);
        }
        if($filtros['datafim']){
            $this->db->where('dataCompra <=', $filtros['datafim']);    
        }
        if($filtros['status']){
            $this->db->where('statusPagamento', $filtros['status']);    
        }
        if($filtros['forma_pagamento']){
            $this->db->where('formaPagamento', $filtros['forma_pagamento']);    
        }
        if($filtros['estado']){
            $this->db->join('cep', 'historicocompras.cepCompra = cep.cep');
            $this->db->like('cep_cidadeuf', '/'.$filtros['estado']);  
        }
        $historico = $this->db->get('historicocompras')->result_array();
        
        $aux_cont = 0;
        $total_geral = 0;
        
        $data['pedidos']        = [];
        $data['total_geral']    = 0.00;
        
        if($historico != null) {
            
            foreach($historico as $aux){
            
                $this->db->select('cliente_nome, cliente_cpf, cliente_email, cliente_telefone');
                $this->db->where('cliente_id', $aux['idClient']);
                $cliente = $this->db->get('cliente')->row_array();
                
                $this->db->where('idStatusCompra', $aux['statusPagamento']);
                $this->db->select('nomeStatusCompra');
                $sts = $this->db->get('statuscompras')->row_array();
                
                if (strpos($aux['listServicosId'], "¬")) {
                    $auxproduto     = explode("¬", $aux['listServicosId']);
                    $auxquantidade  = explode("¬", $aux['qtdServicos']);
                    $auxvalor       = explode("¬", $aux['vlrServicos']);
                } else {
                    $auxproduto[0]      = $aux['listServicosId'];
                    $auxquantidade[0]   = $aux['qtdServicos'];
                    $auxvalor[0]        = $aux['vlrServicos'];
                } 
                
                $totalprodutos = 0;
                for($i = 0; $i < count($auxproduto); $i++) {
                    $this->db->where('produto_id', $auxproduto[$i]);
                    $this->db->select('produto_nome, produto_codigo');
                    $result = $this->db->get('produtos')->row_array();
                    
                    $servicos[$i] = array (
                        'produto_codigo'    => $result['produto_codigo'],
                        'produto_nome'      => $result['produto_nome'],
                        'produto_valor'     => floatval($auxvalor[$i]), 
                        'produto_qtd'       => $auxquantidade[$i], 
                        'total'             => $auxquantidade[$i],
                    );
                    
                    $totalprodutos += $servicos[$i]['produto_valor'];
                }
                
                $total_geral += $aux['valorCompra'] + $aux['freteValor'] - $aux['desconto'];
                
                if($cliente){
                    $nome_cliente       = $cliente['cliente_nome'];
                    $cpf_cliente        = $cliente['cliente_cpf'];
                    $telefone_cliente   = $cliente['cliente_telefone'];
                    $email_cliente      = $cliente['cliente_email'];
                } else {
                    $nome_cliente       = 'Cliente excluído';
                    $cpf_cliente        = 'Cliente excluído';
                    $telefone_cliente   = 'Cliente excluído';
                    $email_cliente      = 'Cliente excluído';
                }
                
                $pedidos[$aux_cont] = array(
                    'datacompra'        => $aux['dataCompra'],
                    'idpedido'          => $aux['idcompra'],
                    'cliente'           => $nome_cliente,
                    'cpf'               => $cpf_cliente,
                    'telefone'          => $telefone_cliente,
                    'email'             => $email_cliente,
                    'total'             => $aux['valorCompra'] + $aux['freteValor'] - $aux['desconto'],
                    'servicos'          => $servicos,
                    'ttlprod'           => $totalprodutos,
                    'cadastro'          => $aux['dataCompra'],
                    'status'            => $sts['nomeStatusCompra'],
                    'forma'             => $aux['formaPagamento'],
                    'total_produto'     => $aux['valorCompra'],
                    'desconto'          => $aux['desconto'],
                );
                $aux_cont++;
            }
            $data['pedidos']        = $pedidos;
            $data['total_geral']    = $total_geral;
            
            return $data;
        } else
            return false;
        
    }
    
    public function relatorioPedidosDetalhadoFiltros($filtros){
        if($filtros['datainicio']){
            $this->db->where('dataCompra >=', $filtros['datainicio']);
        }
        if($filtros['datafim']){
            $this->db->where('dataCompra <=', $filtros['datafim']);
        }
        if($filtros['forma_pagamento']){
            $this->db->where('formaPagamento', $filtros['forma_pagamento']);
        }
        if($filtros['status']){
            $this->db->where('statusPagamento', $filtros['status']);    
        }
        if($filtros['estado']){
            $this->db->join('cep', 'historicocompras.cepCompra = cep.cep');
            $this->db->like('cep_cidadeuf', '/'.$filtros['estado']);  
        }
        $historico = $this->db->get('historicocompras')->result_array();

        $aux_cont       = 0;
        $pedidos        = [];
        $total_geral    = 0;
        
        foreach($historico as $aux){ 

            $auxproduto     = explode('¬', $aux['listServicosId']);
            $auxquantidade  = explode('¬', $aux['qtdServicos']);
            $auxvalor       = explode('¬', $aux['vlrServicos']);
        
            $cont = 0;
            $produtos = [];
            $total = 0;
            
            foreach($auxproduto as $a){
                $boolean_produto = false;
                
                if($filtros['produto']){
                    if($filtros['produto'] == $a){
                        $boolean_produto = true;
                        
                        $this->db->where('produto_id', $a);
                        $servicos = $this->db->get('produtos')->row_array();
                            if($servicos){
                                $servico = array(
                                    'produto_codigo'    => $servicos['produto_codigo'],
                                    'produto_nome'      => $servicos['produto_nome'],
                                    'produto_valor'     => $servicos['produto_valor'],  
                                );
                            }
                        $cont++;
                    }
                } else {
                    $boolean_produto = true;
                    $this->db->where('produto_id', $a);
                    $produto = $this->db->get('produtos')->row_array();
                    if($produto){
                        $produtos[$cont] = array(
                            'produto_nome'          =>  $produto['produto_nome'],   
                            'produto_codigo'        =>  $produto['produto_codigo'],   
                            'produto_modelo'        =>  $produto['produto_modelo'],
                            'produto_peso'          =>  $produto['produto_peso'],
                            'produto_un_peso'       =>  $produto['produto_un_peso'],
                            'produto_valor'         =>  $auxvalor[$cont],
                            'produto_quantidade'    =>  $auxquantidade[$cont],
                        );
                    }
                    $cont++;
                }
            }
            
            if($boolean_produto == true){
                $this->db->select('cliente_nome, cliente_cpf, cliente_telefone, cliente_email');
                $this->db->where('cliente_id', $aux['idClient']);
                $cliente = $this->db->get('cliente')->row_array();
                
                $this->db->where('idStatusCompra', $aux['statusPagamento']);
                $this->db->select('nomeStatusCompra');
                $sts = $this->db->get('statuscompras')->row_array();
                
                $total_geral = $total_geral + ($aux['valorCompra'] + $aux['freteValor'] - $aux['desconto']);
                
                if($cliente){
                    $nome_cliente       = $cliente['cliente_nome'];
                    $cpf_cliente        = $cliente['cliente_cpf'];
                    $telefone_cliente   = $cliente['cliente_telefone'];
                    $email_cliente      = $cliente['cliente_email'];
                } else {
                    $nome_cliente       = 'Cliente excluído';
                    $cpf_cliente        = 'Cliente excluído';
                    $telefone_cliente   = 'Cliente excluído';
                    $email_cliente      = 'Cliente excluído';
                }
                
                $pedidos[$aux_cont] = array(
                    'idpedido'      => $aux['idcompra'],
                    'cliente'       => $nome_cliente,
                    'cpf'           => $cpf_cliente,
                    'telefone'      => $telefone_cliente,
                    'email'         => $email_cliente,
                    'total'         => $aux['valorCompra'] + $aux['freteValor'] - $aux['desconto'],
                    'cadastro'      => $aux['dataCompra'],
                    'status'        => $sts['nomeStatusCompra'],
                    'forma'         => $aux['formaPagamento'],
                    'produtos'      => $produtos,
                    'total_produto' => $aux['valorCompra'],
                    'desconto'      => $aux['desconto'],
                );
                $aux_cont++;
            }
        }
        
        $data['pedidos']        = $pedidos;
        $data['total_geral']    = $total_geral;
        
        return $data;
    }
    
    public function relatorioVendasProdutosDetalhado(){
        $produtos = $this->db->get('produtos')->result_array();
        $historico = $this->db->get('historicocompras')->result_array();
        
        $cont = 0;
        $itens = [];
        
        $g_quantidade         = 0;
        $g_total              = 0;
        $g_total_aprovado     = 0;
        $g_total_negado       = 0;
        $g_total_aguardando   = 0;
        
        foreach($produtos as $p){
            
            $quantidade         = 0;
            $total              = 0;
            $total_aprovado     = 0;
            $total_negado       = 0;
            $total_aguardando   = 0;
            
            foreach($historico as $h){
                $auxprodutos    = explode('¬', $h['listServicosId']);
                $auxquantidade  = explode('¬', $h['qtdServicos']);
                $auxvalor       = explode('¬', $h['vlrServicos']);
                
                $cont2 = 0;
                foreach($auxprodutos as $aux){
                    
                    if($p['produto_id'] == $aux){
                        if($h['statusPagamento'] == 16){
                            $total_aguardando   = $total_aguardando + ($auxvalor[$cont2] * $auxquantidade[$cont2]);
                            $total              = $total + ($auxvalor[$cont2] * $auxquantidade[$cont2]);
                            $quantidade         = $quantidade + $auxquantidade[$cont2];
                            $g_quantidade       = $g_quantidade + $auxquantidade[$cont2];
                            $g_total            = $g_total + ($auxvalor[$cont2] * $auxquantidade[$cont2]);
                            $g_total_aguardando = $g_total_aguardando + ($auxvalor[$cont2] * $auxquantidade[$cont2]);
                        } else if($h['statusPagamento'] == 19){
                            $total_negado       = $total_negado + ($auxvalor[$cont2] * $auxquantidade[$cont2]);
                            $total              = $total + ($auxvalor[$cont2] * $auxquantidade[$cont2]);
                            $quantidade         = $quantidade + $auxquantidade[$cont2];
                            $g_quantidade       = $g_quantidade + $auxquantidade[$cont2];
                            $g_total            = $g_total + ($auxvalor[$cont2] * $auxquantidade[$cont2]);
                            $g_total_negado     = $g_total_negado + ($auxvalor[$cont2] * $auxquantidade[$cont2]);
                        } else if($h['statusPagamento'] == 17){
                            $total_aprovado     = $total_aprovado + ($auxvalor[$cont2] * $auxquantidade[$cont2]);
                            $total              = $total + ($auxvalor[$cont2] * $auxquantidade[$cont2]);
                            $quantidade         = $quantidade + $auxquantidade[$cont2];
                            $g_quantidade       = $g_quantidade + $auxquantidade[$cont2];
                            $g_total            = $g_total + ($auxvalor[$cont2] * $auxquantidade[$cont2]);
                            $g_total_aprovado   = $g_total_aprovado + ($auxvalor[$cont2] * $auxquantidade[$cont2]);
                        }
                    }
                    
                    $cont2++;
                }

            }
            $itens[$cont] = array(
                'nome'              => $p['produto_nome'],
                'quantidade'        => $quantidade,
                'total'             => $total,
                'total_aprovado'    => $total_aprovado,
                'total_negado'      => $total_negado,
                'total_aguardando'  => $total_aguardando,
            );
            $cont++;
        }
        
        $geral = array(
            'itens'                 => $itens,
            'g_quantidade'          => $g_quantidade,
            'g_total'               => $g_total,
            'g_total_aprovado'      => $g_total_aprovado,
            'g_total_negado'        => $g_total_negado,
            'g_total_aguardando'    => $g_total_aguardando,
        );
        
        return $geral;
        
    }
    
    public function relatorioVendasProdutosDetalhadoFiltros($filtros){
        if($filtros['produto']){
            $this->db->where('produto_id', $filtros['produto']);
        }
        $produtos = $this->db->get('produtos')->result_array();
        
        if($filtros['datainicio']){
            $this->db->where('dataCompra >=', $filtros['datainicio']);
        }
        if($filtros['datafim']){
            $this->db->where('dataCompra <=', $filtros['datafim']);
        }
        if($filtros['forma_pagamento']){
            $this->db->where('formaPagamento', $filtros['forma_pagamento']);
        }
        if($filtros['status']){
            $this->db->where('statusPagamento', $filtros['status']);    
        }
        if($filtros['estado']){
            $this->db->join('cep', 'historicocompras.cepCompra = cep.cep');
            $this->db->like('cep_cidadeuf', '/'.$filtros['estado']);    
        }
        $historico = $this->db->get('historicocompras')->result_array();
        
        $cont = 0;
        $itens = [];
        
        $g_quantidade         = 0;
        $g_total              = 0;
        $g_total_aprovado     = 0;
        $g_total_negado       = 0;
        $g_total_aguardando   = 0;
        
        foreach($produtos as $p){
            
            $quantidade         = 0;
            $total              = 0;
            $total_aprovado     = 0;
            $total_negado       = 0;
            $total_aguardando   = 0;
            
            foreach($historico as $h){
                $auxprodutos    = explode('¬', $h['listServicosId']);
                $auxquantidade  = explode('¬', $h['qtdServicos']);
                $auxvalor       = explode('¬', $h['vlrServicos']);
                
                $cont2 = 0;
                foreach($auxprodutos as $aux){
                    
                    if($p['produto_id'] == $aux){
                        if($h['statusPagamento'] == 16){
                            $total_aguardando   = $total_aguardando + ($auxvalor[$cont2] * $auxquantidade[$cont2]);
                            $total              = $total + ($auxvalor[$cont2] * $auxquantidade[$cont2]);
                            $quantidade         = $quantidade + $auxquantidade[$cont2];
                            $g_quantidade       = $g_quantidade + $auxquantidade[$cont2];
                            $g_total            = $g_total + ($auxvalor[$cont2] * $auxquantidade[$cont2]);
                            $g_total_aguardando = $g_total_aguardando + ($auxvalor[$cont2] * $auxquantidade[$cont2]);
                        } else if($h['statusPagamento'] == 19){
                            $total_negado       = $total_negado + ($auxvalor[$cont2] * $auxquantidade[$cont2]);
                            $total              = $total + ($auxvalor[$cont2] * $auxquantidade[$cont2]);
                            $quantidade         = $quantidade + $auxquantidade[$cont2];
                            $g_quantidade       = $g_quantidade + $auxquantidade[$cont2];
                            $g_total            = $g_total + ($auxvalor[$cont2] * $auxquantidade[$cont2]);
                            $g_total_negado     = $g_total_negado + ($auxvalor[$cont2] * $auxquantidade[$cont2]);
                        } else if($h['statusPagamento'] == 17){
                            $total_aprovado     = $total_aprovado + ($auxvalor[$cont2] * $auxquantidade[$cont2]);
                            $total              = $total + ($auxvalor[$cont2] * $auxquantidade[$cont2]);
                            $quantidade         = $quantidade + $auxquantidade[$cont2];
                            $g_quantidade       = $g_quantidade + $auxquantidade[$cont2];
                            $g_total            = $g_total + ($auxvalor[$cont2] * $auxquantidade[$cont2]);
                            $g_total_aprovado   = $g_total_aprovado + ($auxvalor[$cont2] * $auxquantidade[$cont2]);
                        }
                    }
                    
                    $cont2++;
                }

            }
            $itens[$cont] = array(
                'nome'              => $p['produto_nome'],
                'quantidade'        => $quantidade,
                'total'             => $total,
                'total_aprovado'    => $total_aprovado,
                'total_negado'      => $total_negado,
                'total_aguardando'  => $total_aguardando,
            );
            $cont++;
        }
        
        $geral = array(
            'itens'                 => $itens,
            'g_quantidade'          => $g_quantidade,
            'g_total'               => $g_total,
            'g_total_aprovado'      => $g_total_aprovado,
            'g_total_negado'        => $g_total_negado,
            'g_total_aguardando'    => $g_total_aguardando,
        );
        
        return $geral;
        
    }
    
    public function indexdias($dias){
        $this->db->select(" COUNT(*) as pages");
        if($dias == 1){
            $this->db->where('cliente_datacadastro', date('Y-m-d'));  
        } else {
            $this->db->where('cliente_datacadastro <=', date('Y-m-d'));  
            $this->db->where('cliente_datacadastro >=', date('Y-m-d', strtotime('-' . $dias . ' days', strtotime(date('Y-m-d')))));
        }
        $clientes = $this->db->get('cliente')->row_array();
        
        
        $g_total_aprovado       = 0;
        $g_total_negado         = 0;
        $g_total_analise        = 0;
        
        if($dias == 1){
            $this->db->where('dataCompra <=', date('Y-m-d') . ' 23:59:00');  
            $this->db->where('dataCompra >=', date('Y-m-d') . ' 00:00:00');  
        } else {
            $this->db->where('dataCompra <=', date('Y-m-d') . ' 23:59:00');  
            $this->db->where('dataCompra >=', date('Y-m-d', strtotime('-' . $dias . ' days', strtotime(date('Y-m-d')))) . ' 00:00:00');
        }
        $historico = $this->db->get('historicocompras')->result_array();
        
        foreach($historico as $h){

            if($h['statusPagamento'] == 19){
                $g_total_negado     = $g_total_negado + ($h['valorCompra'] + $h['freteValor'] - $h['desconto']);
            } else if($h['statusPagamento'] == 17){
                $g_total_aprovado   = $g_total_aprovado +  ($h['valorCompra'] + $h['freteValor'] - $h['desconto']);
            } else if($h['statusPagamento'] == 16){
                $g_total_analise    = $g_total_analise +  ($h['valorCompra'] + $h['freteValor'] - $h['desconto']);
            }

        }

        
        $data = array(
            'clientes'          => $clientes['pages'],
            'total_aprovado'    => $g_total_aprovado,    
            'total_negado'      => $g_total_negado,
            'total_analise'     => $g_total_analise,
        );
        
        return $data;
    }
    
    public function relatorioIndex(){
        $this->db->select(" COUNT(*) as pages");
        $clientes = $this->db->get('cliente')->row_array();
        
        $this->db->order_by('dataCompra', 'desc');
        $this->db->limit(5);
        $historico2 = $this->db->get('historicocompras')->result_array();
        
        $historico = $this->db->get('historicocompras')->result_array();
        
        $g_total_aprovado       = 0;
        $g_total_negado         = 0;
        $g_total_analise        = 0;
        $g_forma_cartao         = 0;
        $g_forma_boleto         = 0;
        $ac = $al = $ap = $am = $ba = $ce = $df = $es = $go = $ma = $mt = $ms = $mg = $pa = $pb = $pr = $pe = $pi = $rj = $rn = $rs = $ro = $rr = $sc = $sp = $se = $to = 0;
        $pedidos    = [];
        $cont1      = 0;
        
        /*RUA NOSSA SENHORA DO ROSÁRIO 
        
        AZURITA
        MATEUS LEME 
        MG
        //AVENIDA PROFESSORA MARIA DA PAZ BARCELOS DE ALMEID
        
        
        JARDIM ELZA AMUÍ I
        UBERABA
        MG
        */
        foreach($historico as $h){
            if($h['formaPagamento'] == 'Mercadopago'){
                $g_forma_cartao++;
            } else if($h['formaPagamento'] == 'Boleto'){
                $g_forma_boleto++;
            }
            
        }
        
        foreach($historico2 as $h){
            $this->db->select('cliente_nome');
            $this->db->where('cliente_id', $h['idClient']);
            $cliente = $this->db->get('cliente')->row_array();
            
            $this->db->where('idStatusCompra', $h['statusPagamento']);
            $this->db->select('nomeStatusCompra');
            $sts = $this->db->get('statuscompras')->row_array();
            
            if($cliente){
                $nome_cliente       = $cliente['cliente_nome'];
            } else {
                $nome_cliente       = 'Cliente excluído';
            }
            
            $pedidos[$cont1] = array(
                'id'        => $h['idcompra'],
                'nome'      => $nome_cliente,
                'data'      => $h['dataCompra'],
                'valor'     => $h['valorCompra'] + $h['freteValor'] - $h['desconto'],
                'status'    => $sts['nomeStatusCompra'],
            );
            $cont1++;
        }
        
        $geral = array(
            'total_cartao'      => $g_forma_cartao,    
            'total_boleto'      => $g_forma_boleto,    
            'pedidos'           => $pedidos,
            'ac'                => $ac,
            'al'                => $al,
            'ap'                => $ap,
            'am'                => $am,
            'ba'                => $ba,
            'ce'                => $ce,
            'df'                => $df,
            'es'                => $es,
            'go'                => $go,
            'ma'                => $ma,
            'mt'                => $mt,
            'ms'                => $ms,
            'mg'                => $mg,
            'pa'                => $pa,
            'pb'                => $pb,
            'pr'                => $pr,
            'pe'                => $pe,
            'pi'                => $pi,
            'rj'                => $rj,
            'rn'                => $rn,
            'rs'                => $rs,
            'ro'                => $ro,
            'rr'                => $rr,
            'sc'                => $sc,
            'sp'                => $sp,
            'se'                => $se,
            'to'                => $to,
        );
            
        return $geral;
        
    }
    
    // Listagem de pedidos no público, na área de usuários logados.
    public function pedidosPublico($id){
        $this->db->where('idClient', $id);
        $this->db->order_by('idCompra', 'desc');
        $historico = $this->db->get('historicocompras')->result_array();
        
        $pedidos    = [];
        $cont1      = 0;
        
        foreach($historico as $h){
            $this->db->where('idStatusCompra', $h['statusCompra']);
            $this->db->select('nomeStatusCompra');
            $stscompra = $this->db->get('statuscompras')->row_array();

            if($stscompra){
                $stscompra = $stscompra['nomeStatusCompra'];
            } else {
                $this->db->where('historico_id', $h['statusCompra']);
                $this->db->select('historico_titulo');
                $stscompra = $this->db->get('historicoTipos')->row_array();

                if($stscompra){
                    $stscompra = $stscompra['historico_titulo'];
                } else {
                    $stscompra = 'Status não encontrado';
                }                
            }            
            
            $pedidos[$cont1] = array(
                'id'        => $h['idcompra'],
                'data'      => $h['dataCompra'],
                'valor'     => $h['valorCompra'] + $h['freteValor']  - $h['desconto'],
                'status'    => $stscompra,
            );
            $cont1++;
        }
            
        return $pedidos;
    }
    
    public function pedido($id){
        $this->db->where('idcompra', $id);
        $aux = $this->db->get('historicocompras')->row_array();

        $this->db->where('cliente_id', $aux['idClient']);
        $cliente = $this->db->get('cliente')->row_array();
        
        $auxservico     = explode('¬', $aux['listServicosId']);
        $auxquantidade  = explode('¬', $aux['qtdServicos']);
        $auxvalor       = explode('¬', $aux['vlrServicos']);
        
        $cont = $total = 0;
        $servicos = [];
        $questoes = "";
        
        foreach($auxservico as $a){
            $this->db->where('produto_id', $a);
            $servico = $this->db->get('produtos')->row_array();
            
            $questoes = $servico['produto_questionario'];
            $uploads  = $servico['produto_upload'];
            if($servico){
                $servicos[$cont] = array(
                    'produto_id'            =>  $servico['produto_id'], 
                    'produto_nome'          =>  $servico['produto_nome'],   
                    'produto_subtitulo'     =>  $servico['produto_subtitulo'],
                    'produto_valor'         =>  $auxvalor[$cont],
                    'produto_quantidade'    =>  $auxquantidade[$cont],
                    'produto_imagem'        =>  $servico['produto_imagem1'],
                );
            }
            $cont++;
        }
        

        $this->db->where('idStatusCompra', $aux['statusPagamento']);
        $this->db->select('nomeStatusCompra');
        $stscompra = $this->db->get('statuscompras')->row_array();
        if($stscompra){
            $stscompra = $stscompra['nomeStatusCompra'];
        } else {
            $stscompra = 'Status não encontrado';
        }
        
        
        $this->db->where('historico_pedido_id', $aux['idcompra']);
        $this->db->order_by("historico_id", "DESC");
        //$this->db->where("historico_prioridade !=", 3);
        $historico = $this->db->get('historico_pedido')->result_array();
        
        $historicos = [];
        $cont_historico = 0;
        
        foreach($historico as $h){
            if($h['historico_notificar'] == 1){
                $notificar = 'Sim';
            } else {
                $notificar = 'Não';
            }
            
            $this->db->where('idStatusCompra', $h['historico_status']);
            $status = $this->db->get('statuscompras')->row_array();
            
            $historicos[$cont_historico] = array(
                'historico_data'        => $h['historico_data'], 
                'historico_hora'        => $h['historico_hora'],
                'historico_comentario'  => $h['historico_comentario'],
                'historico_id'          => $h['historico_id'],
                'historico_notificar'   => $notificar,
                'historico_status'      => $status['nomeStatusCompra'],
                'historico_titulo'      => $h['historico_titulo'],
                'historico_realizado'   => $h['historico_realizado'],
            );
            $cont_historico++;
        }
        
        $this->db->where('historico_pedido_id', $aux['idcompra']);
        $this->db->order_by("historico_data", "desc");
        $this->db->order_by("historico_hora", "desc");
        $this->db->where("historico_prioridade", 3);
        $historico3 = $this->db->get('historico_pedido')->row_array();
        
        $this->db->where('reembolso_pedido_id', $id);
        $devolucao = $this->db->get('reembolso')->row_array();
        if($devolucao){
            $cont_devolucao     = 0;
            $existe_devolucao   = 1;
            $this->db->where('historico_pedido_id', $id);
            $this->db->order_by("historico_data", "desc");
            $this->db->order_by("historico_hora", "desc");
            $historico_devolucao = $this->db->get('historico_devolucao')->result_array();
            foreach($historico_devolucao as $h){
                $this->db->where('idStatusCompra', $h['historico_status']);
                $status_devolucao = $this->db->get('statuscompras')->row_array();
                
                echo $status_devolucao['nomeStatusCompra'];
                
                $historico_devolucao[$cont_devolucao] = array(
                    'historico_data'            => $h['historico_data'],
                    'historico_hora'            => $h['historico_hora'],
                    'historico_comentario'      => $h['historico_comentario'],
                    'historico_status'          => $status_devolucao['nomeStatusCompra'],
                );
                $cont_devolucao++;
            }
        } else {
            $historico_devolucao    = null;
            $existe_devolucao       = 0;
        }
        
        if($cliente){
            $nome_cliente       = $cliente['cliente_nome'];
            $cpf_cliente        = $cliente['cliente_cpf'];
            $telefone_cliente   = $cliente['cliente_telefone'];
            $email_cliente      = $cliente['cliente_email'];
        } else {
            $nome_cliente       = 'Cliente não encontrado';
            $cpf_cliente        = 'Cliente não encontrado';
            $telefone_cliente   = 'Cliente não encontrado';
            $email_cliente      = 'Cliente não encontrado';
        }
        
        $questao = explode('¬', $questoes);
        $cont = 0;
        foreach(explode('¬', $aux['questionario']) as $q){
            $questionario[$cont] = array(
                'questao'  => $questao[$cont],
                'resposta' => $q,
            );
            $cont++;
        }
        
        
        $upload = explode('¬', $uploads);
        $cont = 0;
        $arquivos = [];
        foreach(explode('¬', $aux['upload']) as $a){
            $arquivos[$cont] = array(
                'questao'  => $upload[$cont],
                'arquivo'  => $a,
            );
            $cont++;
        }
        
        $pedido = array(
            'idpedido'              => $aux['idcompra'],
            'cliente'               => $nome_cliente,
            'cpf'                   => $cpf_cliente,
            'telefone'              => $telefone_cliente,
            'email'                 => $email_cliente,
            'total'                 => $aux['valorCompra'],
            'cadastro'              => $aux['dataCompra'],
            'modificacao'           => $aux['dataAlteracao'],
            'status'                => $stscompra,
            'forma'                 => $aux['formaPagamento'],
            'servicos'              => $servicos,
            'historico'             => $historicos,
            'devolucao'             => $existe_devolucao,
            'historico_devolucao'   => $historico_devolucao,
            'desconto'              => $aux['desconto'],
            'codigoBarras'          => $aux['boleto_barcode'],
            'boleto'                => $aux['boleto_url'],
            'vencimento'            => $aux['boleto_expiration_date'],
            'questionario'          => $questionario,
            'arquivos'              => $arquivos,
            'historicoP3'           => $historico3,
            'frete'                 => $aux['frete'],
            'freteValor'            => $aux['freteValor'],
        );
        
        return $pedido;
    }
    
    public function getAllPedidoByCliente($id){
        $this->db->order_by('idcompra', 'desc');
        $this->db->where('idClient', $id);
        $historico = $this->db->get('historicocompras')->result_array();
        
        $pedido = [];
        $cont2 = 0;
        
        foreach($historico as $aux){
            
            $this->db->where('idStatusCompra', $aux['statusCompra']);
            $this->db->select('nomeStatusCompra');
            $stscompra = $this->db->get('statuscompras')->row_array();

            if($stscompra){
                $stscompra = $stscompra['nomeStatusCompra'];
            } else {
                $this->db->where('historico_id', $aux['statusCompra']);
                $this->db->select('historico_titulo');
                $stscompra = $this->db->get('historicoTipos')->row_array();
                
                if($stscompra){
                    $stscompra = $stscompra['historico_titulo'];
                } else {
                    $stscompra = 'Status não encontrado';
                }                
            }  
            
            $pedido[$cont2] = array(
                'idpedido'      => $aux['idcompra'],
                'total'         => $aux['valorCompra'] + $aux['freteValor'] - $aux['desconto'],
                'data'          => $aux['dataCompra'],
                'status'        => $stscompra,
                'desconto'      => $aux['desconto'],
            );
            
            $cont2++;
        }
        
        return $pedido;
    }
    
    public function getAllPedidos($limit, $start){
        $this->db->order_by('dataCompra', 'desc');
        $this->db->limit($limit, $start);
        $data = $this->db->get('historicocompras')->result_array();
        
        $pedidos = null;
        
        $i=0;
        foreach($data as $aux){
            $this->db->select('cliente_nome');
            $this->db->where('cliente_id', $aux['idClient']);
            $cliente = $this->db->get('cliente')->row_array();
            
            $this->db->where('idStatusCompra', $aux['statusCompra']);
            $this->db->select('nomeStatusCompra');
            $stscompra = $this->db->get('statuscompras')->row_array();

            if($stscompra){
                $stscompra = $stscompra['nomeStatusCompra'];
            } else {
                $this->db->where('historico_id', $aux['statusCompra']);
                $this->db->select('historico_titulo');
                $stscompra = $this->db->get('historicoTipos')->row_array();
                
                if($stscompra){
                    $stscompra = $stscompra['historico_titulo'];
                } else {
                    $stscompra = 'Status não encontrado';
                }                
            }  
            
            if($cliente){
                $nome_cliente       = $cliente['cliente_nome'];
            } else {
                $nome_cliente       = 'Cliente excluído';
            }
            
            $this->db->where('chat_pedido_hash', md5($aux['idcompra']));
            $chat = $this->db->get('chats')->row_array();
            if($chat){
                $this->db->where('mensagem_chat', $chat['chat_id']);
                $this->db->limit(1);
                $this->db->order_by('mensagem_id', 'DESC');
                $mensagem = $this->db->get('mensagens')->row_array();
                if($mensagem){
                    $mensagem = $mensagem['mensagem_conteudo'];    
                } else {
                    $mensagem = "Não encontrada";
                }
            } else {
                $mensagem = "Não encontrada";
            }
            
            
            $pedidos[$i] = array(
                'idpedido'      => $aux['idcompra'],
                'cliente'       => $nome_cliente,
                'total'         => $aux['valorCompra'] + $aux['freteValor'] - $aux['desconto'],
                'cadastro'      => $aux['dataCompra'],
                'status'        => $stscompra,
                'ultimo'        => $mensagem,
            );
            $i++;
        }
        
        return $pedidos;
    }
    
    public function get_count() {
        $this->db->select(" COUNT(*) as pages");
        $a = $this->db->get('historicocompras')->row_array();
        return $a['pages'];
    }
    
    public function getAllPedidosFiltro($filter, $limit, $start){
        $this->db->select('idcompra, idClient, valorCompra, dataCompra, statusPagamento, desconto, statusCompra, freteValor');
        $this->db->join('statuscompras', 'historicocompras.statusPagamento = statuscompras.idStatusCompra');
        $this->db->join('cliente', 'historicocompras.idClient = cliente.cliente_id');
        $this->db->like('idcompra', $filter, 'both');
        $this->db->or_like('idClient', $filter, 'both');
        $this->db->or_like('valorCompra', $filter, 'both');
        $this->db->or_like('dataCompra', $filter, 'both');
        $this->db->or_like('statusPagamento', $filter, 'both');
        $this->db->or_like('cliente_nome', $filter, 'both');
        $this->db->or_like('nomeStatusCompra', $filter, 'both');
        $this->db->order_by('idcompra', 'desc');
        $this->db->limit($limit, $start);
        $data = $this->db->get('historicocompras')->result_array();
        
        $pedidos = null;
        
        $i=0;
        foreach($data as $aux){
            $this->db->select('cliente_nome');
            $this->db->where('cliente_id', $aux['idClient']);
            $cliente = $this->db->get('cliente')->row_array();
            
            $this->db->where('idStatusCompra', $aux['statusCompra']);
            $this->db->select('nomeStatusCompra');
            $sts = $this->db->get('statuscompras')->row_array();

            if($sts){
                $sts = $sts['nomeStatusCompra'];
            } else {
                $this->db->where('historico_id', $aux['statusCompra']);
                $this->db->select('historico_titulo');
                $sts = $this->db->get('historicoTipos')->row_array();
                
                if($sts){
                    $sts = $sts['historico_titulo'];
                } else {
                    $sts = 'Status não encontrado';
                }                
            }  
            
            if($cliente){
                $nome_cliente       = $cliente['cliente_nome'];
            } else {
                $nome_cliente       = 'Cliente excluído';
            }
            
            $this->db->where('chat_pedido_hash', md5($aux['idcompra']));
            $chat = $this->db->get('chats')->row_array();
            if($chat){
                $this->db->where('mensagem_chat', $chat['chat_id']);
                $this->db->limit(1);
                $this->db->order_by('mensagem_id', 'DESC');
                $mensagem = $this->db->get('mensagens')->row_array();
                if($mensagem){
                    $mensagem = $mensagem['mensagem_conteudo'];
                } else {
                    $mensagem = "Não encontrado";
                }
                
            } else {
                $mensagem = "Não encontrado";
            }
                
            $pedidos[$i] = array(
                'idpedido'      => $aux['idcompra'],
                'cliente'       => $nome_cliente,
                'total'         => $aux['valorCompra'] + $aux['freteValor'] - $aux['desconto'],
                'cadastro'      => $aux['dataCompra'],
                'status'        => $sts,
                'ultimo'        => $mensagem,
            );
            $i++;
        }
        
        return $pedidos;
    }
    
    public function get_countFiltro($filter) {
        $this->db->select(" COUNT(*) as pages");
        $this->db->join('statuscompras', 'historicocompras.statusPagamento = statuscompras.idStatusCompra');
        $this->db->join('cliente', 'historicocompras.idClient = cliente.cliente_id');
        $this->db->like('idcompra', $filter, 'both');
        $this->db->or_like('idClient', $filter, 'both');
        $this->db->or_like('valorCompra', $filter, 'both');
        $this->db->or_like('dataCompra', $filter, 'both');
        $this->db->or_like('statusPagamento', $filter, 'both');
        $this->db->or_like('cliente_nome', $filter, 'both');
        $this->db->or_like('nomeStatusCompra', $filter, 'both');
        $a = $this->db->get('historicocompras')->row_array();
        return $a['pages'];
    }
    
    public function getProdutosAll(){
        $this->db->select("produto_id, produto_nome");
        $a = $this->db->get('produtos')->result_array();
        return $a;
    }
    
    public function getProduto($id){
        $this->db->select("produto_valor");
        $this->db->where('produto_id', $id);
        return $this->db->get('produtos')->row_array();
    }
    
    public function retrievePedido($id){
        $this->db->where('idcompra', $id);
        $a = $this->db->get('historicocompras')->row_array();
        return $a;
    }
    
    public function validarEndereco($endereco, $position){
        if(isset($endereco[$position])){
            return $endereco[$position];
        } else {
            return "Não encontrado";
        }
    }
    
    public function cartao(){
        $this->db->where('formaPagamento', 'cartao');
        $a = $this->db->get('historicocompras')->result_array();
        return count($a);
    }
    
    public function boleto(){
        $this->db->where('formaPagamento', 'boleto');
        $a = $this->db->get('historicocompras')->result_array();
        return count($a);
    }
    
    public function outros(){
        $this->db->where('formaPagamento !=', 'cartao');
        $this->db->where('formaPagamento !=', 'boleto');
        $a = $this->db->get('historicocompras')->result_array();
        return count($a);
    }
    
    
}