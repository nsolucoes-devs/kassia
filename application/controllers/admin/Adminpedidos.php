<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminpedidos extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
        
        $this->load->database();
        $this->load->model('comprasmodel');
        $this->load->model('carrinhomodel');
        $this->load->model('clientes');
        $this->load->model('produtos');
        $this->load->model('servicos');
        date_default_timezone_set('America/Sao_Paulo');
    }
    
    public function pedidos(){
        
        $this->load->library("pagination");
        
        
        $filtro = $this->input->post('filtro');
        $filtro = mb_strtoupper($filtro);
        if($this->uri->segment(2) == 'f'){
            $filtro = strtoupper(urldecode($this->uri->segment(3))); 
        }
        
        if($filtro){
            $config = array();
            $config["base_url"] = base_url('954d03a8bbb7febfcd39f9e071407b4b/f/' . $filtro . '/');
            $config["total_rows"] = $this->comprasmodel->get_countFiltro($filtro);
            $config["per_page"] = 10;
            $config["uri_segment"] = 4;
            
            $this->pagination->initialize($config);
            
            $data['links'] = $this->pagination->create_links();
            
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    
            $data['vendas']  = $this->comprasmodel->getAllPedidosFiltro($filtro, 10, $page);
            $data['filtro']  = $filtro;
        } else {
            $config = array();
            $config["base_url"] = base_url('954d03a8bbb7febfcd39f9e071407b4b/n/');
            $config["total_rows"] = $this->comprasmodel->get_count();
            $config["per_page"] = 10;
            $config["uri_segment"] = 3;
            
            $this->pagination->initialize($config);
            
            $data['links'] = $this->pagination->create_links();
            
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    
            $data['vendas']  = $this->comprasmodel->getAllPedidos(10, $page);
        }

        if($this->session->userdata('alert_pedido_novo')){
            $data['alert'] = $this->session->userdata('alert_pedido_novo');
            $this->session->unset_userdata('alert_pedido_novo');
        } else {
            $data['alert'] = null;
        }

        $this->header(4);
        $this->load->view('restrito/pedidos', $data);
        $this->footer();
    }
    
    public function pedido(){
        
        
        $id = $this->uri->segment(2);
        
        $data['pedido'] = $this->comprasmodel->pedido($id);
        
        
        
        
        
        $this->header(4);
        $this->load->view('restrito/pedido', $data);
        $this->footer();
    }
    
    public function cadastroPedido(){
        
        
        $data['clientes'] = $this->clientes->getAll();
        $data['produtos'] = $this->produtos->getAll();
        $data['servicos'] = $this->servicos->getAll();
        
        $this->header(4);
        $this->load->view('restrito/cadastropedido', $data);
        $this->footer();
    }
    
    public function editaPedido(){
        
        
        $id = $this->uri->segment(2);
        $pedido = $this->comprasmodel->pedido($id);
        
        
        $data = array(
            'pedido'    =>  $this->comprasmodel->pedido($id),
            'edita'     =>  1,
            'produtos'  =>  $this->comprasmodel->getProdutosAll($id),
            //'status'    =>  $this->comprasmodel->getStatusServicos(),
            'servicos'  =>  $this->servicos->getAllSimplificado(),
            'historico' =>  $this->servicos->servicosHistorico($pedido['servicos'][0]['produto_id']),
        );
        
        
        $this->header(4);
        $this->load->view('restrito/editaPedido', $data);
        $this->footer();
    }
    
    function comentario(){
        $this->load->database();
        $this->load->model('servicos');
        
        $a = $this->servicos->servicosComentario($_POST['id']);
        
        echo json_encode($a);
        
    }
    
    
    public function updateEnderecoEntrega(){
        
        $pedido = $this->comprasmodel->retrievePedido($this->input->post('pedido_id'));
        //[pedido_id] => 217 
        
        $endereco = $this->input->post('e_endereco')."¬".$this->input->post('e_complemento')."¬".$this->input->post('e_bairro')."¬".$this->input->post('e_cidade')."¬".$this->input->post('e_estado');
        $pedido['cepCompra']        = $this->input->post('e_cep');
        $pedido['numeroEndereco']   = $this->input->post('e_numero');
        $pedido['enderecoCompra']   = $endereco;
        
        $this->comprasmodel->updatePedido($this->input->post('pedido_id'), $pedido);
        
        redirect(base_url('4daaa9654962f18e7c9df5cb1b2ecdee/'.$this->input->post('pedido_id')));
    } 
    
    public function updateProdutosEntrega(){        
        
        $pedido = $this->comprasmodel->retrievePedido($this->input->post('pedido_id'));
        
        $prod = $this->input->post('prod');
        $qtd = $this->input->post('qtd');
        $helper = count($this->input->post('prod'));
        $produtos = $quantidade = $valorprod = "";
        $soma = 0;
        
        for($i=0; $i<$helper; $i++){
            $preco = $this->comprasmodel->getProduto($prod[$i]);
            $produtos .= $prod[$i];
            $quantidade .= $qtd[$i];
            $valorprod .= $preco['produto_valor'];
            if($i+1 < $helper){
                $produtos .= "¬";
                $quantidade .= "¬";
                $valorprod .= "¬";
            }
            $soma = $soma + ($preco['produto_valor'] * $qtd[$i]);
        }       
        
        //$pedido['produtos']         = $helper;
        $pedido['listServicosId']   = $produtos;
        $pedido['qtdServicos']      = $quantidade;
        $pedido['vlrServicos']      = $valorprod;
        $pedido['valorCompra']      = $soma; 
        //$pedido[valorFrete] => 0.00 
        $this->comprasmodel->updatePedido($this->input->post('pedido_id'), $pedido);
        redirect(base_url('4daaa9654962f18e7c9df5cb1b2ecdee/'.$this->input->post('pedido_id')));
    }
    
    public function updateFreteEntrega(){
        
        
        $pedido = $this->comprasmodel->retrievePedido($this->input->post('pedido_id'));
        $frete = $this->input->post('frete');
        $pedido['freteValor']   = (float)str_replace(",", ".", str_replace(".", "", $frete));
        
        $this->comprasmodel->updateFrete($this->input->post('pedido_id'), $pedido);
        redirect(base_url('4daaa9654962f18e7c9df5cb1b2ecdee/'.$this->input->post('pedido_id')));
    }
    
    public function removeProdutosPedido(){
        
        
        $pedido = $this->comprasmodel->retrievePedido($this->input->post('pedido'));
        
        $prod = explode("¬", $pedido['listServicosId']);
        $qtd = explode("¬", $pedido['qtdServicos']);
        $preco = explode("¬", $pedido['vlrServicos']);
        $helper = count($prod);
        $produtos = $quantidade = $valorprod = "";
        $soma = 0;
        
        for($i=0; $i<$helper; $i++){
            if($prod[$i] != $this->input->post('id')){
                if($i != 0){
                    $produtos .= "¬";
                    $quantidade .= "¬";
                    $valorprod .= "¬";
                }
                $produtos .= $prod[$i];
                $quantidade .= $qtd[$i];
                $valorprod .= $preco[$i];
                $soma = $soma + ($preco[$i] * $qtd[$i]);
            }
        }
        
        $pedido['listServicosId'] = $produtos;
        $pedido['qtdServicos'] = $quantidade;
        $pedido['vlrServicos'] = $valorprod;
        $pedido['valorCompra'] = $soma; 
        
        $this->comprasmodel->updatePedido($this->input->post('pedido'), $pedido);
        redirect(base_url('4daaa9654962f18e7c9df5cb1b2ecdee/'.$this->input->post('pedido')));
    }
    
    public function getServico(){
        $this->load->database();
        $this->load->model('servicos');
        
        $a = $this->servicos->getServicoAdd($this->input->post('idproduto'));
        
        echo json_encode($a);
    }
    
    public function alterarHistorico(){
         
        
        $id = $this->input->post('pedido_id');
        
        if($this->input->post('notificar')){
            $notificar = 1;
        } else {
            $notificar = 0;
        }
        
        $historico = array(
            'historico_pedido_id'   => $id, 
            'historico_data'        => date('Y-m-d'),
            'historico_hora'        => date('H:i'),
            'historico_comentario'  => $this->input->post('comentario'),
            'historico_status'      => $this->input->post('status'),
            'historico_titulo'      => $this->db->get('historicoTipos')->row_array()['historico_titulo'],
            'historico_notificar'   => $notificar,
        );
        
        $this->comprasmodel->insertHistorico($historico);
        
        $pedido = array(
            'statusCompra' =>  $this->input->post('status'),
        );
        
        $this->comprasmodel->updatePedido($id, $pedido);
        
        if($notificar == 1){
            $this->enviaEmail($id, $this->input->post('comentario'));    
        }
        redirect(base_url('4daaa9654962f18e7c9df5cb1b2ecdee/' . $id . ''));
        
        
        /*
        
        $id = $this->input->post('pedido_id');
        
        if($this->input->post('notificar')){
            $notificar = 1;
        } else {
            $notificar = 0;
        }
        
        
        
        $historico = array(
            'historico_pedido_id'   => $id, 
            'historico_data'        => date('Y-m-d'),
            'historico_hora'        => date('H:i'),
            'historico_comentario'  => $this->input->post('comentario'),
            'historico_status'      => $this->input->post('status'),
            'historico_titulo'      => $this->db->get('historicoTipos')->row_array()['historico_titulo'],
            'historico_realizado'   => 1,
            'historico_notificar'   => $notificar,
        );
        
        $this->comprasmodel->insertHistorico($historico);
        
        $pedido = array(
            'statusCompra' =>  $this->input->post('status'),
        );
        
        $this->comprasmodel->updatePedido($id, $pedido);
        
        
        
        if($notificar == 1){
            $this->enviaEmail($id, $this->input->post('comentario'));    
        }
        
        //print_r($historico);
        */
    }
    
    public function atualizarHistoricoUnico(){
        
        
        $id = $this->input->post('idPedido');
        $idHistorico = $this->input->post('idHistorico');
        
        $mensagem = $this->comprasmodel->updateHistoricoUnico($idHistorico, $id);
        
        $this->enviaEmail($id, $mensagem);
        
        redirect(base_url('4daaa9654962f18e7c9df5cb1b2ecdee/' . $id . ''));
    }
    
    public function cadastrarPedido(){
        
        
        $ids = $qtds = $precos = array();
        
        //[qtds] => 1¬1¬2 [ids] => 61¬62¬61 [precos] => 300,00¬400,00¬300,00
        
        $aux  = explode("¬", $this->input->post('ids'));
        $aux2 = explode("¬", $this->input->post('qtds'));
        $aux3 = explode("¬", $this->input->post('precos'));
        $x=0;
        for($z=0; $z<count($aux); $z++){
            $flag=0;
            if(!in_array($aux[$z], $ids)){
                for($y=1; $y<count($aux); $y++){
                    $helper = $aux[$z];
                    if($helper == $aux[$y]){
                        $ids[$x] = $aux[$y];
                        $qtds[$x] = $aux2[$y];
                        $precos[$x] = str_replace(",", ".", str_replace(".", "", $aux3[$z]));
                        $flag = 1;
                    }
                }
                if($flag == 0){
                    $ids[$x] = $aux[$z];
                    $qtds[$x] = $aux2[$z];
                    $precos[$x] = str_replace(",", ".", str_replace(".", "", $aux3[$z]));;
                }
            }
            $x++;
        }
        
        $dados = array(
            'idClient'          => $this->input->post('cliente'),
            'idCarrinho'        => rand(1000, 10000),
            'formaPagamento'    => $this->input->post('forma'),
            'dataCompra'        => $this->input->post('data')." ".$this->input->post('hora'),
            'listServicosId'    => implode("¬", $ids),
            'qtdServicos'       => implode("¬", $qtds),
            'vlrServicos'       => implode("¬", $precos),
            'valorCompra'       => $this->input->post('total'),
            'statusCompra'      => 1,
            'statusPagamento'   => 16,
            'dataAlteracao'     => date('Y-m-d H:i:s'),
            'desconto'          => $this->input->post('desconto'),
        );

        $id = $this->carrinhomodel->insert($dados);
        
         if($this->input->post('status') != "" && $this->input->post('status') != null){

            if($this->input->post('notificar')){
                $notificar = 1;
            } else {
                $notificar = 0;
            }
            
            if($this->input->post('comentario') == ""){
                $comentário = "Pedido criado!";
            }else{
                $comentário = $this->input->post('comentario');
            }
            
            $historico = array(
                'historico_pedido_id'   => $id, 
                'historico_data'        => date('Y-m-d'),
                'historico_hora'        => date('H:i'),
                'historico_comentario'  => $comentário,
                'historico_status'      => 1,
                'historico_notificar'   => $notificar,
            );
            
            $this->comprasmodel->insertHistorico($historico);
        
            $pedido = array(
                'statusCompra' =>  1,
            );
            
            $this->comprasmodel->updatePedido($id, $pedido);
            
            if($notificar == 1){
                $this->enviaEmail($id, $this->input->post('comentario'));    
             }
        }
        
        
        
        $this->session->set_userdata('alert_pedido_novo', $id);

        redirect(base_url('954d03a8bbb7febfcd39f9e071407b4b'));

    }
    
    function enviaEmail($idpedido, $comentario){
            $this->load->database();
            $this->load->model('configs');
            $this->load->model('clientes');
            $this->load->model('comprasmodel');
            $this->load->model('carrinhomodel');
            $this->load->model('servicos');
            
            $dados = $this->comprasmodel->getPedido($idpedido);
            $dados['numero_pedido'] = $idpedido;
            $dados['detalhes']      = $comentario;
            $dados['segundo']       = 1;
            
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
    	        
        	    foreach($aux_servicos as $s){
        	        $servico = $this->servicos->get($s);
        	        
        	        $servicos[$cont] = array(
        	            'produto_nome'          => $servico['produto_nome'],    
        	            'produto_subtitulo'     => $servico['produto_subtitulo'],
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
        	        'segundo'               => $dados['segundo'],
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
                
                $assunto = $site['nome_empresa'];
                
        	    $email = $cliente['cliente_email'];
        	    
                $this->load->library('email');
                $this->load->model("sendemail");
                $mailbody = $this->sendemail->mailbody($data);
        
                $this->email->initialize($config);
                
                $this->email->from($gestoremail['email_user'], $site['nome_empresa']);
                $this->email->to($email); 
                $this->email->subject($assunto);
                $this->email->message($mailbody);  
                
                $this->email->send();
                $this->email->print_debugger();
    	    }
	}
	    
	function dinamicoGetServico(){
	    $this->load->database();
        $this->load->model('servicos');
        
        $a = $this->servicos->getServicoAdd($this->input->post('id'));
        
        echo json_encode($a);
	}
	
	public function relatorioQuestionario(){
	        
	    $this->load->model('configs');
    	    
	    $id = $this->input->post('id');
	    
	    $data['pedido']     = $this->comprasmodel->pedido($id);
	    $data['configs']    = $this->configs->getSite();
        
        $this->load->view('restrito/relatorios/questionario', $data);
	}
}