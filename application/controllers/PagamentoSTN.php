<?php if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

class PagamentoSTN extends CI_Controller {

    public function keys(){
        /*$dados = array(
            'api'       => 'ak_test_TG8KhV0zZ5sTQC6tQSCymTwL04ujwA', //Chave SandBox   
            'crypto'    => 'ek_test_yWbRAJoS2KXAE79Rrtchj7mGwv249Y', //Chave SandBox   ek_test_nf7NcuifqjdFXROSmDw121Ii6ckVhl
        );*/
        
        $dados = array(
            'api'       => 'ak_live_EJZgDtqsuh0JLP71SFh75Gg6uDP0J5', // Chave V4
            'crypto'    => 'ek_live_hem64ynpl6EyHMhPndnu1Dl7uhQNMA', // Chave V4 
            // 'api'       => 'sk_qMVG9R1CnEs3BNaE',   // Chave V5
            // 'crypto'    => 'pk_r548az8cGFry2EpG',   // Chave V5
        );
        return $dados;
        
    }
    public function transacaoTest(){
        $aux = $this->keys();
        
        $url = 'https://api.pagar.me/1/transactions';
        
        $headers = array('Content-Type: application/x-www-form-urlencoded; charset=ISO-8859-1');
        
        $charge["amount"]                   = 2100;
        $charge["api_key"]                  = $aux['api'];
        $charge["payment_method"]           = 'boleto';
        $charge["customerType"]             = 'individual';
        $charge["customerCountry"]          = 'br';
        $charge["customerName"]             = 'Daenerys Targaryen';
        $charge["DocumentsType"]            = 'cpf';
        $charge["DocumentsNumber"]          =  '00000000000';
        
        $xml = "'amount': 2100, 
                'api_key':".$aux['api'].",
                'payment_method': 'boleto',
                'customer':{
                    'type': 'individual',
                    'country': 'br',
                    'name': 'Daenerys Targaryen',
                    'documents': [{
                        'type': 'cpf',
                        'number': '00000000000'
                    }]";
        
        
        $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    "Content-Type: application/json"
                ]);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $charge);
            //curl_setopt($ch,CURLOPT_ENCODING , "gzip");
        $res = curl_exec($ch);
            curl_close($ch);
    }
    
    function criarChat($pedido){
        date_default_timezone_set('America/Sao_Paulo');
        $this->load->database();
        $this->load->model('chatmodel');
        $this->load->model('configs');
        $site = $this->configs->getSite();

        $id = md5($pedido);
        
        $chat = array(
            'chat_pedido_hash'  => $id,
            'chat_status'       => 'Aberto',
        );
        
        $id = $this->chatmodel->insert($chat);
        
        $mensagem = array(
            'mensagem_chat'     => $id,
            'mensagem_conteudo' => 'Pedido de Contratação realizado com sucesso, aguardando pagamento.',
            'mensagem_visto'    => 0,
            'mensagem_remetente'=> $site['nome_empresa'],
            'mensagem_admin'    => 2,
            'mensagem_dataHora' => date('Y-m-d H:i'),  
        );   
        
        $this->db->insert('mensagens', $mensagem); 
    }
    
    public function pgmtPGM(){
        $aux = $this->keys();
        $this->load->database();
        $this->load->model('carrinhomodel');
        $this->load->model('servicos');
        $this->load->model('configs');
        $data = $this->carrinhomodel->getCompra($this->session->userdata('finalcompra'));
        $site = $this->configs->getSite();
        
        $this->criarChat($this->session->userdata('finalcompra'));
        
        $compra     = $data['compra'];   //dados do comprador  CPF $compra['customer.documents.number']
        $envio      = $data['envio'];
        $produto    = $data['produto'];
        
        
        if($this->session->userdata('titular_cartao')){
            $compra['customer.documents.number'] = $this->session->userdata('titular_cartao');
            $this->session->unset_userdata('titular_cartao');
        }
        
        $cobranca['billing.name']                   = $site['nome_empresa'];                    // Nome da entidade de cobrança
        $cobranca['billing.address.country']        = $envio['shipping.address.country'];       // Dados de endereço de cobrança
        $cobranca['billing.address.state']          = $envio['shipping.address.state'];         // Estado
        $cobranca['billing.address.city']           = $envio['shipping.address.city'];          // Cidade
        $cobranca['billing.address.neighborhood']   = $envio['shipping.address.neighborhood'];  // Bairro
        $cobranca['billing.address.street']         = $envio['shipping.address.street'];        // Rua
        $cobranca['billing.address.street_number']  = $envio['shipping.address.street_number']; // Número
        $cobranca['billing.address.zipcode']        = $envio['shipping.address.zipcode'];       // CEP DE COBRANÇA
        $cobranca['billing.address.complementary']  = $envio['shipping.address.complementary']; // Dados complementares, não pode ser vazio e nem nulo
        
        // organiza a cobrança para receber o pagamento
        $dados['compra']    = $compra;                              
        $dados['cobranca']  = $cobranca;
        $dados['envio']     = $envio;
        $dados['produto']   = $produto;
        $dados['api']       = $aux['api'];
        $dados['chave']    = $aux['crypto'];
        
        /*
        $dadosHeader['idpag']               = "";
        $dadosHeader['configs']             = "";
        $dadosHeader['telefonedecontato']   = "";
        $dadosHeader['servicos']            = $this->servicos->getAll();
        $site = $this->configs->getSite();
    
        $dadosFooter = array(
            'callback'              => $this->uri->uri_string(),
            'facebook'              => $site['facebook'],
            'instagram'             => $site['instagram'],
            'endereco'              => $site['endereco'],
            'email'                 => $site['email'],
            'whats'                 => $site['whats'],
            'telefone'              => $site['telefone'],
            'nome_empresa'          => $site['nome_empresa'],
            'cnpj'                  => $site['cnpj'],
            'sobre_loja'            => $site['sobre_loja'],
            'politica_entrega'      => $site['politica_entrega'],
            'politica_privacidade'  => $site['politica_privacidade'],
            'termos'                => $site['termos'],
        );
        
        $this->load->view('recursos/header', $dadosHeader);
        $this->load->view('pagme', $dados);
        $this->load->view('recursos/footer', $dadosFooter);
        */
        
        echo json_encode($dados);
    }
    
    public function capturaPGM(){
        $aux = $this->keys();
        $this->load->database();
        $this->load->model('pagmemodel');

        $a = $this->input->get_post('token');
        $b = $this->input->get_post('payment_method');
        $c = $this->input->get_post('amount');
        $apik = $aux['api'];

        $url = "https://api.pagar.me/1/transactions/";
        $place = $a."/capture";
        
        $credenciais = array(
            "amount"    => $c,
            "api_key"   => $apik,
        );
        
        $curl = curl_init($url.$place);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($credenciais));
        $resultado = curl_exec($curl);
            curl_close($curl);
    
        $dados = json_decode($resultado, true);
    
        $update = array(
            'formaPagamento'            => $dados['payment_method'],
            'authorization_code'        => $dados['authorization_code'],
            'boleto_url'                => $dados['boleto_url'],
            'boleto_barcode'            => $dados['boleto_barcode'],
            'boleto_expiration_date'    => $dados['boleto_expiration_date'],
            'statusCompra'              => 1,
            'statusPagamento'           => 16,
            'codTransacao'              => $dados['id'],
            'dataAlteracao'             => date('Y-m-d H:i:s'),
            );
        
        
        $this->pagmemodel->atualizapedido($this->session->userdata('finalcompra'), $update);
        
        $id = $this->session->userdata('finalcompra');
        
        $this->session->unset_userdata('quantidade_carrinho');
        $this->session->unset_userdata('compra');
        $this->session->unset_userdata('finalcompra');
        $this->session->unset_userdata('frete_valor');
        $this->session->unset_userdata('frete_tipo');
        $this->session->unset_userdata('forma_pag');
        
        $this->verifyPGM($dados['id']);
        //$this->brutePGM($dados['id']);
        
        return redirect(base_url('36d2a623d4b5878db84e0032b88bcabc/'.$id));
    }
    
    function pedido($id){
        $this->load->database();
        $this->load->model('comprasmodel');

        $pedido = $this->comprasmodel->getPedido($id);
        $this->load->library('session');
        $this->session->set_userdata("boleto", $pedido['boleto_url']);
        
        redirect(base_url('92e97566397e7d998f610c34726e7a20#pedidos'));
    }
    
    function enviaEmail($idpedido, $comentario){
        
        $aux = $this->keys();
        $this->load->database();
        $this->load->model('configs');
        $this->load->model('clientes');
        $this->load->model('comprasmodel');
        $this->load->model('carrinhomodel');
        $this->load->model('servicos');
        
        $dados = $this->comprasmodel->getPedido($idpedido);
        
        $dados['numero_pedido'] = $idpedido;
        if($comentario == null ){
            $dados['detalhes']      = 'Pedido realizada com sucesso, aguardando pagamento.';
        } else {
            $dados['detalhes']      = $comentario;
            $dados['segundo']       = 1;
        }
        
        
        $site = $this->configs->getSite();
        $gestoremail = $this->configs->getEmail(1);
        
        $cliente = $this->clientes->getClienteById($dados['idClient']);
        if($cliente['cliente_email']){
            
            $servicos = [];
            $cont = 0;
            $aux_servicos   = explode('¬', $dados['listServicosId']);
            $aux_quantidade = explode('¬', $dados['qtdServicos']);
            $aux_valor      = explode('¬', $dados['vlrServicos']);
            $subtotal = 0;
            
            foreach($aux_servicos as $p){
                $produto = $this->servicos->get($p);        	        
                $servicos[$cont] = array(
                    'produto_nome'          => $produto['produto_nome'],    
                    'produto_subtitulo'     => $produto['produto_subtitulo'],
                    'produto_quantidade'    => $aux_quantidade[$cont],
                    'produto_valor'         => number_format($aux_valor[$cont], 2,',','.'),
                    'produto_total'         => number_format($aux_quantidade[$cont] * $aux_valor[$cont],2,',','.') ,
                );
                $cont++;
            }
            
            
            $status = $this->carrinhomodel->getStatus($dados['statusCompra']);
            if($status){
                $status = $status['nomeStatusCompra'];
            } else {
                $status = 'Status não encontrado';
            }
        }
        
        if($cliente['cliente_telefone']){
            if(strlen($cliente['cliente_telefone']) == 11){
                $fone = $this->mask($cliente['cliente_telefone'], '(##) #####-####');
            } else if(strlen($cliente['cliente_telefone'] == 10)){
                $fone = $this->mask($cliente['cliente_telefone'], '(##) ####-####');
            } 
        } else {
            $fone = 'Telefone não cadastrado';
        }
        
        
        $data = array(
            'numero_pedido'         => $dados['numero_pedido'],
            'data'                  => date('d/m/Y H:i', strtotime($dados['dataCompra'])),
            'pagamento'             => $dados['formaPagamento'], 
            'nome'                  => $cliente['cliente_nome'],
            'cpf'                   => $this->mask($cliente['cliente_cpf'], '###.###.###-##'),
            'fone'                  => $fone,
            'status'                => $status,
            'servicos'              => $servicos,
            'subtotal'              => number_format($dados['valorCompra'],2,',','.'),
            'total'                 => number_format($dados['valorCompra'] - $dados['desconto'],2,',','.'),
            'detalhes'              => $dados['detalhes'],
            'nome_empresa'          => $site['nome_empresa'],
        );
            
            
        $config = array(
            'protocol'      => $gestoremail['email_protocol'],
            'smtp_host'     => $gestoremail['email_host'],
            'smtp_port'     => $gestoremail['email_port'],
            'smtp_timeout'  => $gestoremail['email_timeout'],
            'smtp_user'     => $gestoremail['email_user'],
            'smtp_pass'     => $gestoremail['email_pass'],
            'charset'       => $gestoremail['email_charset'],
            'newline'       => "\r\n",  
            'mailtype'      => 'html',    
            'validation'    => TRUE,
        );
        
    
        
        $this->load->library('email');
        $this->load->model("sendemail");

        $this->email->initialize($config);
        
        $this->email->from($gestoremail['email_user'], 'DataCom Informática');
        $this->email->to(strtolower($cliente['cliente_email'])); 
        $this->email->subject($site['nome_empresa']);
        $this->email->message($this->sendemail->mailbody($data)); 
        $this->email->send();
        
        $this->email->print_debugger();
        
    }

    function enviaEmailAfiliado($idafiliado, $idpedido){
        $this->load->database();
        $this->load->model('afiliados');
        $this->load->model('comprasmodel');
        $this->load->model('carrinhomodel');
        $this->load->model('clientes');
        $this->load->model('configs');

        $afiliado = $this->afiliados->get($idafiliado);

        $dados['detalhes']      = "Você fez uma nova venda como afiliado, abra o painel para verifica-la.";
        $dados['segundo']       = 1;


        $site = $this->configs->getSite();
        $gestoremail = $this->configs->getEmail(1);


        $pedido = $this->comprasmodel->getPedido($idpedido);

        if ($pedido != null) {
            $dados['numero_pedido'] = $idpedido;
            $cliente = $this->clientes->getClienteById($pedido['idClient']);
            if ($cliente['cliente_email']) {

                $status = $this->carrinhomodel->getStatus($pedido['statusCompra']);
                if ($status) {
                    $status = $status['nomeStatusCompra'];
                } else {
                    $status = 'Status não encontrado';
                }
            }
        }

        if ($afiliado['afiliado_telefone']) {
            if (strlen($afiliado['afiliado_telefone']) == 11) {
                $fone = $this->mask($afiliado['afiliado_telefone'], '(##) #####-####');
            } else if (strlen($afiliado['afiliado_telefone'] == 10)) {
                $fone = $this->mask($afiliado['afiliado_telefone'], '(##) ####-####');
            }
        } else {
            $fone = 'Telefone não cadastrado';
        }

        $data = array(
            'numero_pedido'         => $pedido['idcompra'],
            'data'                  => date('d/m/Y H:i', strtotime($pedido['dataCompra'])),
            'nomecliente'           => $cliente['cliente_nome'],
            'status'                => $status,
            'nome'                  => $afiliado['afiliado_nome'],
            'cnpj'                  => $this->mascara($afiliado['afiliado_cnpj'], "cnpj"),
            'fone'                  => $fone,
            'detalhes'              => $dados['detalhes'],
            'nome_empresa'          => $site['nome_empresa'],
        );

        $config = array(
            'protocol'      => $gestoremail['email_protocol'],
            'smtp_host'     => $gestoremail['email_host'],
            'smtp_port'     => $gestoremail['email_port'],
            'smtp_timeout'  => $gestoremail['email_timeout'],
            'smtp_user'     => $gestoremail['email_user'],
            'smtp_pass'     => $gestoremail['email_pass'],
            'charset'       => $gestoremail['email_charset'],
            'newline'       => "\r\n",
            'mailtype'      => 'html',
            'validation'    => TRUE,
        );

        $this->load->library('email');
        $this->load->model("sendemail");

        $this->email->initialize($config);

        $this->email->from($gestoremail['email_user'], 'Espaço Cachos');
        $this->email->to(strtolower($afiliado['afiliado_email']));
        $this->email->subject('Você fez uma nova venda');
        $this->email->message($this->sendemail->mailbody4($data));

        $this->email->send();
        $this->email->print_debugger();
    }
	    
    private function limpa($val){
        $aux = $this->keys();
        $helper = array(",", ".", "(", ")", "+", "-", " ", "/");
        return str_replace($helper, "", $val);
    }

    private function mask($val, $mask)    {
        $aux = $this->keys();
        $maskared = '';
        $k = 0;
        for($i = 0; $i<=strlen($mask)-1; $i++){
        
            if($mask[$i] == '#'){
                if(isset($val[$k]))
                    $maskared .= $val[$k++];
            }
            
            else{
                if(isset($mask[$i]))
                    $maskared .= $mask[$i];
            }
        }
        
        return $maskared;
    }

    function brutePGM($id){
        $this->load->database();
        $this->load->model('pagmemodel');
        
        $aux = $this->keys();
        $cod = $this->pagmemodel->resendCompra();
        
        for($i = 0; $i<count($cod); $i++){
            if($cod[$i]['codTransacao'] != ""){
                $url = "https://api.pagar.me/1/transactions/".$cod[$i]['codTransacao']."?api_key=".$aux['api'];
                $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                $response = curl_exec($ch);
                        curl_close($ch);
                //var_dump($response);
            $this->updatePedido(json_decode($response, true));
            }
        }
    }
    
    function simplePGM($id=null){
        $aux = $this->keys();
        $this->load->database();
        $this->load->model('pagmemodel');
        
        $cod = $this->pagmemodel->verifyCompra($id);
            
        $url = 'https://api.pagar.me/1/transactions/';
        $place = $cod['codTransacao'].'/postbacks?api_key='.$aux['api'];
            
        $curl = curl_init($url.$place);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $resultado = curl_exec($curl);
                    curl_close($curl);
        $SOS = html_entity_decode($resultado);
        $help = json_decode($SOS, true);
        $this->retornoPGM($help);
    }
    
    function verifyPGM($cod){
        $this->load->database();
        $this->load->model('pagmemodel');
        
        $aux = $this->keys();           
        $url = "https://api.pagar.me/1/transactions/".$cod."?api_key=".$aux['api'];
        $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $response = curl_exec($ch);
                curl_close($ch);
        //var_dump($response);
        $this->updatePedido(json_decode($response, true));        
    }

    function retornoPGM($help=null){
        $aux = $this->keys();
        $this->load->database();
        $this->load->model('pagmemodel');
        
        $i = 0;
        
        foreach($help as $hlp){
            $signature = explode("=", $hlp['signature']);
            $expected = hash_hmac('sha1', $hlp['payload'], $aux['api']);
            if($signature[1] == $expected){
                parse_str($hlp['payload'], $trans[$i]);
            }
            $i++;
        }
        
        for($j=0; $j<$i; $j++ ){
            $status = $trans[$j]['transaction']['status'];
            $prioridade = null;
            
            if($status == "processing"){
                $statusCompra       = 1;
                $statusPagamento    = 16;
                $historico          = "Pedido realizado com sucesso, aguardando pagamento.";
                $prioridade         = 2;
            }elseif($status == "authorized" && $trans[0]['transaction']['payment_method'] == 'boleto'){
                $statusCompra       = 1;
                $statusPagamento    = 16;
                $historico          = "Pedido realizado com sucesso, aguardando pagamento de boleto.";
                $prioridade         = 2;
            }elseif($status == "authorized" && $trans[0]['transaction']['payment_method'] == 'credit_card'){
                $statusCompra       = 3;
                $statusPagamento    = 17;
                $historico          = "Pedido realizado com sucesso, seu pedido está em processamento.";
                $prioridade         = 3;
            }elseif($status == "paid"){
                $statusCompra       = 3;
                $statusPagamento    = 17;
                $historico          = "Pagamento recebido. Seu pedido está em separação";
                $prioridade         = 3;
            }elseif($status == "refunded"){
                $statusCompra       = 10;
                $statusPagamento    = 23;
                $historico          = "Pagamento devolvido. Pedido cancelado.";
                $prioridade         = 3;
            }elseif($status == "waiting_payment"){
                $statusCompra       = 1;
                $statusPagamento    = 16;
                $historico          = "Aguardando pagamento.";
                $prioridade         = 3;
            }elseif($status == "pending_refund"){
                $statusCompra       = 9;
                $statusPagamento    = 24;
                $historico          = "Pedido de devolução realizado, aguardando devolução do dinheiro.";
                $prioridade         = 3;
            }elseif($status == "refused"){
                $statusCompra       = 6;
                $statusPagamento    = 19;
                $historico          = "Pagamento recusado, pedido cancelada.";
                $prioridade         = 3;
            }elseif($status == "chargedback"){
                $statusCompra       = 9;
                $statusPagamento    = 25;
                $historico          = "Pedido de devolução realizado, aguardando devolução do dinheiro.";
                $prioridade         = 3;
            }
            
            $dados = array(
                'codTransacao'          => $trans[0]['id'],
                'fingerprint'           => $trans[0]['fingerprint'],
                'statusCompra'          => $statusCompra,
                'statusPagamento'       => $statusPagamento,
                'authorization_code'    => $trans[0]['transaction']['authorization_code'],
                'dataAlteracao'         => date('Y-m-d H:i:s'),
                'boleto_url'            => $trans[0]['transaction']['boleto_url'],
                'boleto_barcode'        => $trans[0]['transaction']['boleto_barcode'],
                'boleto_expiration_date'=> $trans[0]['transaction']['boleto_expiration_date'],
                'historico'             => $historico,
                'prioridade'            => $prioridade,
            );

            $idPedido = $this->pagmemodel->updatePedido($dados);
            
            $this->enviaEmail($idPedido, $historico);
        }
    }
    
    public function pagbranco(){
        $this->load->database();
        $this->load->model('comprasmodel');
        $this->load->model('configs');
        $this->load->model('servicos');
        
        $site = $this->configs->getSite();
        
        $dadosHeader = array(
            'idpag'                 => "",
            'configs'               => "",
            'telefonedecontato'     => "",
            'servicos'              => $this->servicos->getAll(),
        );
        
        $dadosFooter = array(
            'facebook'              => $site['facebook'],
            'instagram'             => $site['instagram'],
            'linkedin'              => $site['linkedin'],
            'endereco'              => $site['endereco'],
            'email'                 => $site['email'],
            'whats'                 => $site['whats'],
            'telefone'              => $site['telefone'],
            'nome_empresa'          => $site['nome_empresa'],
            'cnpj'                  => $site['cnpj'],
            'sobre_loja'            => $site['sobre_loja'],
            'politica_entrega'      => $site['politica_entrega'],
            'politica_privacidade'  => $site['politica_privacidade'],
            'termos'                => $site['termos'],
        );
        
        $this->load->view('recursos/header', $dadosHeader);
        $this->load->view('pagBranco');
        $this->load->view('recursos/footer', $dadosFooter);
    }
    
    function cancelaPGM(){
        $this->load->model('pagmemodel');
        $this->load->database();
        $id = $this->session->userdata('finalcompra');
        $this->session->unset_userdata('quantidade_carrinho');
        $this->session->unset_userdata('compra');
        $this->session->unset_userdata('finalcompra');
        $this->session->unset_userdata('frete_valor');
        $this->session->unset_userdata('frete_tipo');
        $this->session->unset_userdata('forma_pag');
        
        $this->pagmemodel->abandonaPGM($id);
        
        redirect(base_url('92e97566397e7d998f610c34726e7a20#pedidos'));
        
    }

    function updatePedido($dados){
        if(is_array($dados) && !empty($dados) && !array_key_exists("errors", $dados)){
            
            $status = $dados['status'];
            $prioridade = null;
                
            if($status == "processing"){
                    $statusCompra       = 1;
                    $statusPagamento    = 16;
                    $historico          = "Pedido realizado com sucesso, aguardando pagamento.";
                    $prioridade         = 2;
            }elseif($status == "authorized" && $dados['payment_method'] == 'boleto'){
                    $statusCompra       = 1;
                    $statusPagamento    = 16;
                    $historico          = "Pedido realizado com sucesso, aguardando pagamento de boleto.";
                    $prioridade         = 2;
            }elseif($status == "authorized" && $dados['payment_method'] == 'credit_card'){
                    $statusCompra       = 3;
                    $statusPagamento    = 17;
                    $historico          = "Pedido realizado com sucesso, seu pedido está em processamento.";
                    $prioridade         = 3;
            }elseif($status == "paid"){
                    $statusCompra       = 3;
                    $statusPagamento    = 17;
                    $historico          = "Pagamento recebido. Seu pedido está em separação";
                    $prioridade         = 3;
            }elseif($status == "refunded"){
                    $statusCompra       = 10;
                    $statusPagamento    = 23;
                    $historico          = "Pagamento devolvido. Pedido cancelado.";
                    $prioridade         = 3;
            }elseif($status == "waiting_payment"){
                    $statusCompra       = 1;
                    $statusPagamento    = 16;
                    $historico          = "Aguardando pagamento.";
                    $prioridade         = 3;
            }elseif($status == "pending_refund"){
                    $statusCompra       = 9;
                    $statusPagamento    = 24;
                    $historico          = "Pedido de devolução realizado, aguardando devolução do dinheiro.";
                    $prioridade         = 3;
            }elseif($status == "refused"){
                    $statusCompra       = 6;
                    $statusPagamento    = 19;
                    $historico          = "Pagamento recusado, pedido cancelada.";
                    $prioridade         = 3;
            }elseif($status == "chargedback"){
                    $statusCompra       = 9;
                    $statusPagamento    = 25;
                    $historico          = "Pedido de devolução realizado, aguardando devolução do dinheiro.";
                    $prioridade         = 3;}
                
            $data = array(
                'codTransacao'          => $dados['id'],
                'fingerprint'           => null,
                'statusCompra'          => $statusCompra,
                'statusPagamento'       => $statusPagamento,
                'authorization_code'    => $dados['authorization_code'],
                'dataAlteracao'         => date('Y-m-d H:i:s'),
                'boleto_url'            => $dados['boleto_url'],
                'boleto_barcode'        => $dados['boleto_barcode'],
                'boleto_expiration_date'=> $dados['boleto_expiration_date'],
                'historico'             => $historico,
                'prioridade'            => $prioridade,
            );

            $Pedido = $this->pagmemodel->updatePedido($dados['id'], $data);
            
            if ($Pedido != false) {                
                if (isset($Pedido['afiliado'])) {
                    $this->enviaEmailAfiliado($Pedido['afiliado'], $Pedido['idcompra']);
                    $this->enviaEmail($Pedido['idcompra'], $historico);
                    
                } else {
                    $this->enviaEmail($Pedido, $historico);
                }
            }
        }            
    }
        
}
