<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FinalizaUnico extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('correiosmodel');
        $this->load->model('carrinhomodel');
        $this->load->model('produtos');
        $this->load->model('servicos');
        $this->load->model('promocoes');
        $this->load->model('departamentos');
        $this->load->model('clientes');
        $this->load->model('configs');
        date_default_timezone_set('America/Sao_Paulo');
    }
    
    public function header(){
        $dadosHeader['idpag']               = "";
    	$dadosHeader['configs']             = "";
    	$dadosHeader['telefonedecontato']   = "";
    	$dadosHeader['header'] = $this->departamentos->menuDepts();
    	
    	$this->load->view('recursos/header', $dadosHeader);
    }
    
    public function footer(){
        $site = $this->configs->getSite();
        
        $dadosFooter = array(
    	    'callback'              => $this->uri->uri_string(),
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
    	
    	$this->load->view('recursos/footer', $dadosFooter);
    }
    
    public function acessoVenda(){
        $this->load->database();
        $this->load->model('acessomodel');
        
        date_default_timezone_set('America/Sao_Paulo');
        
        $ano    =   date('Y');
        $mes    =   date('m');
        $dia    =   date('d');
        $hora   =   date('H');
        $min    =   date('i');
        
        $id = $ano . $mes . $dia . $hora;
        
        $acesso = $this->acessomodel->getVenda($id);
        
        if($acesso != null){
            if($acesso['min_'.$min] == null){
                $acesso['min_'.$min] = 1;
            } else {
                $acesso['min_'.$min]    =  $acesso['min_'.$min] + 1;    
            }
            $acesso['dia']          = $acesso['dia'] + 1;
            $acesso['hora']         = $acesso['hora'] + 1;
            
            $this->acessomodel->updateVenda($id, $acesso);
        } else {
            $acesso = array(
                'acesso_venda_id' => $id,
                'dia'       => 1,
                'hora'      => 1,
                'min_'.$min => 1,
            );
            $this->acessomodel->insertVenda($acesso);
        }
    }
    
    public function produtoPromocao($produto){
        $valor          = null;
        $porcentagem    = null;
        
        $promocoes = $this->promocoes->getAllAtivos();
        
        foreach($promocoes as $promo){
            $aux_produtos = explode('¬', $promo['promocao_produtos']);
            foreach($aux_produtos as $a){
                if($a == $produto['produto_id']){
                    
                    if($promo['promocao_cupom_ativo'] == 0){
            		    if($promo['promocao_preco_ativo'] == 1){
            		        $valor = $promo['promocao_preco'];
            		        $porcentagem = 100 - (($promo['promocao_preco'] * 100) / $produto['produto_valor']); 
            		    } else if($promo['promocao_desconto_ativo'] == 1){
            		        $porcentagem = $promo['promocao_desconto'];
            		        $valor = $produto['produto_valor'] - (($promo['promocao_desconto']/100) * $produto['produto_valor']);
            		    }
            		}
                }
            }
        }
        
        if($valor == null){ 
            if($produto['produto_cupom_ativo'] == 0){
    		    if($produto['produto_preco_promocao_ativo'] == 1){
    		        $valor = $produto['produto_preco_promocao'];
    		        $porcentagem = 100 - (($produto['produto_preco_promocao'] * 100) / $produto['produto_valor']); 
    		    } else if($produto['produto_descontoAtivo'] == 1){
    		        $desconto = $produto['produto_desconto'];
    		        $porcentagem = $produto['produto_desconto'];
    		        $valor = $produto['produto_valor'] - (($produto['produto_desconto']/100) * $produto['produto_valor']);
    		    }
    		}
        }
		
		$array = array(
		    'valor'         => $valor,
		    'porcentagem'   => $porcentagem,
		);
		
		return $array;
    }
    
    public function telaUnica2(){
        
        
        $this->session->unset_userdata('logado_cart', true);
        $this->session->unset_userdata('finalizado_cart', true);
        
        if($this->session->userdata('cadastro_erro')){
		    $data['cadastro_erro'] = $this->session->userdata('cadastro_erro');
		    $this->session->unset_userdata('cadastro_erro');
		} else {
		    $data['cadastro_erro'] = null;
		}
		
		if($this->session->userdata('login_erro')){
		    $data['login_erro'] = $this->session->userdata('login_erro');
		    $this->session->unset_userdata('login_erro');
		} else {
		    $data['login_erro'] = null;
		}
		
		$dados = $this->compra3();

		if(isset($dados['vazio'])){
		    if($dados['vazio']){
		        $data['vazio']         = $dados['vazio'];    
    		} else {
    		    $data['vazio']         = null;
    		}  
		}
		
        $data['desconto']      = $dados['desconto'];
        $data['valorTotal']    = $dados['valorTotal'];
        $data['carrinho']      = $dados['carrinho'];
        $data['chave']         = $dados['chave'];
        $data['valor_exibir']  = $dados['valorFinal'];
        $data['cliente']       = $this->login();
        $data['idCarrinho']    = $dados['idCarrinho'];

        $this->acessoVenda();
        
            $this->header();
            $this->load->view('compraUnica2', $data);
            $this->footer();
    }
   
    public function esquecerSenha(){
        $this->include();
        
        $cpf    = $this->limpa($this->input->post('cpf-esquecer'));
        $email  = mb_strtoupper($this->input->post('email-esquecer'));
        
        $cliente = $this->clientes->getCPF($cpf);
        if($cliente){
            if($cliente['cliente_email'] == $email){
                $this->session->set_userdata('msg', 5);
                $dados = array(
                    'nome'          => $cliente['cliente_nome'],
                    'senha'         => $cliente['cliente_cpf'],
                    'email'         => $cliente['cliente_email'],
                );
                
                $cliente_novo = array(
                    'cliente_senha' =>    md5($cliente['cliente_cpf']), 
                );
                    
                $this->clientes->update($cliente['cliente_id'], $cliente_novo);
                $this->enviaEsqueceuEmail($dados);
                
            } else {
                $this->session->set_userdata('msg', 6);
            }
        } else {
            $this->session->set_userdata('msg', 4);
        }
        
        $this->login2();
    }
    
    public function finaliza2(){

        if(array_key_exists('afiliado', $_POST)){
            $afiliado = $_POST['afiliado'];
        }else{
            $afiliado = '0';
        }
        if(array_key_exists('idServico', $_POST)){
            $idServico = $_POST['idServico'];
            $this->carrinho($idServico, $_POST['quantidade'], $afiliado);
        }else{
            $idServico = 0;
        }
        redirect(base_url('b920e92e9e4616300f9b7e6f3fd78635'));
    }
    
    public function cupom(){
        $this->load->model('produtos');
        $this->load->model('promocoes');
        /*$id_cupom = $this->input->post('cupom');
        $id_cart = $this->session->userdata('carrinho');
        $promocoes = $this->promocoes->getAllAtivos();
        $carrinho = $this->carrinhomodel->getCarrinho($id_cart);
        $valor = null;
        if($carrinho){
            $aux_produtos = explode('¬', $carrinho['listServicosId']);    

            foreach($promocoes as $promo){
                if($promo['promocao_cupom_ativo'] == 1){
                    if($promo['promocao_cupom'] == $id_cupom){
                        $aux_promo_produtos = explode('¬', $promo['promocao_produtos']);
                        foreach($aux_produtos as $aux_carrinho){
                            foreach($aux_promo_produtos as $aux_promo){
                                $produto = $this->produtos->getAtivo($aux_promo);
                                $produto_carrinho = $this->produtos->getAtivo($aux_carrinho);
                                if($produto && $produto_carrinho){
                                    if($produto_carrinho['produto_id'] == $produto['produto_id']){
                                        if($promo['promocao_preco_ativo'] == 1){
                                            $valor = $promo['promocao_preco'];
                                        } else if($promo['promocao_desconto_ativo'] == 1){
                                            $valor = $valor + ($promo['promocao_desconto']/100) * $produto['produto_valor'];
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
    
            
            if($valor != null){ 
                foreach($aux_produtos as $aux){
                    $servico = $this->servicos->getAtivo($aux);
                    $boolean = true;
                    if($servico){
                        if($servico['produto_dataInicial'] > date('Y-m-d')){
                            $boolean = false;
                        }
                        if($servico['produto_dataFinal'] == 1){
                            if($produto['produto_datafinal_promocao'] < date('Y-m-d')){
                                $boolean = false;
                            }
                        }
                        
                        if($boolean == true){
                            if($servico['produto_cupomAtivo'] == 1){
                                if($servico['produto_cupom'] == $id_cupom){
                                    if($servico['produto_promocaoAtivo'] == 1){
                                        $valor = $servico['produto_promocaoPreco'];
                                    } else if($servico['produto_descontoAtivo'] == 1){
                                        $valor = $servico['produto_desconto']/100 * $servico['produto_valor'];
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        $carrinho['desconto'] = $valor;
        
        $this->carrinhomodel->updateCartUnico($carrinho);*/

        $a = $this->promocoes->resgataCupom($_POST['cupom'], $_SESSION['carrinho']);
        
        $this->telaUnica2();
    }
    
    public function login(){
        $cliente = null;
        if($this->session->userdata('login_erro')){
            $data['login_erro'] = $this->session->userdata('login_erro');
            $this->session->unset_userdata('login_erro');
        }
        if($this->session->userdata('cliente_logado')){
            
            $cliente = $this->clientes->get($this->session->userdata('cliente_user_id'));
            $cliente['cliente_cpf'] = $this->mask($cliente['cliente_cpf'], '###.###.###-##');
            $cliente['cliente_cep'] = $this->mask($cliente['cliente_cep'], '#####-###');
            
            if($cliente['cliente_endereco'] !== null){
                if($cliente['cliente_numero'] !== null){
                    if($cliente['cliente_cidade'] !== null){
                        if($cliente['cliente_bairro'] !== null){
                            if($cliente['cliente_estado'] !== null){
                                $cliente['check'] = true;
                            }
                        }
                    }
                }
            }
            
            
        }
        
        return $cliente;
    }
    
    /*public function questionario(){
        $dados = $this->compra3();
        
    
		if(isset($dados['vazio'])){
		    if($dados['vazio']){
		        $data['vazio']         = $dados['vazio'];    
    		} else {
    		    $data['vazio']         = null;
    		}  
		}
		
        $data['desconto']      = $dados['desconto'];
        $data['valorTotal']    = $dados['valorTotal'] * $dados['carrinho']['quantidade'];
        $data['carrinho']      = $dados['carrinho'];
        $data['chave']         = $dados['chave'];
        $data['valor_exibir']  = $dados['carrinho']['valor_exibir'];
        $data['cliente']       = $this->login();
        
      
        
        if ($data['carrinho'] != null || $data['carrinho'] != ""){ 
            if($data['carrinho']['idServico'] == 61){
                $data['pdf'] = 'contrato1.pdf';
            } else {
                $data['pdf'] = 'contrato2.pdf';
            }
        }
       
        

        $this->header();
        $this->load->view('questionario', $data);
        $this->footer();
    }*/
    
    public function compra3(){
        $carrinho = array();
        $desconto = $valorfinal = $valorTotal = 0;
        if($this->session->userdata('finalcompra')){
            $idCarrinho = $this->session->userdata('finalcompra');
            $aux = $this->carrinhomodel->rescueCompra($this->session->userdata('finalcompra'));
            if($aux){
                if(strpos($aux['listServicosId'], "¬")){
                     $produtos = explode("¬", $aux['listServicosId']);
                     $quantidades = explode("¬", $aux['qtdServicos']);
                     $valores = explode("¬", $aux['vlrServicos']);
                     $descontos = explode("¬", $aux['desconto']);
                     $afiliado = explode("¬", $aux['afiliado']);
                }else{
                    $produtos[0] = $aux['listServicosId'];
                    $quantidades[0] = $aux['qtdServicos'];
                    $valores[0] = $aux['vlrServicos'];
                    $descontos[0] = $aux['desconto'];
                    $afiliado[0] = $aux['afiliado'];
                }
                for($i=0; $i<count($produtos); $i++){      
                    $a = $this->carrinhomodel->rescueService($produtos[$i]);
                    $carrinho[$i] = array(
                        'idServico'   => $produtos[$i],
                        'servico'     => $a['produto_nome'],
                        'sub'         => $a['produto_subtitulo'],
                        'valor'       => $valores[$i],
                        'valor_exibir' => (float)$valores[$i] * (float)$quantidades[$i],
                        'quantidade'  => $quantidades[$i],
                        'imagem'      => $a['produto_imagem1'],
                        'desconto'    => $descontos[$i],
                        'afiliado'    => $afiliado[$i],
                    );
                    $valorfinal += (float)$valores[$i] * (float)$quantidades[$i];
                    $valorTotal += (float)$a['produto_valor'] * (float)$quantidades[$i];
                    $desconto += (float)$descontos[$i] * (float)$quantidades[$i];
                }
            }
        }elseif($this->session->userdata('carrinho')){
            $idCarrinho = $this->session->userdata('carrinho');
            $aux = $this->carrinhomodel->carrinho($this->session->userdata('carrinho'));
            if($aux){
                if(strpos($aux['listServicosId'], "¬")){
                     $produtos      = $this->montexplode("¬", $aux['listServicosId']);
                     $quantidades   = $this->montexplode("¬", $aux['qtdServicos']);
                     $valores       = $this->montexplode("¬", $aux['vlrServicos']);
                     $descontos     = $this->montexplode("¬", $aux['desconto']);
                     $afiliado      = $this->montexplode("¬", $aux['afiliado']);
                }else{
                    $produtos[0]    = $aux['listServicosId'];
                    $quantidades[0] = $aux['qtdServicos'];
                    $valores[0]     = $aux['vlrServicos'];
                    $descontos[0]   = $aux['desconto'];
                    $afiliado[0]    = $aux['afiliado'];
                }
                
                for($i=0; $i<count($produtos); $i++){      
                    $a = $this->carrinhomodel->rescueService($produtos[$i]);
                    $carrinho[$i] = array(
                        'idServico'   => $produtos[$i],
                        'servico'     => $a['produto_nome'],
                        'sub'         => $a['produto_subtitulo'],
                        'valor'       => $valores[$i],
                        'valor_exibir'=> (float)$valores[$i] * (float)$quantidades[$i],
                        'quantidade'  => $quantidades[$i],
                        'imagem'      => $a['produto_imagem1'],
                        'afiliado'    => $afiliado[$i],
                    );
                    if(isset($descontos[$i])) {
                        $carrinho[$i]['desconto'] = $descontos[$i];
                    }
                    
                    $valorfinal += (float)$valores[$i] * (float)$quantidades[$i];
                    $valorTotal += (float)$a['produto_valor'] * (float)$quantidades[$i];
                    $desconto = array_sum($descontos);
                }
            }
        }else{
            $idCarrinho = "";
            $carrinho = array();
            $aux['valorTotal'] = "";
            $aux['desconto'] = "";
            $dados['vazio'] = 1;
        }

        if(!$carrinho) {
            if(array_key_exists('valor', $carrinho)){
                $valor = $carrinho['valor'];
            }else{
                $valor = 0;
            }
        }
        
        $dados['idCarrinho']    = $idCarrinho;
        $dados['valorTotal']    = $valorTotal;
        $dados['valorFinal']    = $valorfinal;
        $dados['desconto']      = $desconto;
        $dados['carrinho']      = $carrinho;
        $dados['chave']         = $this->configs->getChave(1);
        
        return $dados;
    }
    
    public function encerra2(){
        $this->session->set_userdata('compra', true);
        //Array ( [serviceId] => 100 [qtd] => 1 [freteEscolha] => [object HTMLInputElement] [freteValor] => 58.4 )
        $aux        = $this->carrinhomodel->carrinho($this->session->userdata('carrinho'));
        $cliente    = $this->clientes->get($this->session->userdata('cliente_user_id'));
        
        if($aux){
            if($aux['desconto'] == null || $aux['desconto'] == '0.00'){
                $desconto = 0;
            } else {
                $desconto = $aux['desconto'];
            }
     
           
            $carrinhoId = $this->session->userdata('carrinho');
                 $dados = array(
                'idClient'          => $this->session->userdata('cliente_user_id'),
                'idCarrinho'        => $this->session->userdata('carrinho'),
                //'pagamento'         => $this->input->post('payment_method'),
                'dataCompra'        => date('Y-m-d H:i:s'),
                'listServicosId'    => $aux['listServicosId'],
                'qtdServicos'       => $aux['qtdServicos'],
                'vlrServicos'       => $aux['vlrServicos'],
                'valorCompra'       => $aux['valorTotal'],
                'statusCompra'      => 1,
                'statusPagamento'   => 16,
                'codTransacao'      => "",
                'dataAlteracao'     => date('Y-m-d H:i:s'),
                'desconto'          => $desconto,
                'questionario'      => $this->input->post('questionario'),
                'afiliado'          => $aux['afiliado'],
                'frete'             => $this->input->post('frete'),
                'freteValor'        => $this->input->post('valor'),
            );
        
            $id = $this->carrinhomodel->compra($dados, $this->session->userdata('carrinho'));
            $dados['numero_pedido'] = $id;
            
            $this->enviaEmail($dados);
            
            //echo $this->input->post('totalImagens');
            
            $this->session->set_userdata('forma_pag', $this->input->post('pagamento'));
            $this->session->set_userdata('finalizado_cart', true);
            $this->session->set_userdata('titular_cartao', $this->input->post('titularcpf'));
            
            echo json_encode(true);
            
            //redirect(base_url('pagamentoSTN/pgmtPGM'));
        }
    }
    
    public function insertImagem($name, $file){
        $config = array();
        $config['upload_path']          = './imagens/pedidos/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|JPG|JPEG|PNG';
        $config['file_ext_tolower']     = true;
        $config['max_size']             = 2000000;
        $config['overwrite']            = true;
        $config['file_name']            = $name;
        
        $this->load->library('upload');
        
        $this->upload->initialize($config);

        if(!$this->upload->do_upload($file)){
            $this->upload->display_errors();
            
        }
    }
    
    public function retornarCompra(){
        $pedido = $this->carrinhomodel->getPedido($this->session->userdata('finalcompra'));

        if($pedido){
            $this->carrinhomodel->deletePedido($this->session->userdata('finalcompra'));
            
            $this->session->unset_userdata('finalcompra');
            $this->session->unset_userdata('compra');
            $this->session->unset_userdata('forma_pag');
            $this->session->unset_userdata('finalizado_cart');
        
            $aux_produto    = explode('¬', $pedido['listProdutosId']);
            $aux_quantidade = explode('¬', $pedido['qtdProdutos']);
            $cont = 0;
    
            
            foreach($aux_produto as $p){
                if($cont == 0){
                    $this->carrinhomodel->cartunico($p, $aux_quantidade[$cont], 0);        
                } else {
                    $this->carrinhomodel->cartunico($p, $aux_quantidade[$cont], $this->session->userdata('carrinho'));   
                }
                
                $cont++;
            }
        }
        

        $this->telaUnica2();
        
    }
    
    private function limpa($val){
	    $helper = array(",", ".", "(", ")", "+", "-", " ", "/");
        return str_replace($helper, "", $val);
	}
    
    private function mask($val, $mask)    {
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
    
    public function logar(){
        $this->load->model('clientes');
        
        $login = $this->limpa($this->input->post('login'));
        $senha = $this->input->post('pass');
        
        $aux = 0;
        if($this->clientes->getSenhaLogin($login, md5($senha))){
            $cliente = $this->clientes->getCPF($login);
            
            if($cliente['cliente_ativo'] == 0){
                $this->session->set_userdata('login_erro', 2);
                redirect(base_url('3cac916df58bfeb8d10bcb667c55d50a'));
            } else {
                $this->session->set_userdata('cliente_user_id', $cliente['cliente_id']);
                $this->session->set_userdata('cliente_nome', $cliente['cliente_nome']);
                $this->session->set_userdata('perfil', 'cliente');
                
                $this->session->set_userdata('cliente_logado', 1);
                $this->session->set_userdata('logado_cart', true);
                
                $this->session->set_userdata('login_erro', 0);
                
                $this->session->set_userdata('logado_pelo_carrinho', 1);
                redirect(base_url('b920e92e9e4616300f9b7e6f3fd78635'));
                
            }
        } else {
            $this->session->set_userdata('login_erro', 1);
            redirect(base_url('b920e92e9e4616300f9b7e6f3fd78635'));
        }
    }
    
    public function cadastrar(){
        
        $this->load->database();
        $this->load->model('clientes');
        $cliente = $this->clientes->getCPF($this->limpa($this->input->post('cpf')));
        $nome = $this->input->post('name');
        $senha = $this->input->post('pass');
        
        if($nome != null || $nome != ""){
            if($cliente){
                $this->session->set_userdata('login_erro', 2);
            } else {
                if (strlen ($senha) < 6){
                     $this->session->set_userdata('login_erro', 4);
                }else{
                    $dados = array(
                        'cliente_nome'          => mb_strtoupper($this->input->post('name')),
                        'cliente_cpf'           => $this->limpa($this->input->post('cpf')),
                        'cliente_senha'         => md5($this->input->post('pass')),
                        'cliente_ativo'         => 1,
                        'cliente_datacadastro'  => date('Y-m-d'),
                    );
                    $id = $this->clientes->insert($dados);
                    $this->session->set_userdata('cliente_user_id', $id);
                    $this->session->set_userdata('cliente_nome', $this->input->post('name'));
                    $this->session->set_userdata('cliente_logado', 1);
                    $this->session->set_userdata('logado_cart', true);
                }   
            }
        }else{
            $this->session->set_userdata('login_erro', 3);
        }
        
        redirect(base_url('3cac916df58bfeb8d10bcb667c55d50a'));
    }
    
    public function cadastrarCompleto(){
        
        $this->load->database();
        $this->load->model('clientes');
        $cliente = $this->clientes->getCPF($this->limpa($this->input->post('cpf_cadastro')));
        $nome = $this->input->post('nome_cadastro');
        $senha = $this->input->post('senha_cadastro');
        
        if($nome != null || $nome != ""){
            if($cliente){
                $this->session->set_userdata('login_erro', 2);
            } else {
                if (strlen ($senha) < 6){
                     $this->session->set_userdata('login_erro', 4);
                }else{
                    $data = explode('/', $this->input->post('nascimento_cadastro'));
                    $date = $data[2] . '-' . $data[1] . '-' . $data[0];
                    
                    $dados = array(
                        'cliente_nome'          => mb_strtoupper($this->input->post('nome_cadastro')),
                        'cliente_cpf'           => $this->limpa($this->input->post('cpf_cadastro')),
                        'cliente_senha'         => md5($this->input->post('senha_cadastro')),
                        'cliente_ativo'         => 1,
                        'cliente_datacadastro'  => date('Y-m-d'),
                        'cliente_telefone'      => $this->limpa($this->input->post('telefone_cadastro')), 
                        'cliente_email'         => mb_strtoupper($this->input->post('email_cadastro')), 
                        'cliente_nascimento'    => $date, 
                        'cliente_cep'           => $this->limpa($this->input->post('cep_cadastro')),  
                        'cliente_endereco'      => mb_strtoupper($this->input->post('rua_cadastro')),  
                        'cliente_numero'        => $this->input->post('numero_cadastro'),  
                        'cliente_cidade'        => mb_strtoupper($this->input->post('cidade_cadastro')),  
                        'cliente_bairro'        => mb_strtoupper($this->input->post('bairro_cadastro')),  
                        'cliente_estado'        => mb_strtoupper($this->input->post('estado_cadastro')),  
                        'cliente_complemento'   => $this->input->post('complemento_cadastro'), 
                    );
                    $id = $this->clientes->insert($dados);
                    $this->session->set_userdata('login_erro', 5);
                    $this->session->set_userdata('cliente_user_id', $id);
                    $this->session->set_userdata('cliente_nome', $this->input->post('nome_cadastro'));
                    $this->session->set_userdata('cliente_logado', 1);
                    $this->session->set_userdata('logado_cart', true);
                }   
            }
        }else{
            $this->session->set_userdata('login_erro', 3);
        }
        
        redirect(base_url('b920e92e9e4616300f9b7e6f3fd78635'));
    }
    
    function carrinho($servico, $quantidade, $afiliado){
        
        if($this->session->userdata('carrinho')){
            $id = $this->session->userdata('carrinho');
        }else{
            $id = 0;
        }
        
        $aux = $this->carrinhomodel->cartunico($servico, $quantidade, $id, $afiliado);
    }
    
    function atualiza2(){
        if(array_key_exists('conta', $_POST)){
            $cart = $this->carrinhomodel->getCarrinho($_SESSION['carrinho']);
            if(strpos($cart['listServicosId'], "¬")){
                $a = explode("¬", $cart['listServicosId']);
                $b = explode("¬", $cart['qtdServicos']);
                $c = explode("¬", $cart['vlrServicos']);
                for($i=0; $i<count($a); $i++){
                    if($_POST['product'] == $a[$i]){
                        if($_POST['conta'] == "+"){
                            $b[$i] += 1;
                        }else{
                            $b[$i] -= 1;
                        }
                    }
                }
                $cart['qtdServicos'] = implode("¬", $b);
                $valor = 0;
                for($i=0; $i<count($a); $i++){
                    $valor += $b[$i] * $c[$i];
                }
                $cart['valorTotal'] = $valor;
                
            }else{
                if($_POST['conta'] == "+"){
                    $cart['qtdServicos'] += 1;
                }else{
                            $cart['qtdServicos'] -= 1;
                        }
                $cart['valorTotal'] = $cart['qtdServicos'] * $cart['vlrServicos'];
            }
            
            
            $carrinho = array(
                'idTemp'            => $cart['idTemp'],
                'listServicosId'    => $cart['listServicosId'],
                'qtdServicos'       => $cart['qtdServicos'],
                'vlrServicos'       => $cart['vlrServicos'],
                'valorTotal'        => $cart['valorTotal'],
                'desconto'          => $cart['desconto'],
                'afiliado'          => $cart['afiliado'],
            );
        }else{
            $idTemp = $this->session->userdata('carrinho');
            $qtdServicos = $listServicos = $valorTotal = $vlrServicos = null;
            $helper = $this->carrinhomodel->rescueService2($this->input->post('serviceId'));
            $qtdServicos   = $this->input->post('qtd');
            $listServicos  = $this->input->post('serviceId');
            $vlrServicos   = $helper['produto_valor'];
            $valorTotal    = ((int)$this->input->post('qtd') * (float)$vlrServicos);
            $cart = $this->carrinhomodel->getCarrinho($idTemp);
            $carrinho = array(
                'idTemp'            => $idTemp,
                'listServicosId'    => $listServicos,
                'qtdServicos'       => $qtdServicos,
                'vlrServicos'       => $vlrServicos,
                'valorTotal'        => $valorTotal,
                'desconto'          => null,
                'afiliado'          => $cart['afiliado'],
            );
        }
        $this->carrinhomodel->updateCartUnico($carrinho);
        $this->telaUnica2();
    }
    
    function remove2(){
        $idTemp = $_POST['serviceId'];
        $remove = $_POST['id_remove'];
        $this->carrinhomodel->removeProdut($idTemp, $remove);
        $this->telaUnica2();
    }
    
    public function updateClienteEndereco(){
        $this->load->database();
        $this->load->model('clientes');
        
        $id = $this->input->post('cliente_id');

        $data = explode('/', $this->input->post('nascimento-modal'));
        $date = $data[2] . '-' . $data[1] . '-' . $data[0];
        
        $cliente = array(
            'cliente_telefone'    => $this->limpa($this->input->post('telefone-modal')), 
            'cliente_email'       => mb_strtoupper($this->input->post('email-modal')), 
            'cliente_nascimento'  => $date, 
            'cliente_cep'         => $this->limpa($this->input->post('cep-modal')),  
            'cliente_endereco'    => mb_strtoupper($this->input->post('rua-modal')),  
            'cliente_numero'      => $this->input->post('numero-modal'),  
            'cliente_cidade'      => mb_strtoupper($this->input->post('cidade-modal')),  
            'cliente_bairro'      => mb_strtoupper($this->input->post('bairro-modal')),  
            'cliente_estado'      => mb_strtoupper($this->input->post('estado-modal')),  
            'cliente_complemento' => $this->input->post('complemento-modal'), 
        );
        
        $this->clientes->update($id, $cliente);
        
        $aux = 0;
        
        $this->session->set_userdata('cliente_cep', $this->limpa($this->input->post('cep-modal')));  
        $this->session->set_userdata('finalizado_cart', true);
        
        redirect(base_url('432b311230a5e558d6dfdd37aa7cb986'));
    }
    
    function enviaEmail($dados){
                
        $site = $this->configs->getSite();
        $gestoremail = $this->configs->getEmail(1);
        
	    $cliente = $this->clientes->getClienteById($dados['idClient']);
	    if($cliente['cliente_email']){
	        
	        $servicos = [];
	        $cont = 0;
	        $aux_servicos   = explode('¬', $dados['listServicosId']);
	        $aux_quantidade = explode('¬', $dados['qtdServicos']);
	        $subtotal = 0;
	        
    	    foreach($aux_servicos as $s){
    	        $servico = $this->servicos->get($s);
    	        
    	        $servicos[$cont] = array(
    	            'produto_nome'          => $servico['produto_nome'],    
    	            'produto_subtitulo'     => $servico['produto_subtitulo'],
    	            'produto_quantidade'    => $aux_quantidade[$cont],
    	            'produto_valor'         => number_format($servico['produto_valor'], 2,',','.'),
    	            'produto_total'         => number_format(($aux_quantidade[$cont] * $servico['produto_valor']), 2,',','.') ,
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
    	        'pagamento'             => '', 
        	    'nome'                  => $cliente['cliente_nome'],
    	        'cpf'                   => $this->mask($cliente['cliente_cpf'], '###.###.###-##'),
    	        'fone'                  => $fone,
    	        'status'                => $status,
    	        'servicos'              => $servicos,
    	        'subtotal'              => number_format($dados['valorCompra'],2,',','.'),
    	        'total'                 => number_format($dados['valorCompra'] - $dados['desconto'],2,',','.'),
    	        'detalhes'              => $dados['detalhes'],
    	        'nome_empresa'          => $site['nome_empresa'],
    	        'desconto'              => $dados['desconto'],
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
            
            $this->email->from($gestoremail['email_user'], 'Status do Pedido');
            $this->email->to($cliente['cliente_email']); 
            $this->email->subject($site['nome_empresa']);
            $this->email->message($this->sendemail->mailbody($data));  
            
            $this->email->send();
            $this->email->print_debugger();
	    }
	}
	
	function montexplode($param, $var){
	    if(strpos($var, $param)){
	        $return = explode($param, $var);
	    } elseif($var != null){
            $return[0] =  $var;
        } else {
            $return = [];
        }
        return $return;
	}
}