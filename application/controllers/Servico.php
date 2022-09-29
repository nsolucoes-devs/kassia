<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Servico extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
    
        date_default_timezone_set('America/Sao_Paulo');
        $this->load->database();
	    $this->load->model('configs');
	    $this->load->model('servicos');
	    $this->load->model('promocoes');
	    $this->load->model('afiliados');
    }
    
    public function promocao($servico){
        $valor          = null;
        $porcentagem    = null;
        $local          = null;
        
        $promo = $this->promocoes->promocao($servico['produto_id']);
        
        if($promo['ativo'] == 1){
            if($promo['promocao_cupom_ativo'] == 0){
    		    if($promo['promocao_preco_ativo'] == 1){
    		        $valor = $promo['promocao_preco'];
    		        $porcentagem = 100 - (($promo['promocao_preco'] * 100) / $servico['produto_valor']); 
    		    } else if($promo['promocao_desconto_ativo'] == 1){
    		        $porcentagem = $promo['promocao_desconto'];
    		        $valor = $servico['produto_valor'] - (($promo['promocao_desconto']/100) * $servico['produto_valor']);
    		    }
    		}
            
            if($valor == null){ 
                $boolean = true;
                if($servico['produto_dataInicial'] !== null){
                    if($servico['produto_dataInicial'] > date('Y-m-d')){
                        $boolean = false;
                    }
                }
                if($servico['produto_dataFinalAtivo'] == 1){
                    if($servico['produto_dataFinal'] < date('Y-m-d')){
                        $boolean = false;
                    }
                }
                if($boolean == true){
                    if($servico['produto_cupomAtivo'] == 0){
            		    if($servico['produto_promocaoAtivo'] == 1){
            		        $valor = $servico['produto_promocaoPreco'];
            		        $porcentagem = 100 - (($servico['produto_promocaoPreco'] * 100) / $servico['produto_valor']); 
            		    } else if($servico['produto_descontoAtivo'] == 1){
            		        $desconto = $servico['produto_desconto'];
            		        $porcentagem = $servico['produto_desconto'];
            		        $valor = $servico['produto_valor'] - (($servico['produto_desconto']/100) * $servico['produto_valor']);
            		    }
            		}
                }
            }
            
            if(!empty($promo)){
                
                if($promo['ativo'] == 0){
                    $porcento = $porcentagem;
                    $valor = $valor;
                    $local = 1;
                }elseif($promo['ativo'] == 1){
                    $porcento = $promo['promocao_produtos'];
                    $valor = $promo['promocao_preco'];
                    $local = 2;                
                }elseif($promo['ativo'] == 2){
                    $porcento = $promo['promocao_desconto'];
                    $valor = $promo['promocao_preco'];
                    $local = 3;                
                }elseif($promo['ativo'] == 3){
                    $porcento = $promo['promocao_desconto'];
                    $valor = $promo['promocao_preco'];
                    $local = 4;                
                }else{
                    $porcento = null;
                    $valor = null;
                    $local = 5;                
                }
            }
        		
        		$valor         = $promo['promocao_preco'];
        		$porcentagem   = $porcento;
        		$ativo         = $promo['ativo'];
        		$local         = $local;	    
        }
        
        $array = array(
            'valor'         => $valor,
    	    'porcentagem'   => $porcentagem,
    	    'ativo'         => $promo['ativo'],
    	    'local'         => $local,
	    );
        
		return $array;
    }
    
    public function produtoDesconto($produto){
        /*$this->load->model('carrinhomodel');
        $valornovo['valor'] = $this->carrinhomodel->promocao($produto['produto_id']);
        $valornovo['porcentagem'] = $this->carrinhomodel->desconto($produto['produto_id']);
        return $valornovo;*/
        
        
        $dataatual = date('Y-m-d');
        $valornovo = null;
       // print_r($produto);
        
        if($produto['produto_descontoAtivo'] == 1) {
            if($produto['prodouto_dataInicial'] != "0000-00-00" && $produto['prodouto_dataInicial'] != null && $produto['produto_dataInicial'] != " ") {
                if($produto['prodouto_dataInicial'] <= $dataatual){
                    if($produto['prodouto_dataFinal'] != "0000-00-00" && $produto['prodouto_dataFinal'] != null && $produto['produto_dataFinal'] != " "){
                        if($produto['prodouto_dataFinal'] >= $dataatual){
                            if($produto['prodouto_desconto'] > 0) {
                                $valor          = $produto['produto_valor'];
                                $porcentagem    = $produto['produto_desconto'];
                                $desconto = ($valor * $porcentagem) / 100;
                                $valornovo = $valor - $desconto;
                            }
                        }
                    } else {
                        if($produto['produto_desconto'] > 0) {
                                $valor          = $produto['produto_valor'];
                                $porcentagem    = $produto['produto_desconto'];
                                $desconto = ($valor * $porcentagem) / 100;
                                $valornovo = $valor - $desconto;
                        }
                    }
                } 
            } else {
                if($produto['produto_desconto'] > 0) {
                        $valor          = $produto['produto_valor'];
                        $porcentagem    = $produto['produto_desconto'];
                        $desconto = ($valor * $porcentagem) / 100;
                        $valornovo = $valor - $desconto;
                }
            }
        }
        return $valornovo;
    }    
    
    public function header(){
        
        
        $site = $this->configs->getSite();
        
        $dadosHeader['idpag']               = 1;
		$dadosHeader['telefonedecontato']   = $site['whats'];
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
        
    public function verServico(){

        $servico = $this->servicos->getAtivo($this->uri->segment(2));  
		
		// ALTERADO PARA AFILIADOS EM GET
		//$this->uri->segment(2) => id produto vendido
		//$_GET['afiliado'] => id afiliado
		if(isset($_GET['afiliado'])){
		    $data['afiliado'] = $_GET['afiliado'];
		}
		//FIM ALTERAÇÃO PARA AFILIADOS
		
		if(!$servico){
		    $data['errado'] = "null";
		} else {
		    $data['servico'] = $servico;
		
            $valornovo = $this->produtoDesconto($servico);
            
            if($valornovo != $servico['produto_valor']){
                $data['servico']['valor_desconto'] = $valornovo;
            }
            
            $ramdon = $this->servicos->getRandom();
            $cont=0;
    		foreach($ramdon as $ram){
    		    
    		    if($ram){
    		        $vejatbm[$cont] = array(
        		        'produto_id'            => $ram['produto_id'],
        		        'produto_nome'          => $ram['produto_nome'],
        		        'produto_valor'         => $ram['produto_valor'],
        		        'produto_imagem'        => $ram['produto_imagem1'],
        		        'produto_subtitulo'     => $ram['produto_subtitulo'],
        		        'produto_descontoAtivo' => $ram['produto_descontoAtivo'],
        		        'produto_desconto     ' => $ram['produto_desconto'],
        		        'produto_qtd_parcela'   => $ram['produto_qtd_parcela'],
                		'produto_parcelamento'  => $ram['produto_parcelamento'],
        		    );
        		    
        		   $vejatbm[$cont]['valor_desconto'] = $this->produtoDesconto($ram);
        		   $cont++;
    		    }
    	    }
    	    $data['vejatbm'] = $vejatbm;
    	    
    	    $site = $this->configs->getSite();
    	    $data['email'] = $site['email'];
            
    	    
    	    $this->header();
    	    $this->load->view('servico', $data);
    	    $this->footer();
		}
    }
    
    public function verServico2(){
        
        $servico = $this->servicos->getAtivo($this->uri->segment(2));  
		
		// ALTERADO PARA AFILIADOS
		
		//$this->uri->segment(2) => id produto vendido
		//$this->uri->segment(3) => id afiliado
		//$this->uri->segment(4) => nome afiliado
		
		if($this->uri->segment(3)){
		    $data['afiliado'] = $this->uri->segment(3);
		}
		
		//FIM ALTERAÇÃO PARA AFILIADOS
		
		if(!$servico){
		    $data['errado'] = "null";
		} else {
		    $data['servico'] = $servico;
		    $aux_promocao = $this->promocao($data['servico']);
    		$data['valor']        = $aux_promocao['valor'];
    		$data['porcentagem']  = $aux_promocao['porcentagem'];
		}
	    $site = $this->configs->getSite();
	    $data['email'] = $site['email'];
	    $data['ignora'] = 1;
	    
	    $this->header();
	    $this->load->view('servico', $data);
	    $this->footer();
    }
    
    function buscaServicos(){
        
        
        $this->load->library("pagination");
        
        if($this->input->post('busca') != ""){
            $termo = mb_strtoupper($this->input->post('busca'));
            $this->session->set_userdata('termo', $termo);
        }else{
            $termo = $this->session->userdata('termo');
        }
        
        $site = $this->configs->getSite();
        
        if($this->uri->segment('3')){
            $start = $this->uri->segment('3');
        }else{
            $start = 0;
        }
        $stop = 20;
        
        $servicos = $this->servicos->retrieveBusca($termo, $start, $stop);
        
        $rows = $this->servicos->countBusca($termo);
        
        
        $config = array();
        $config["base_url"] = base_url('servico/buscaServicos/');
        $config["total_rows"] = $rows['count'];
        $config["per_page"] = $stop;
        
        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links();
		
        $cont = 0;
        if(is_array($servicos)){
            foreach($servicos as $prt){
                
                if($prt){
                    
    		        $promo              = $this->promocao($prt);
    		        $valor_promo        = $promo['valor'];
    		        $porcentagem_promo  = $promo['porcentagem'];
    		        
    		        $relacionados[$cont] = array(
    		            'produto_imagem'        => $prt['produto_imagem1'],
        		        'produto_id'            => $prt['produto_id'],
        		        'produto_nome'          => $prt['produto_nome'],
        		        'produto_valor'         => $prt['produto_valor'],
        		        'produto_porcentagem'   => $porcentagem_promo,
        		        'produto_qtd_parcela'   => $prt['produto_qtd_parcela'],
        		        'produto_parcelamento'  => $prt['produto_parcelamento'],
        		    );
        		    
        		    $relacionados[$cont]['valor_desconto'] = $this->produtoDesconto($prt);
        		    $cont++;
        		    
        		    $data['servicos'] = $relacionados;
        		    
        		    $cont++;
    		    }
    		}
    		
        } 
        
        if (!isset($data['servicos'])) {
            $data['servicos'] = null;
        }

	    $this->header();
	    $this->load->view('buscar', $data);
	    $this->footer();
	}
	
	
	function buscaDepartamento($departamento_id){
        
        
        $this->load->library("pagination");
        
        $site = $this->configs->getSite();
        
        if($this->uri->segment('3')){
            $start = $this->uri->segment('3');
        }else{
            $start = 0;
        }
        $stop = 20;
        
        $servicos = $this->servicos->getAllDDepartamento($departamento_id);
        
         $rows = /*$this->servicos->countDepartamento($departamento_id)*/ 8;
        
        
        $config = array();
        $config["base_url"] = base_url('servico/buscaDepartamento/');
        $config["total_rows"] = $rows['count'];
        $config["per_page"] = $stop;
        
        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links();
		
        $cont = 0;
        if(is_array($servicos)){
            foreach($servicos as $prt){
                
                if($prt){
    		        $promo              = $this->promocao($prt);
    		        $valor_promo        = $promo['valor'];
    		        $porcentagem_promo  = $promo['porcentagem'];
    		    
    		        $relacionados[$cont] = array(
    		            'produto_imagem'        => $prt['produto_imagem1'],
        		        'produto_id'            => $prt['produto_id'],
        		        'produto_nome'          => $prt['produto_nome'],
        		        'produto_valor'         => $prt['produto_valor'],
        		        'produto_porcentagem'   => $porcentagem_promo,
        		        'produto_qtd_parcela'   => $prt['produto_qtd_parcela'],
        		        'produto_parcelamento'  => $prt['produto_parcelamento'],
        		    );
        		    
        		    $relacionados[$cont]['valor_desconto'] = $this->produtoDesconto($prt);
        		    $cont++;
        		    $data['servicos'] = $relacionados;
    		    }
    		}
        } 
        
        if (!isset($data['servicos'])) {
            $data['servicos'] = null;
        }
        
        $data['departamentos'] = $this->departamentos->menuDepartamento();
        $data['departamento'] = $this->departamentos->get($departamento_id);

	    $this->header();
	    $this->load->view('departamentos', $data);
	    $this->footer();
	}
	
	public function chamatermo(){
	    $this->load->database();
	    $this->load->model('servicos');
	    $termo = $this->servicos->termo($_POST['termo']);
	    echo json_encode($termo);
	}
	
}