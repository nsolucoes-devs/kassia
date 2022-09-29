<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carrinhomodel extends CI_Model {
    
    public function insert($new){
        $this->db->insert('historicocompras', $new);
        return $this->db->insert_id();
    }
    
    public function tempcart($ipaddress){
	    $this->db->where("ipHostRemote", $ipaddress);
        $aux = $this->db->get("tempcart")->row_array();
        if($aux != null || $aux != "" ){
            return $aux;
        }else{
            $this->db->order_by("idTempCart", "asc");
            $this->db->limit(1);
            $aux = $this->db->get("tempcart")->row_array();
            $id = rand(100, 100000);
            $dados = array(
                'idTempCart'        => $id,
                'ipHostRemote'      => $ipaddress,
                'dataHoraCompra'    => date('Y-m-d H:i:s'),
                'listProdutosId'    => "",  
                'qtdProdutos'       => "",  
                'statusCompra'      => "",
            );
            $this->db->insert('tempcart', $dados);
            return $dados;
        }
    }
    
    // #4 Função Gui - Retornar o status de compra, a partir de um id.
    public function getStatus($id){
        $this->db->select('nomeStatusCompra');
        $this->db->where('idStatusCompra', $id);
        $data = $this->db->get('statuscompras');
        return $data->row_array();
    }
    
     public function getFormaPagamento($id){
        $this->db->select('formaPagamento');
        $this->db->where('idcompra', $id);
        $data = $this->db->get('historicocompras');
        return $data->row_array();
    }
    // #4 Final
    
    public function cartshopping($ipaddress){
        $this->db->where("ipHostRemote", $ipaddress);
        $aux = $this->db->get("cartshopping")->row_array();
        if($aux != null || $aux != "" ){
            return $aux;
        }else{
            $this->db->order_by("idTempCart", "asc");
            $this->db->limit(1);
            $aux = $this->db->get("cartshopping")->row_array();
            $id = rand(100, 100000);
            $dados = array(
                'idTempCart'        => $id,
                'ipHostRemote'      => $ipaddress,
                'dataHoraCompra'    => date('Y-m-d H:i:s'),
                'listProdutosId'   => "",  
                'qtdProdutos'       => "",  
                'statusCompra'      => "",
            );
            $this->db->insert('cartshopping', $dados);
            return $dados;
        }
    }
    
    public function updateTempcart($carrinho){
        $this->db->replace('tempcart', $carrinho);
    }
    
    public function updateCartShopping($carrinho){
        $this->db->replace('cartshopping', $carrinho);
    }
    
    public function rescueService($id){
        $this->db->where('produto_id', $id);
        $servico = $this->db->get('produtos')->row_array();
        //$servico = $this->promocao2($servico);
        return $servico;
    }
    
    public function promocao($servico){

        $this->db->select("produto_valor, produto_promocaoPreco, produto_promocaoAtivo, produto_desconto, produto_descontoAtivo, produto_dataInicial, produto_dataFinal, produto_dataFinalAtivo");
        $this->db->where('produto_id', $servico);
        $a = $this->db->get("produtos")->row_array();
        
        $agora  = date('Y-m-d H:i:s');                                            
        $inicio = date('Y-m-d 00:00:00', strtotime($a['produto_dataInicial']));                 

        if($a['produto_descontoAtivo'] == 1){
            if($inicio <= $agora){
                if($a['produto_dataFinal'] != 0000-00-00){
                    $fim    = date('Y-m-d 23:59:59', strtotime($a['produto_dataFinal']));       
                    if($fim >= $agora){
                        $valor = $a['produto_valor'] * (1 - ($a['produto_desconto']/100));
                    }else{
                        $valor = $a['produto_valor'];
                    }
                }else{
                    $valor = $a['produto_valor'] * (1 - ($a['produto_desconto']/100));
                }
            }else{
                $valor = $a['produto_valor'];
            }
        }else{
            $valor = $a['produto_valor'];
        }
        
        if($a['produto_promocaoAtivo'] == 1){
            $valor = $a['produto_promocaoPreco'];
        }
        
        return $valor;
    }
    
    public function desconto($servico){
        $this->db->select("produto_valor, produto_promocaoPreco, produto_promocaoAtivo, produto_desconto, produto_descontoAtivo, produto_dataInicial, produto_dataFinal, produto_dataFinalAtivo");
        $this->db->where('produto_id', $servico);
        $a = $this->db->get("produtos")->row_array();
        
        $agora  = date('Y-m-d H:i:s');                                            //2022-01-02 10:14:26
        $inicio = date('Y-m-d 00:00:00', strtotime($a['produto_dataInicial']));   //2021-12-26 00:00:00
        
        if($a['produto_descontoAtivo'] == 1){
            if($inicio <= $agora){
                if($a['produto_dataFinal'] != null){
                    $fim    = date('Y-m-d 23:59:59', strtotime($a['produto_dataFinal'])); //1969-12-31 23:59:59
                    if($fim >= $agora){
                        $valor = $a['produto_desconto'];
                    }else{
                        $valor = 0;
                    }
                }else{
                    $valor = $a['produto_desconto'];
                }
            }else{
                $valor = 0;
            }
        }else{
            $valor = 0;
        }
        if($a['produto_promocaoAtivo'] == 1){
            $valor = "promocao";
        }
        return $valor;
    }
    
    public function promocao2($servico){
        $servico['valor_exibir'] = $servico['produto_valor'];
       
        if($servico['produto_promocaoAtivo'] == 1 && $servico['produto_promocaoPreco'] != 0.00){
            $servico['produto_valor'] = $servico['produto_promocaoPreco'];
        }
        
        if($servico['produto_dataInicial'] >= date('Y-m-d') && $servico['produto_dataFinal'] <= date('Y-m-d') && $servico['produto_descontoAtivo'] == 1 && $servico['produto_desconto'] != 0){
            $servico['produto_valor'] = $servico['produto_valor'] * (1-($servico['produto_desconto']/100));
        }
        
        return $servico;
    }
    
    public function cartunico($servico, $quantidade, $id, $afiliado){
        /*
        ****Alterado por Anderson Moreira 03/01/2022*****
        $servico    -> produto escolhido
        $quantidade -> quantidade de produtos
        $id         -> identificação do carrinho
        $afiliado   -> codigo de afiliado
        */
        
        $this->db->select("produto_valor as original");
        $this->db->where('produto_id', $servico);
        $valorOriginal = $this->db->get("produtos")->row_array();
        if($id != 0){
            $this->db->where('idTemp', $id);
            $cart = $this->db->get('cartunico')->row_array();
            
            if((strpos($cart['listServicosId'], $servico) !== false)){
                
                $qtd = 0;
                
                if(strpos($cart['listServicosId'], "¬")){
                    $a = explode("¬", $cart['listServicosId']);
                    $b = explode("¬", $cart['qtdServicos']);
                    $c = explode("¬", $cart['vlrServicos']);
                    $d = explode("¬", $cart['desconto']);
                    $e = explode("¬", $cart['afiliado']);
                }else{
                    $a[0] = $cart['listServicosId'];
                    $b[0] = $cart['qtdServicos'];
                    $c[0] = $cart['vlrServicos'];
                    $d[0] = $cart['desconto'];
                    $e[0] = $cart['afiliado'];
                }
                
                for($i=0; $i<count($a); $i++){
                    if($servico == $a[$i]){
                        $b[$i] += $quantidade;
                    }
                }

                $cart['listServicosId'] = implode("¬", $a);
                $cart['qtdServicos']    = implode("¬", $b);
                $cart['vlrServicos']    = implode("¬", $c);
                $cart['valorTotal']     = implode("¬", $d);
                $cart['desconto']       = implode("¬", $e);
                $cart['afiliado']       = implode("¬", $e);

            }else{
                $valor = $this->promocao($servico);
                $desconto = $this->desconto($servico);
                
                $cart['listServicosId'] .= "¬".$servico;
                $cart['qtdServicos']    .= "¬".$quantidade;
                $cart['vlrServicos']    .= "¬".$valor;
                $cart['valorTotal']     += ((int)$quantidade + (float)$valor);
                $cart['desconto']       .= "¬0";
                $cart['afiliado']       .= "¬".$afiliado;
                
            }
        }else{
            $valor = $this->promocao($servico);
            $desconto = $this->desconto($servico);
            $id = date('YHis');
            $cart = array(
                'idTemp'            => $id,
                'listServicosId'    => $servico,
                'qtdServicos'       => $quantidade,
                'vlrServicos'       => $valor,
                'valorTotal'        => ((float)$valor * (int)$quantidade),
                'desconto'          => 0,
                'afiliado'          => $afiliado,
            );
            
        }
        $this->db->replace('cartunico', $cart);
        $this->session->set_userdata('carrinho', $id);
    }
    
    // Criado por gui -  Função para contar a quantidade de produtos no carrinho
    public function contcarrinho($id){
        $this->db->where('idTemp', $id);
        $this->db->select('qtdServicos');
        $a =  $this->db->get('cartunico')->row_array();
        
        if($a){
            $aux = explode('¬', $a['qtdServicos']);    
            $resultado = array_sum($aux);
        } else {
            $resultado = 0;
        }
        
        return $resultado;
    }
    //
    
    public function carrinho($id){
        $this->db->where('idTemp', $id);
        $a =  $this->db->get('cartunico')->row_array();
        return $a;
    }
    
    public function updateCartUnico($carrinho){
        $this->db->replace('cartunico', $carrinho);
    }
    
    public function update($id, $new){
        $this->db->where('idcompra', $id);
        $this->db->update('historicocompras', $new);
    }
    
    public function rescueService2($id){
        $this->db->where('produto_id', $id);
        $servico = $this->db->get('produtos')->row_array();
        $servico['produto_valor'] = $this->promocao($servico);
        return $servico;
    }
    
    public function clearCartUnico($id){
        $this->session->unset_userdata('carrinho');
        $this->session->unset_userdata('carrinho');
        $this->db->where('idTemp', $id);
        return $this->db->get('cartunico')->row_array();
    }
    
    public function updateCompra($dados){
        $this->db->replace('historicocompras', $dados);
    }
    
    public function historico($dados){
        date_default_timezone_set('America/Sao_Paulo');
        
        $this->db->where('produto_id', $dados['listServicosId']);
        $servico = $this->db->get('produtos')->row_array();
        
        if($servico['produto_historico']){
            $historicos = explode('¢%¢', $servico['produto_historico']);
        
            $i = 4;
            
            foreach($historicos as $a){
                $aux = explode('§%§', $a);
                
                $historico = array(
                    'historico_pedido_id'   => $dados['id_pedido'],
                    'historico_data'        => null,
                    'historico_hora'        => null,
                    'historico_titulo'      => $aux[0],
                    'historico_comentario'  => $aux[1],
                    'historico_status'      => 0,
                    'historico_notificar'   => 1,
                    'historico_realizado'   => 0,
                    'historico_prioridade'  => $i,
                );
                
                $i++;
                $this->db->insert('historico_pedido', $historico);
            }
        }
        
        
        $historico = array(
            'historico_pedido_id'   => $dados['id_pedido'],
            'historico_data'        => date('Y-m-d'),
            'historico_hora'        => date('H:i'),
            'historico_titulo'      => 'Pedido Realizado',
            'historico_comentario'  => 'Pedido realizado com sucesso, aguardando pagamento.',
            'historico_status'      => 0,
            'historico_notificar'   => 1,
            'historico_realizado'   => 1,
            'historico_prioridade'  => 1,
        );
        $this->db->insert('historico_pedido', $historico);
        
    }
    
    public function compra($dados, $id){
        date_default_timezone_set('America/Sao_Paulo');
        
        $this->db->insert('historicocompras', $dados);
        $id_pedido = $this->db->insert_id();
        
        $this->session->unset_userdata('carrinho');
        $this->session->set_userdata('finalcompra', $id_pedido);
        
        $content = array(
            'listServicosId'    => $dados['listServicosId'],
            'qtdServicos'       => $dados['qtdServicos'],
            'id_pedido'         => $id_pedido,
        );
        
        $this->historico($content);
        
        $this->db->where('idTemp', $id);
        $this->db->delete('cartunico');
        
        return $id_pedido;
    }
    
    public function deletePedido($id){
        $this->db->where('idcompra', $id);
        $this->db->delete('historicocompras');
    }
    
    public function getByCep($cep){
        $this->db->where('cep', $cep);
        $data = $this->db->get('cep'); 
        return $data->row_array();
    }
    
    public function rescueCompra($id){
        $this->db->where('idcompra', $id);
        $a =  $this->db->get('historicocompras')->row_array();
        return $a;
    }
    
    public function retriveCompra($id){
        
        $this->db->where('idcompra', $id);
        $a = $this->db->get('historicocompras')->row_array();
        
        $this->db->where('cliente_id', $a['idClient']);
        $cliente = $this->db->get('cliente')->row_array();
        if (strpos($a['listProdutosId'], "¬") !== false){
            $produtos = explode("¬", $a['listProdutosId']);
            $quantidade = explode("¬", $a['qtdProdutos']);
        }else{
            $produtos = $a['listProdutosId'];
            $quantidade = $a['qtdProdutos'];
        }
        
        if(is_array($produtos)){
            $count = count($produtos);
        }else{
            $count = 1;
        }
        
        for($i=0; $i<$count; $i++){
            
            $this->db->where('produto_id', $produtos[$i]);
            $valor = $this->db->get('produtos')->row_array();
            $compra[$i] = array(
                'produto'       => $valor['produto_nome'],
                'valor'         => $valor['produto_valor'],
                'quantidade'    => $quantidade[$i],
                );
        }
        
        
        $dados = array(
            'senderName'    => $cliente['cliente_nome'],
            'senderCPF'     => $cliente['cliente_cpf'],
            //'senderEmail'   => $cliente['cliente_email'],
            'senderEmail'   => 'email@sandbox.pagseguro.com.br',
            'compra'        => $compra,
            'valorTotal'    => (float)$a['valorCompra'],
            );
        
        return $dados;
    }
    
    public function getPedido($id){
        $this->db->where('idcompra', $id);
        return $this->db->get('historicocompras')->row_array();
    }
    
    public function cardHolder($id){
        $this->db->select('cliente_nome, cliente_cpf, cliente_nascimento');
        $this->db->where('cliente_id', $id);
        $data = $this->db->get('cliente'); 
        return $data->row_array();
    }
    
    public function getCompra($id){
        $this->db->where('idcompra', $id);
        $a = $this->db->get('historicocompras')->row_array();

        /*if($a['formaPagamento'] == 'cartão'){
            $forma = 'credit_card';
        }elseif($a['formaPagamento'] == 'boleto'){
            $forma = 'boleto';
        }elseif($a['formaPagamento'] == 'pix'){
            $forma = 'pix';
        }*/
        
        $this->db->select('cliente_nome,  cliente_telefone, cliente_cpf, cliente_cep, cliente_email, cliente_nascimento, cliente_estado, cliente_endereco, cliente_numero, cliente_complemento, cliente_cidade, cliente_bairro');
        $this->db->where('cliente_id', $a['idClient']);
        $b = $this->db->get('cliente')->row_array();

        if($b['cliente_complemento'] == '' || $b['cliente_complemento'] == null ){
            $complemento = 'sem';
        }else{
            $complemento = $b['cliente_complemento'];
        }
        if(strpos($b['cliente_telefone'], "¬")){
            $fon = explode("¬", $b['cliente_telefone']);
        }else{
            $fon = $b['cliente_telefone'];
        }
        $fone = "";
        if(is_array($fon)){
            $fone .= "[ {";
            for($i=0; $i<count($fon);$i++){
                $fone .= "+55".$fon[$i].",";
            }
            $fone .= "} ]";
        }else{
            $fone .= "+55".$b['cliente_telefone'];
        }
        
        $valor = intval(($a['valorCompra'] + $a['freteValor']) * 100);
        
        //$compra['reference_key'] = md5($a['idcompra']);                       // 
        $compra['amount'] = $valor;             // Valor da transação (em centavos) a ser transacionado pelo Checkout. Mínimo 100 (1 real)
        $compra['freeInstallments'] = 1;                                        // Quantidade de parcelas onde não haverá cobrança de juros 
        $compra['interestRate'] = 12.00;                                        // Percentual de juros que serão aplicados a partir de uma determinada parcela
        $compra['maxInstallments'] = 15;                                        // Número máximo de parcelas aceitas
        $compra['defaultInstallments'] = 1;                                     // Número de parcelas que virá selecionado ao abrir o checkout
        $compra['minInstallments'] = 1;                                         // Número mínimo de parcelas aceitas
        $compra['postback_url'] = base_url('pagamentoSTN/retornoPGM');          // 
        $compra['createToken'] = 'true';                                        // Habilita a geração do token para autorização da transação. Caso você deseje apenas utilizar o checkout como formulário, deixe esse atributo com o valor false, e realize a transação normalmente no seu backend.
        //$compra['paymentMethods'] = $forma;                                   // Meios de pagamento disponíveis no Checkout. credit_card, boleto, pix
        $compra['customerData'] = 'false';                                      // Caso não deseje capturar dados do cliente pelo Checkout, setar como false. Senão, true.
        $compra['customer.external_id'] = $a['idClient'];                       // Id do cliente na loja

        $compra['customer.name'] = $b['cliente_nome'];                          // Nome
        $compra['customer.type'] = 'individual';                                // Tipo de cliente (individual ou corporation)
        $compra['customer.country'] = 'br';                                     // País de origem do cliente
        $compra['customer.email'] = $b['cliente_email'];                        // Email do cliente
        $compra['customer.documents.type'] = 'cpf';                             // Tipo do documento (CPF ou CNPJ)
        $compra['customer.documents.number'] = $b['cliente_cpf'];               // Número do documento (CPF ou CNPJ)
        $compra['customer.phone_numbers'] = $fone;                              // Lista de telefones do cliente. Array "['+5511888889999', '+5511888889999']"
        $compra['customer.birthday'] = $b['cliente_nascimento'];                // Data de nascimento do cliente

        //shipping //Informações de entrega (obrigatório quando há bens físicos entre os itens vendidos)
        $envio['shipping.name'] = $b['cliente_nome'];                           // Nome do comprador
        $envio['shipping.fee'] = 0;                              // Taxa de envio cobrada do comprador. Por exemplo, se a taxa de envio é de dez reais e três centavos (R$37,29), o valor deve ser fornecido como ‘3729’
        //$envio['shipping.delivery_date'] = strtotime(date("Y-m-d", strtotime($date)) . " +15 day");     // Não consta na documentação  //delivery_date: '<?php echo $envio['shipping.delivery_date'];
        $envio['shipping.expedited'] = 'false';                                 // Não consta na documentação
        //shipping.address // Dados de endereço de cobrança
        $envio['shipping.address.country'] = 'br';                              // País. Deve seguir o padão ISO 3166-1 alpha-2
        $envio['shipping.address.state'] = $b['cliente_estado'];                // Estado
        $envio['shipping.address.city'] = $b['cliente_cidade'];                 // Cidade
        $envio['shipping.address.neighborhood'] = $b['cliente_bairro'];         // Bairro
        $envio['shipping.address.street'] = $b['cliente_endereco'];             // Rua
        $envio['shipping.address.street_number'] = $b['cliente_numero'];        // Número
        $envio['shipping.address.zipcode'] = $b['cliente_cep'];                 // CEP DE ENTREGA
        $envio['shipping.address.complementary'] = $complemento;                // Dados complementares, não pode ser vazio e nem nulo
        
        
        if (strpos($a['listServicosId'], "¬") !== false){
            $servicos = explode("¬", $a['listServicosId']);
            $quantidade = explode("¬", $a['qtdServicos']);
            $flag = 2;
        }else{
            $servicos = $a['listServicosId'];
            $quantidade = $a['qtdServicos'];
            $flag = 1;
        }
        
        if($flag == 2){
            for($i=0; $i<count($servicos); $i++ ){
                $this->db->select('produto_nome, produto_valor, produto_id');
                $this->db->where('produto_id', $servicos[$i]);
                $c = $this->db->get('produtos')->row_array();
                $produto[$i]['item.id'] = "productId".$c['produto_id'];         // Número de identificação na loja
                $produto[$i]['item.title'] = $c['produto_nome'];                // Nome do item vendido
                $produto[$i]['item.unit_price'] = $c['produto_valor']*100;          // Valor unitário em centavos
                $produto[$i]['item.quantity'] = $quantidade[$i];                // Número de unidades vendidas
                $produto[$i]['item.tangible'] = 'true';
            }
        }else{
                $this->db->select('produto_nome, produto_valor');
                $this->db->where('produto_id', $servicos);
                $c = $this->db->get('produtos')->row_array();
                
                $produto['item.id'] = 1;                                        // Número de identificação na loja
                $produto['item.title'] = $c['produto_nome'];                    // Nome do item vendido
                $produto['item.unit_price'] = $c['produto_valor']*100;              // Valor unitário em centavos
                $produto['item.quantity'] = $quantidade;                        // Número de unidades vendidas
                $produto['item.tangible'] = 'true';
        }
        /*
        $produto['item.id'] = 1;                                        // Número de identificação na loja
        $produto['item.title'] = 'Teste';                    // Nome do item vendido
        $produto['item.unit_price'] = 5000;              // Valor unitário em centavos
        $produto['item.quantity'] = 1;                        // Número de unidades vendidas
        $produto['item.tangible'] = 'true';
        */        
        
        $data = array(
            'compra'    => $compra,
            'envio'     => $envio,
            'produto'   => $produto,
            );
        
        return $data;
    }
    
    public function getCarrinho($id){
        $this->db->where('idTemp', $id);
        return $this->db->get('cartunico')->row_array();
    }
    
    public function getDesconto($id){
        $this->db->select('desconto');
        $this->db->where('idTemp', $id);
        return $this->db->get('cartunico')->row_array();
    }
    
    public function removeProdut($cart, $produt){
        $this->db->where('idTemp', $cart);
        $cart = $this->db->get('cartunico')->row_array();
        $listServicosId = $qtdServicos = $vlrServicos = $desconto = $afiliado = "";
        
        if(strpos($cart['listServicosId'], "¬")){
            $a = explode("¬", $cart['listServicosId']);
            $b = explode("¬", $cart['qtdServicos']);
            $c = explode("¬", $cart['vlrServicos']);
            $d = explode("¬", $cart['desconto']);
            $e = explode("¬", $cart['afiliado']);
            $flag = 0;
            for($i=0; $i<count($a); $i++){
                if($a[$i] != $produt){
                    if($flag != 0){
                        $listServicosId .= "¬";
                        $qtdServicos .= "¬";
                        $vlrServicos .= "¬";
                        $desconto .= "¬";
                        $afiliado .= "¬";
                    }
                    $listServicosId .= $a[$i];
                    $qtdServicos .= $b[$i];
                    $vlrServicos .= $c[$i];
                    $desconto .= $d[$i];
                    $afiliado .= $e[$i];
                    $flag++;
                }
            }
            
            $cart['valorTotal'] = array_sum(explode("¬",$vlrServicos));
            $cart['listServicosId'] = $listServicosId;
            $cart['qtdServicos'] = $qtdServicos;
            $cart['vlrServicos'] = $vlrServicos; 
            $cart['desconto'] = $desconto; 
            $cart['afiliado'] = $afiliado;
        
            $this->db->replace('cartunico', $cart);
        }else{
            
            $this->clearCartUnico($cart['idTemp']);
        }
    }
}
