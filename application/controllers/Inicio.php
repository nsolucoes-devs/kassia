<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends Public_Controller {
    
	public function aguarde(){
	    $this->load->view('aguarde');
	}
	
	public function errorPage(){
	    $this->output->set_status_header('404');
	    $this->load->view('errorPage');
	}
	
	public function resgataCEP(){
	    $this->load->database();
	    $this->load->model('clientes');
	    
	    $cep = $this->clientes->getCEP($this->input->post('cep'));
	    
	    echo json_encode($cep);
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
    
    public function produtoDesconto($produto){
        
        $dataatual = date('Y-m-d');
        $valornovo = null;
        
        if($produto['produto_descontoAtivo'] == 1) {
            if($produto['produto_dataInicial'] != "0000-00-00" && $produto['produto_dataInicial'] != null && $produto['produto_dataInicial'] != " ") {
                if($produto['produto_dataInicial'] <= $dataatual){
                    if($produto['produto_dataFinal'] != "0000-00-00" && $produto['produto_dataFinal'] != null && $produto['produto_dataFinal'] != " "){
                        if($produto['produto_dataFinal'] >= $dataatual){
                            if($produto['produto_desconto'] > 0) {
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

	//Função que leva para a página inicial
	public function index(){
	    $this->load->database();
	    $this->load->model('configs');
	    $this->load->model('produtos');
	    $this->load->model('promocoes');
	    $this->load->model('servicos');
	    $this->load->model('departamentos');
	    $this->load->model('perguntas');
	    $this->load->model('depoimentos');
	    
	    $this->acesso();
	    
		$site = $this->configs->getSite();
	 
	    $dadosHeader['idpag']               = 1;
		$dadosHeader['telefonedecontato']   = $site['whats'];
		$dadosHeader['home']                = 1;
		
		$produtos_array  = $this->servicos->getAllSimplificado();
		$cont            = 0;
		$produtos        = [];
		
		$destaques = $produtos = $produtos2 = $vejatbm = [];
		
		foreach(array_reverse($produtos_array) as $p){
		    if($cont < 12){
    		    $valor_promocao         = null;
    		    $porcentagem_promocao   = null;
    		    
    		    if($p){
    		        $produtos[$cont] = array(
        		        'produto_id'            => $p['produto_id'],
        		        'produto_nome'          => $p['produto_nome'],
        		        'produto_valor'         => $p['produto_valor'],
        		        'produto_imagem'        => $p['produto_imagem1'],
        		        'produto_resumo'        => $p['produto_resumo'],
        		        'produto_subtitulo'     => $p['produto_subtitulo'],
        		        'produto_descontoAtivo' => $p['produto_descontoAtivo'],
        		        'produto_desconto     ' => $p['produto_desconto'],
        		        'produto_qtd_parcela'   => $p['produto_qtd_parcela'],
            		    'produto_parcelamento'  => $p['produto_parcelamento'],
        		    );
        		    
                    $valornovo = $this->produtoDesconto($p);
                    $produtos[$cont]['produto_promocao'] = $valornovo;
                        
        		    $cont++;
    		    }
		    }
		}
		
		$cont = 0;
		
		foreach($produtos_array as $p2){
		    if($cont < 6){
    		    $valor_promocao         = null;
    		    $porcentagem_promocao   = null;
    		    
    		    //$produto_promocao       = $this->produtoPromocao($p2);
    		    //$valor_promocao         = $produto_promocao['valor'];
    		    //$porcentagem_promocao   = $produto_promocao['porcentagem'];
    		    
    		    if($p2){
    		        $produtos2[$cont] = array(
        		        'produto_id'            => $p2['produto_id'],
        		        'produto_nome'          => $p2['produto_nome'],
        		        'produto_valor'         => $p2['produto_valor'],
        		        'produto_imagem'        => $p2['produto_imagem1'],
        		        'produto_resumo'        => $p2['produto_resumo'],
        		        'produto_subtitulo'     => $p2['produto_subtitulo'],
        		        'produto_descontoAtivo' => $p2['produto_descontoAtivo'],
        		        'produto_desconto     ' => $p2['produto_desconto'],
        		        'produto_qtd_parcela'   => $p2['produto_qtd_parcela'],
            		    'produto_parcelamento'  => $p2['produto_parcelamento'],
        		        //'produto_promocao'      => $valor_promocao,
        		        //'produto_porcentagem'   => $porcentagem_promocao,
        		    );
        		    
        		    
        		    if($p2['produto_descontoAtivo'] == 1) {
                            $valornovo = $this->produtoDesconto($p2);
                            $produtos2[$cont]['produto_promocao'] = $valornovo;
                    } else {
                        $produtos2[$cont]['produto_promocao'] = null;
                    }
        		    $cont++;
    		    }
		    }
		}
		
		
		$produtos_destaque  = $this->servicos->getAllDestaques();
		$cont            = 0;
		$destaques        = [];
		
		foreach($produtos_destaque as $d){
		    if($cont < 20){
    		    $valor_promocao         = null;
    		    $porcentagem_promocao   = null;
    		    
    		    //$produto_promocao       = $this->produtoPromocao($d);
    		    //$valor_promocao         = $produto_promocao['valor'];
    		    //$porcentagem_promocao   = $produto_promocao['porcentagem'];
    		    
    		    if($d){
    		        $destaques[$cont] = array(
        		        'produto_id'            => $d['produto_id'],
        		        'produto_nome'          => $d['produto_nome'],
        		        'produto_valor'         => $d['produto_valor'],
        		        'produto_imagem'        => $d['produto_imagem1'],
        		        'produto_subtitulo'     => $d['produto_subtitulo'],
        		        'produto_descontoAtivo' => $d['produto_descontoAtivo'],
        		        'produto_desconto     ' => $d['produto_desconto'],
        		        'produto_qtd_parcela'   => $d['produto_qtd_parcela'],
            		    'produto_parcelamento'  => $d['produto_parcelamento'],
        		        //'produto_promocao'      => $valor_promocao,
        		        //'produto_porcentagem'   => $porcentagem_promocao,
        		    );
        		    
        		    if($d['produto_descontoAtivo'] == 1) {
                            $valornovo = $this->produtoDesconto($d);
                            $destaques[$cont]['produto_promocao'] = $valornovo;
                    } else {
                        $destaques[$cont]['produto_promocao'] = null;
                    }
                    
        		    $cont++;
    		    }
		    }
		}

		
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
		
		$data['departamentos']  = $this->departamentos->getAllCarousel();
 		// $dadosHeader['departamentos']  = $this->departamentos->getAll();
		
		$ramdon = $this->servicos->getRandom();
		
		
		foreach($ramdon as $ram){
		    if($ram){
		        $vejatbm[$cont] = array(
					'produto_id'            => $d['produto_id'],
					'produto_nome'          => $d['produto_nome'],
					'produto_valor'         => $d['produto_valor'],
					'produto_imagem'        => $d['produto_imagem1'],
					'produto_subtitulo'     => $d['produto_subtitulo'],
					'produto_descontoAtivo' => $d['produto_descontoAtivo'],
					'produto_desconto     ' => $d['produto_desconto'],
					'produto_qtd_parcela'   => $d['produto_qtd_parcela'],
					'produto_parcelamento'  => $d['produto_parcelamento'],
					//'produto_promocao'      => $valor_promocao,
					//'produto_porcentagem'   => $porcentagem_promocao,
    		    );
    		    
    		    if($ram['produto_descontoAtivo'] == 1) {
                        $valornovo = $this->produtoDesconto($ram);
                        $vejatbm[$cont]['produto_promocao'] = $valornovo;
                        
                } else {
                    $vejatbm[$cont]['produto_promocao'] = null;
                }
    		    $cont++;
		    }
	    }
		
		$perguntas = $this->perguntas->getAll();
		
		$accordionM = [];
		$accordion1 = [];
		$accordion2 = [];
		
		for ($aux = 0;$aux < count($perguntas) ;$aux++ ) {
		    
		    if ($perguntas[$aux]['pergunta_titulo']) {
		        
    		    if(($aux % 2) == 0 ) {
    		        
    		        $accordion1[$aux] = $perguntas[$aux];
    		    } else {
    		        
    		        $accordion2[$aux] = $perguntas[$aux];
    		    }
    		    
    		    $accordionM[$aux] = $perguntas[$aux];
		    }
		}
		
		
		$data['accordion1']     = $accordion1;
		$data['accordion2']     = $accordion2;
		$data['accordionM']     = $accordionM;
		
		$data['destaques']      = $destaques;
		$data['produtos']       = $produtos;
		$data['produtos2']      = $produtos2;
		$data['vejatbm']        = $vejatbm;
		$data['site']           = $this->configs->getSite();
		$data['depoimentos']    = $this->depoimentos->getAllView();
		
		
		$dadosHeader['header']  = $this->departamentos->menuDepts();
       
	    $this->load->view('recursos/header', $dadosHeader);
	    $this->load->view('index', $data);
	    $this->load->view('recursos/footer', $dadosFooter);
	}
	
	public function cadastrar(){
        $this->load->database();
        $this->load->model('ebook');
        
        $new = array(
            'ce_nome'         => $this->input->post('nome'),
            'ce_email'        => $this->input->post('email'),
        );
        
        $this->ebook->insert($new);
        
        $this->session->set_userdata('ebook_solicitado', 1);
        
        redirect(base_url());
    }
	
	public function contato(){
	    $this->load->database();
	    $this->load->model('configs');
	    $this->load->model('produtos');
	    $this->load->model('departamentos');
	    
	    
		$dadosHeader['header'] = $this->departamentos->menuDepts();
	    
		$site = $this->configs->getSite();
	 
	    $dadosHeader['idpag']               = 1;
		$dadosHeader['telefonedecontato']   = $site['whats'];
		$dadosHeader['home']                = 1;
		$dadosHeader['produtos']            = $this->produtos->getAll();
		
		$data = array(
		    'facebook'              => $site['facebook'],
		    'instagram'             => $site['instagram'],
		    'linkedin'              => $site['linkedin'],
		    'twitter'               => $site['twitter'],
		    'endereco'              => $site['endereco'],
		    'email'                 => $site['email'],
		    'whats'                 => $site['whats'],
		    'telefone'              => $site['telefone'],
		    'nome_empresa'          => $site['nome_empresa'],
		    'cnpj'                  => $site['cnpj'],
		    'chave'                 => $this->configs->getChave(1),
		);
		
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
		
		if ($this->session->userdata('mensagem_contato')){
		    $data['mensagem_contato'] = $this->session->userdata('mensagem_contato');
		    $this->session->unset_userdata('mensagem_contato');
		}else{
		    $data['mensagem_contato'] = null;
		}
	    
	    $this->load->view('recursos/header', $dadosHeader);
	    $this->load->view('contato', $data);
	    $this->load->view('recursos/footer', $dadosFooter);
	}
    
    public function acesso(){
        $this->load->database();
        $this->load->model('acessomodel');
        
        
        date_default_timezone_set('America/Sao_Paulo');
        
        $ano    =   date('Y');
        $mes    =   date('m');
        $dia    =   date('d');
        $hora   =   date('H');
        $min    =   date('i');
        
        $id = $ano . $mes . $dia . $hora;
        
        $acesso = $this->acessomodel->get($id);
        
        if($acesso != null){
            if($acesso['min_'.$min] == null){
                $acesso['min_'.$min] = 1;
            } else {
                $acesso['min_'.$min]    =  $acesso['min_'.$min] + 1;    
            }
            $acesso['dia']          = $acesso['dia'] + 1;
            $acesso['hora']         = $acesso['hora'] + 1;
            
            $this->acessomodel->update($id, $acesso);
        } else {
            $acesso = array(
                'acesso_id' => $id,
                'dia'       => 1,
                'hora'      => 1,
                'min_'.$min => 1,
            );
            $this->acessomodel->insert($acesso);
        }
    }
    
    public function solicitaReembolso(){
        $this->load->database();
        $this->load->model('cadastrosmodel');
        date_default_timezone_set('America/Sao_Paulo');
        
        $titulo         = $this->upload('titulo', $this->input->post('cpf'));
        $comprovante    = $this->upload('comprovante', $this->input->post('cpf'));
        $cupom          = $this->upload('cupom', $this->input->post('cpf'));
        
        $data = array(
            'reembolso_data'            => date('Y-m-d'),
            'reembolso_nome'            => $this->input->post('nome'),
            'reembolso_cpf'             => $this->limpa($this->input->post('cpf')),
            'reembolso_rg'              => $this->input->post('rg'),
            'reembolso_nascimento'      => $this->input->post('nascimento'),
            'reembolso_titulo'          => $titulo,
            'reembolso_nomemae'         => $this->input->post('nome_mae'),
            'reembolso_datamae'         => $this->input->post('data_mae'),
            'reembolso_nomepai'         => $this->input->post('nome_pai'),
            'reembolso_datapai'         => $this->input->post('data_pai'),
            'reembolso_rua'             => $this->input->post('rua'),
            'reembolso_numero'          => $this->input->post('numero'),
            'reembolso_bairro'          => $this->input->post('bairro'),
            'reembolso_complemento'     => $this->input->post('complemento'),
            'reembolso_cep'             => $this->limpa($this->input->post('cep')),
            'reembolso_cidade'          => $this->input->post('cidade'),
            'reembolso_uf'              => $this->input->post('uf'),
            'reembolso_comprovante'     => $comprovante,
            'reembolso_email'           => $this->input->post('email'),
            'reembolso_telefone'        => $this->limpa($this->input->post('telefone')),
            'reembolso_celular'         => $this->limpa($this->input->post('celular')),
            'reembolso_codigo'          => $this->input->post('codigo'),
            'reembolso_datacompra'      => $this->input->post('data_compra'),
            'reembolso_quantidade'      => $this->input->post('quantidade'),
            'reembolso_valortotal'      => str_replace('.', ',', str_replace('.', '', $this->input->post('valor_total'))),
            'reembolso_pedido_id'       => $this->input->post('id_pedido'),
            'reembolso_cupom'           => $cupom,
            'reembolso_banco'           => $this->input->post('banco'),
            'reembolso_agencia'         => $this->input->post('agencia'),
            'reembolso_conta'           => $this->input->post('conta'),
            'reembolso_digito'          => $this->input->post('digito'),
            'reembolso_status'          => '1',
            'reembolso_motivo'          => $this->input->post('motivo'),
        );
        
        $id = $this->cadastrosmodel->reembolso($data);
        
        $historico_devolucao = array(
            'historico_data'        =>  date('Y-m-d'),
            'historico_hora'        =>  date('H:i'),
            'historico_pedido_id'   =>  $this->input->post('id_pedido'),
            'historico_comentario'  =>  'Sua solicitacão será analisada, aguarde por favor',
            'historico_status'      =>  1,
            'historico_reembolso_id'=>  $id,
        );
        
        $this->cadastrosmodel->insertHistoricoDevolucao($historico_devolucao);
        
        $data['reembolso_protocolo'] = sprintf("%'015d", date('Ymd').$id);
        
        $this->cadastrosmodel->editReembolso($data, $id);
        
        /* FUNÇÃO DE E-MAIL */
        
        redirect($this->input->post('callback'));
    }
    
    function upload($file, $filename){
        $config['upload_path']          = 'imagens/reembolso/';
        $config['allowed_types']        = '*';
        $config['file_name']            = preg_replace('/[^0-9]/', '', $filename);
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload($file)){
                $error = array('error' => $this->upload->display_errors());
        }else{
                $data = array('upload_data' => $this->upload->data());
                return 'imagens/reembolso/'.$data['upload_data']['file_name'];
        }
    }

	private function limpa($val){
	    $helper = array(",", ".", "(", ")", "+", "-", " ", "/");
        return str_replace($helper, "", $val);
	}
	
	private function mask($val, $mask){
        $maskared = '';
        $k = 0;
        for($i = 0; $i<=strlen($mask)-1; $i++) {
            if($mask[$i] == '#') {
                if(isset($val[$k]))
                $maskared .= $val[$k++];
            } else {
                if(isset($mask[$i]))  
                $maskared .= $mask[$i];
            }
        }
        return $maskared;
    }
    
    function enviaEmail(){
        $this->load->database();
        $this->load->model('configs');
        $gestoremail = $this->configs->getEmail(1);
        
        $site = $this->configs->getSite();
        
        $nome = $this->input->post('name');
        $emailcliente = $this->input->post('email');
        $mensagem = $this->input->post('message');
    	    
    	$dados = array(
    	    "nome"    => $nome,
    	    "email"   => $emailcliente,
    	    "message" => $mensagem,
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
 	
        $this->load->library('email');
        $this->load->model("sendemail");
        $mailbody = $this->sendemail->contatos($dados);

        $this->email->initialize($config);
        
        $this->email->from($gestoremail['email_user'], 'Email contato');
        $this->email->to($gestoremail['email_user']); 
        $this->email->subject($assunto);
        $this->email->message($mailbody);  
        
        $this->email->send();
        $this->email->print_debugger();
        
        $this->session->set_userdata('mensagem_contato', 1);
        
        redirect(base_url('inicio/contato'));
    }
    
}
