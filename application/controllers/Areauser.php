<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Areauser extends Public_Controller {
    
    public function __construct(){
        parent::__construct();
        date_default_timezone_set('America/Sao_Paulo');
        $this->load->database();
	    $this->load->model('configs');
	    $this->load->model('clientes');
	    $this->load->model('produtos');
	    $this->load->model('departamentos');
    }
    
    public function entrar(){
        
	    $site = $this->configs->getSite();
	    
	    $dadosHeader['header'] = $this->departamentos->menuDepts();
	    
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
	    
        $dadosHeader['idpag']               = 6;
		$dadosHeader['telefonedecontato']   = $site['whats'];
		$dadosHeader['produtos']            = $this->produtos->getAll();
		
		if($this->session->userdata('msg')){
		    $data['msg'] = $this->session->userdata('msg');
		    $this->session->unset_userdata('msg');
		} else {
		    $data['msg'] = null;
		}
		
		$data['chave'] = $this->configs->getChave(1);
		
		if($this->session->userdata('cliente_logado') == 1){
		    redirect(base_url('92e97566397e7d998f610c34726e7a20'));
		} else {
		    $this->load->view('recursos/header', $dadosHeader);
            $this->load->view('login', $data);
            $this->load->view('recursos/footer', $dadosFooter);
		}
    }
    
    public function login(){
        
        $login = $this->limpa($this->input->post('login'));
        $senha = $this->input->post('pass');
        $aux = 0;
        
        if($this->clientes->getSenhaLogin($login, md5($senha))){
            $cliente = $this->clientes->getCPF($login);
            
            if($cliente['cliente_ativo'] == 0){
                $this->session->set_userdata('msg', 2);
                redirect(base_url('entrar'));
            } else {
                $this->session->set_userdata('cliente_logado', 1);
                $this->session->set_userdata('perfil', 'cliente');
                $this->session->set_userdata('cliente_user_id', $cliente['cliente_id']);
                $this->session->set_userdata('cliente_nome', $cliente['cliente_nome']);
                if($cliente['cliente_cep'] != null){
                    $this->session->set_userdata('cliente_cep', $cliente['cliente_cep']);    
                    } else {
                        $this->session->set_userdata('cliente_cep', '00000000');    
                    }
                    
                    
                    if($cliente['cliente_cep'] == null || $cliente['cliente_cep'] == ""){
                        $aux++;
                    } else if($cliente['cliente_endereco'] == null || $cliente['cliente_endereco'] == ""){
                        $aux++;
                    } else if($cliente['cliente_numero'] == null || $cliente['cliente_numero'] == ""){
                        $aux++;
                    } else if($cliente['cliente_bairro'] == null || $cliente['cliente_bairro'] == ""){
                        $aux++;
                    } else if($cliente['cliente_cidade'] == null || $cliente['cliente_cidade'] == ""){
                        $aux++;
                    } else if($cliente['cliente_estado'] == null || $cliente['cliente_estado'] == ""){
                        $aux++;
                    } else if($cliente['cliente_email'] == null || $cliente['cliente_email'] == ""){
                        $aux++;
                    } else if($cliente['cliente_nascimento'] == null || $cliente['cliente_nascimento'] == ""){
                        $aux++;
                    }
                    
                    if($aux > 0){
                        $this->session->set_userdata('cliente_sem_endereco', 1);
                    } else {
                        $this->session->set_userdata('cliente_sem_endereco', 0);
                    }
                    
                    redirect(base_url('92e97566397e7d998f610c34726e7a20'));
                }
            } else {
                $this->session->set_userdata('msg', 1);
                redirect(base_url('entrar'));
            }
    }
    
    public function verPedido(){
        
        $this->load->model('comprasmodel');
        
	    $dadosHeader['header'] = $this->departamentos->menuDepts();
	    
        
        $site = $this->configs->getSite();
        
        $id = $this->input->get_post('id_pedido');
        
        $data['pedido'] = $this->comprasmodel->pedido($id);
        
        
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
	    
        $dadosHeader['idpag']               = 6;
		$dadosHeader['telefonedecontato']   = $site['whats'];
		$dadosHeader['conta']               = 1;
    		
        
        $this->load->view('recursos/header', $dadosHeader);
        $this->load->view('pedido', $data);
        $this->load->view('recursos/footer', $dadosFooter);
    }
    
    public function principal(){
        
        $this->load->model('comprasmodel');
        //$this->load->model('produtos');
	    
	    $dadosHeader['header'] = $this->departamentos->menuDepts();
	    
	    if($this->session->userdata('cliente_logado') == 1){
	        
    	    $data['cliente'] = $this->clientes->get($this->session->userdata('cliente_user_id'));
    	    $data['pedidos'] = $this->comprasmodel->pedidosPublico($this->session->userdata('cliente_user_id'));
    	    $data['chave']   = $this->configs->getChave(1);
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
    	    
            $dadosHeader['idpag']               = 6;
    		$dadosHeader['telefonedecontato']   = $site['whats'];
    		$dadosHeader['conta']               = 1;
    		//$dadosHeader['produtos']            = $this->produtos->getAll();
    		
    		if($this->session->userdata('boleto')){
    		    $dadosHeader['boleto'] = $this->session->userdata('boleto');
    		    $this->session->unset_userdata('boleto');
    		}
    		
    		if($this->session->userdata('msg')){
    		    $data['msg'] = $this->session->userdata('msg');
    		    $this->session->unset_userdata('msg');
    		} else {
    		    $data['msg'] = null;
    		}
		    
		    $this->load->model('departamentos');
	        $dadosHeader['header'] = $this->departamentos->menuDepts();
	    
		
		    $this->load->view('recursos/header', $dadosHeader);
            $this->load->view('principaluser', $data);/*principaluserAfiliado*/
            $this->load->view('recursos/footer', $dadosFooter);
		} else {
		    redirect(base_url('entrar'));
		}
    }
    
    public function insertCliente(){
        $this->load->database();
        $this->load->model('clientes');
        
        $senha = md5($this->input->post('senha_cadastro'));
        $cliente = $this->clientes->getCPF($this->limpa($this->input->post('cpf_cadastro')));
        $nome = $this->input->post('nome_cadastro');
        $senha = $this->input->post('senha_cadastro');
        
        if($nome != null || $nome != ""){
            if($cliente){
                $this->session->set_userdata('msg', 3);
            } else {
                if ($senha == ""){
                     $this->session->set_userdata('msg', 10);
                }else if (strlen ($senha) < 6){
                     $this->session->set_userdata('msg', 8);
                }else{
                    
                    $data = explode('/', $this->input->post('nascimento'));
                    
                    $cliente = array(
                        'cliente_nome'          => mb_strtoupper($this->input->post('nome_cadastro')),    
                        'cliente_cpf'           => $this->limpa($this->input->post('cpf_cadastro')),
                        'cliente_senha'         => md5($senha),
                        'cliente_nascimento'    => $data[2] . '-' . $data[1] . '-' . $data[0],
                        'cliente_email'         => $this->input->post('email'),
                        'cliente_telefone'      => $this->limpa($this->input->post('telefone')),
                        'cliente_genero'        => $this->input->post('genero'),
                        'cliente_cep'           => $this->limpa($this->input->post('cep')),
                        'cliente_endereco'      => $this->input->post('endereco'),
                        'cliente_numero'        => $this->input->post('numero'),
                        'cliente_complemento'   => $this->input->post('complemento'),
                        'cliente_bairro'        => $this->input->post('bairro'),
                        'cliente_cidade'        => $this->input->post('cidade'),
                        'cliente_estado'        => $this->input->post('estado'),
                        'cliente_ativo'         => 1,
                        'cliente_datacadastro'  => date('Y-m-d'),
                    );
                    
                    $id = $this->clientes->insert($cliente);
                    $this->session->set_userdata('cliente_user_id', $id);
                    $this->session->set_userdata('cliente_nome', $this->input->post('nome_cadastro'));
                    $this->session->set_userdata('cliente_logado', 1);
                    $this->session->set_userdata('cliente_sem_endereco', 0);
                }   
            }
        }else{
            $this->session->set_userdata('msg', 7);
        }
        
      redirect(base_url('92e97566397e7d998f610c34726e7a20'));
    }
    
    public function updateClienteDados(){
        
        $this->load->database();
        $this->load->model('clientes');
        
        $id = $this->input->post('id');
        
        $data = explode('/', $this->input->post('nascimento'));
        
        $cliente = array(
          'cliente_nome'        => mb_strtoupper($this->input->post('nome')),  
          'cliente_nascimento'  => $data[2] . '-' . $data[1] . '-' . $data[0],  
          'cliente_email'       => mb_strtoupper($this->input->post('email')),  
          'cliente_telefone'    => $this->limpa($this->input->post('telefone')),  
          'cliente_genero'      => mb_strtoupper($this->input->post('genero')),  
        );
        
        $this->session->set_userdata('cliente_nome', $this->input->post('nome'));
        
        $this->clientes->update($id, $cliente);
        
        $this->session->set_userdata('msg', 1);
        
        redirect(base_url('92e97566397e7d998f610c34726e7a20'));
    }
    
    public function redefinirSenha(){
        $this->load->database();
        $this->load->model('clientes');
        
        $senha = md5($this->input->post('senha_nova'));
        $nova_senha = $this->input->post('senha_nova');
        $id         = $this->input->post('id_redifinir');
        
            
        if (strlen ($nova_senha) >= 6){
            
            $cliente = array(
              'cliente_senha' => $senha,  
            );
            $this->clientes->update($id, $cliente);
        }
        
        $this->session->set_userdata('msg', 3);
        
        redirect(base_url('92e97566397e7d998f610c34726e7a20'));
    }
    
    public function updateClienteEndereco(){
        $this->load->database();
        $this->load->model('clientes');
        
        $id = $this->input->post('id2');
        
        $cliente = array(
          'cliente_cep'         => $this->limpa($this->input->post('cep')),  
          'cliente_endereco'    => mb_strtoupper($this->input->post('endereco')),  
          'cliente_numero'      => $this->input->post('numero'),  
          'cliente_cidade'      => mb_strtoupper($this->input->post('cidade')),  
          'cliente_bairro'      => mb_strtoupper($this->input->post('bairro')),  
          'cliente_estado'      => mb_strtoupper($this->input->post('estado')),  
          'cliente_complemento' => mb_strtoupper($this->input->post('complemento')), 
        );
        
        $this->clientes->update($id, $cliente);
        
        $this->session->set_userdata('msg', 2);
        
        redirect(base_url('conta#endereco'));
    }
    
    public function deslogar(){
        session_destroy();
        redirect(base_url());
    }
    
    public function esquecerSenha(){
        
        $cpf    = $this->limpa($this->input->post('cpf-esquecer'));
        $email  = mb_strtoupper($this->input->post('email-esquecer'));
        
        $cliente = $this->clientes->getCPF($cpf);
        if($cliente){
            if($cliente['cliente_email'] == $email || $cliente['cliente_email'] == mb_strtolower($email)){
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
        
        redirect(base_url('2b1e190210df261675c4b801bc6e8989'));
        
    }
    
    function enviaEsqueceuEmail($dados){
        $this->load->database();
        $this->load->model('configs');
        
        $site = $this->configs->getSite();
        $gestoremail = $this->configs->getEmail(1);
        
	    $data = array(
	        'nome'          => $dados['nome'],
	        'senha'         => $dados['senha'],
	    );
    	   
        $email = $dados['email'];
            
        $config = array(
            'protocol'      => $gestoremail['email_protocol'],
            'smtp_host'     => $gestoremail['email_host'],
            'smtp_port'     => $gestoremail['email_port'],
            'smtp_timeout'  => $gestoremail['email_timeout'],
            'smtp_user'     => $gestoremail['email_user'],
            'smtp_pass'     => $gestoremail['email_pass'],
            'charset'       => $gestoremail['email_charset'],
            'newline'   => "\r\n",  
            'mailtype'  => 'html',    
            'validation'  => true,
        );
        
        $assunto = $site['nome_empresa'] . ' Redefinição de Senha';

        $this->load->library('email');
        $this->load->model('sendemail');
        $mailbody = $this->sendemail->esqueceuSenha($data);

        $this->email->initialize($config);
        
        $this->email->from($gestoremail['email_user'], 'DataCom Informática');
        $this->email->to($email); 
        $this->email->subject($assunto);
        $this->email->message($mailbody);  
        
        $this->email->send();
	}
	
    private function limpa($val){
	    $helper = array(",", ".", "(", ")", "+", "-", " ", "/");
        return str_replace($helper, "", $val);
	}
	
	function afiliados(){
	    $this->load->model('afiliados');
	    $data = $this->afiliados->check($_POST['id']);
	    echo json_encode($data);
	}
	
	function becameAfiliado(){
	    $this->load->model('afiliados');
	    $data = $this->afiliados->cadastraAfiliado($_POST['id']);
	    echo json_encode($data);
	}
	
	function novoAfiliado(){
	    $this->load->model('afiliados');
	    $data = $this->afiliados->novoCadastro($_POST['id']);
	    echo json_encode($data);
	}
	
	function novoProdutoAfiliado(){
	    $this->load->model('afiliados');
	    $data = $this->afiliados->novoProduto($_POST['id']);
	    echo json_encode($data);
	}
	
	function apelidoAfiliado(){
	    $this->load->model('afiliados');
	    $data = $this->afiliados->apelido($_POST);
	    echo json_encode($data);
	}
	
	function addProduto(){
	    $this->load->model('afiliados');
	    $data = $this->afiliados->addProduto($_POST);
	    echo json_encode($data);
	}
}