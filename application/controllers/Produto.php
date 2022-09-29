<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends CI_Controller {
    
    public function include(){
        $this->load->database();
	    $this->load->model('configs');
	    $this->load->model('produtos');
	    $this->load->model('promocoes');
	    $this->load->model('departamentos');
	   
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
            $boolean = true;
            if($produto['produto_datainicial_promocao'] > date('Y-m-d')){
                $boolean = false;
            }
            if($produto['produto_datafinal_promocao_ativo'] == 1){
                if($produto['produto_datafinal_promocao'] < date('Y-m-d')){
                    $boolean = false;
                }
            }
            if($boolean == true){
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
        }
		
		$array = array(
		    'valor'         => $valor,
		    'porcentagem'   => $porcentagem,
		);
		
		return $array;
    }
        
    public function verProduto(){
        $this->include();
	    
		$site = $this->configs->getSite();
		
		$data['produto'] = $this->produtos->getAtivo($this->uri->segment(2));
		
	    $dadosHeader['idpag']               = 1;
		$dadosHeader['telefonedecontato']   = $site['whats'];
		$dadosHeader['produtos']            = $this->produtos->getAllAtivos();

        $aux_promocao = $this->produtoPromocao($data['produto']);
		
		$id_relacionados = $data['produto']['produto_relacionados'];
		$relacionados = [];
		$cont = 0;
		$aux = explode('¬', $id_relacionados);
		
		foreach($aux as $a){
		    $p = $this->produtos->getAtivo($a);
		    
		    $valor_promocao         = null;
		    $porcentagem_promocao   = null;
		    
		    $produto_promocao       = $this->produtoPromocao($p);
		    $valor_promocao         = $produto_promocao['valor'];
		    $porcentagem_promocao   = $produto_promocao['porcentagem'];
		    
		    if($p){
		        $relacionados[$cont] = array(
    		        'produto_id'            => $p['produto_id'],
    		        'produto_nome'          => $p['produto_nome'],
    		        'produto_valor'         => $p['produto_valor'],
    		        'produto_promocao'      => $valor_promocao,
    		        'produto_porcentagem'   => $porcentagem_promocao,
    		    );
    		    
    		    $cont++;
		    }
		}
		
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
		
		$data['relacionados'] = $relacionados;
		$data['valor']        = $aux_promocao['valor'];
		$data['porcentagem']  = $aux_promocao['porcentagem'];
		$dadosHeader['header'] = $this->departamentos->menuDepts();
	    
	    $this->load->view('recursos/header', $dadosHeader);
	    $this->load->view('produto', $data);
	    $this->load->view('recursos/footer', $dadosFooter);
    }
}