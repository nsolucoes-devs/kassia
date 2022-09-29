<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pagmemodel extends CI_Model {

    public function insert($dados){
        $this->db->insert('atest', $dados);
    }
    
    public function atualizapedido($id, $dados){
        $this->db->where('idcompra', $id);
        $a = $this->db->get('historicocompras')->row_array();
        
        $a['formaPagamento'] = $dados['formaPagamento'];
        $a['statusCompra'] = $dados['statusCompra'];
        $a['statusPagamento'] = $dados['statusPagamento'];
        $a['codTransacao'] = $dados['codTransacao'];
        $a['dataAlteracao'] = $dados['dataAlteracao'];
        $a['authorization_code'] = $dados['authorization_code'];
        $a['boleto_url'] = $dados['boleto_url'];
        $a['boleto_barcode'] = $dados['boleto_barcode'];
        $a['boleto_expiration_date'] = $dados['boleto_expiration_date'];
        if(array_key_exists('fingerprint', $dados)){
            $a['fingerprint'] = $dados['fingerprint'];
        }
        $this->db->replace('historicocompras', $a);
        $this->updateHistoricoPedido($id, "Aguardando pagamento.", $dados['statusPagamento'], 2);
    }
    
    public function updatePedido($id, $dados){
        $this->db->where('codTransacao', $id);
        $a = $this->db->get('historicocompras')->row_array();

        if($a['statusCompra'] != $dados['statusCompra']){
        
            $a['codTransacao']              = $dados['codTransacao'];
            $a['fingerprint']               = $dados['fingerprint'];
            $a['statusCompra']              = $dados['statusCompra'];
            $a['statusPagamento']           = $dados['statusPagamento'];
            $a['authorization_code']        = $dados['authorization_code'];
            $a['dataAlteracao']             = $dados['dataAlteracao'];
            $a['boleto_url']                = $dados['boleto_url'];
            $a['boleto_barcode']            = $dados['boleto_barcode'];
            $a['boleto_expiration_date']    = $dados['boleto_expiration_date'];
            
            
            $this->db->replace('historicocompras', $a);
            
            $this->updateHistoricoPedido($a['idcompra'], $dados['historico'], $dados['statusPagamento'], $dados['prioridade']);            

            if($dados['statusCompra'] == 3){
                $this->updatePagamentoPedido($a['idcompra']); 
                if($a['afiliado'] != '' && $a['afiliado'] != null){
                    $return = array(
                        'idcompra' => $a['idcompra'],
                        'afiliado' => $a['afiliado'],
                    );
                    return $return;
                } else {
                    return $a['idcompra']; 
                }                 
            } else {
                return $a['idcompra']; 
            }    

        } else {
            return false;
        }        
    }
    
    public function resendCompra(){
        //SELECT `codTransacao` FROM `historicocompras` WHERE `statusCompra` = 1 AND `statusPagamento` = 16;
        $this->db->select('codTransacao');
        $this->db->where('statusPagamento', 16);
        $this->db->where('statusCompra', 1);        
        $a = $this->db->get('historicocompras')->result_array();
        return $a;
    }
    
    public function verifyCompra($id){
        $this->db->select('codTransacao');
        $this->db->where('idcompra', $id);
        $a = $this->db->get('historicocompras')->row_array();
        return $a;
    }
    
    public function updateHistoricoPedido($id, $historico, $status, $prioridade){
        date_default_timezone_set('America/Sao_Paulo');
        $this->db->where('historico_pedido_id', $id);
        $this->db->where('historico_comentario', $historico);
        $this->db->limit(1);
        $a = $this->db->get('historico_pedido')->row_array();

        $this->db->where('idStatusCompra', $status);
        $content = $this->db->get('statuscompras')->row_array();
        
        if($a == null){
            $dados = array(
                'historico_pedido_id'   => $id,
                'historico_data'        => date('Y-m-d'),
                'historico_hora'        => date('H:i:s'),
                'historico_comentario'  => $historico,
                'historico_status'      => $status,
                'historico_notificar'   => 1,
                'historico_titulo'      => $content['nomeStatusCompra'],
                'historico_realizado'   => 1,
                'historico_prioridade'  => $prioridade,
            );
            $this->db->insert('historico_pedido', $dados);
            $idHistorico = $this->db->insert_id();
            
            $this->insertMensagem($idHistorico, $id);
            
            return;            
        }
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
    }
    
    public function updateCompras(){
        $this->db->select('codTransacao');
        $this->db->where('codTransacao !=', 0);
        $this->db->where('formaPagamento', "Boleto");
        $this->db->or_where('formaPagamento', "cartao");
        $a = $this->db->get('historicocompras')->result_array();
        return $a;
    }
    
    public function giveUp(){
        //SELECT * FROM `historicocompras` WHERE `statusCompra` = 1 AND `dataCompra` < CURRENT_DATE-7 ORDER BY `idcompra` DESC
        $date = strtotime("-7 day");
        $day =  date('Y-m-d', $date);
        
        $date = strtotime("-1 day");
        $day2 =  date('Y-m-d', $date);
        
        $this->db->where('statusCompra', 1);
        $this->db->where('dataCompra <', $day);
        $this->db->order_by('idcompra', 'DESC');
        $a = $this->db->get('historicocompras')->result_array();
        
        $this->db->where('statusCompra', 1);
        $this->db->where('formaPagamento', 'cartao');
        $this->db->where('dataCompra <', $day2);
        $this->db->order_by('idcompra', 'DESC');
        $b = $this->db->get('historicocompras')->result_array();
        
        foreach($a as $abandono){
            
            $abandono['statusCompra'] = 28;
            $abandono['statusPagamento'] = 29; 
            $abandono['dataAlteracao'] = date('Y-m-d H:i:s');

            $this->db->replace('historicocompras', $abandono);
            $this->updateHistoricoPedido($abandono['idcompra'], "Pedido Cancelado devido à não realização do pagamento.", 29, 3);
        }
        
        foreach($b as $abandonocard){
            
            $abandonocard['statusCompra'] = 31;
            $abandonocard['statusPagamento'] = 30; 
            $abandonocard['dataAlteracao'] = date('Y-m-d H:i:s');
            
            $this->db->replace('historicocompras', $abandonocard);
            $this->updateHistoricoPedido($abandonocard['idcompra'], "Pedido Cancelado por restrições no cartão.", 30, 3);    
        }
        
    }
    
    public function abandonaPGM($id){
        $this->db->where('idcompra', $id);
        $a = $this->db->get('historicocompras')->row_array();
        
        $a['formaPagamento'] = 'Cancelado';
        $a['statusCompra'] = 7;
        $a['statusPagamento'] = 18;
        $a['codTransacao'] = 666;
        $a['dataAlteracao'] = date('Y-m-d H:i:s');
        $a['authorization_code'] = 666;
        $a['boleto_url'] = "";
        $a['boleto_barcode'] = "";
        $a['boleto_expiration_date'] = "";
        
        $this->db->replace('historicocompras', $a);
        $this->updateHistoricoPedido($id, "Cancelado pelo Usuário", 18, 2);
    }
    
}