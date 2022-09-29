<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Areaafiliado extends Public_Controller {
    
    public function __construct(){
        parent::__construct();
        date_default_timezone_set('America/Sao_Paulo');
        $this->load->database();
	    $this->load->model('configs');
	    $this->load->model('clientes');
	    $this->load->model('afiliados');
	    $this->load->model('produtos');
	    $this->load->model('departamentos');
    }
    
    public function entrar(){
        
	    $site = $this->configs->getSite();
	    
	    $dadosHeader = array(
	        'header'                => $this->departamentos->menuDepts(),
            'idpag'                 => 6,
		    'telefonedecontato'     => $site['whats'],
		    'produtos'              => $this->produtos->getAll(),
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
		
		if($this->session->userdata('msg')){
		    $data['msg'] = $this->session->userdata('msg');
		    $this->session->unset_userdata('msg');
		} else {
		    $data['msg'] = null;
		}
		
		$data['chave'] = $this->configs->getChave(1);
		
		if($this->session->userdata('cliente_logado') == true){
		    redirect(base_url('painelAfiliado'));
		} else {
		    $this->load->view('recursos/header', $dadosHeader);
            $this->load->view('loginafi', $data);
            $this->load->view('recursos/footer', $dadosFooter);
		}
    }
    
    public function cadastroAfi(){
        
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
		
		$data['chave'] = $this->configs->getChave(2);
		
		if($this->session->userdata('cliente_logado') == 1){
		    redirect(base_url('painelAfiliado'));
		} else {
		    $this->load->view('recursos/header', $dadosHeader);
            $this->load->view('cadastro', $data);
            $this->load->view('recursos/footer', $dadosFooter);
		}
    }
    
    public function loginAfi(){
        
        $login = $this->limpa($this->input->post('login'));
        $senha = $this->input->post('pass');
        $aux = 0;
        
        if($this->afiliados->getSenhaLogin($login, md5($senha))){
            $afiliado = $this->afiliados->getCPNJ($login);
            
            if($afiliado['afiliado_ativo'] == 0){
                $this->session->set_userdata('msg', 2);
                redirect(base_url('entrarAfiliado'));
            } else {
                $this->session->set_userdata('afiliado_logado', 1);
                $this->session->set_userdata('afiliado_user_id', $afiliado['afiliado_id']);
                $this->session->set_userdata('afiliado_nome', $afiliado['afiliado_nome']);
                if($afiliado['afiliado_cep'] != null){
                    $this->session->set_userdata('afiliado_cep', $afiliado['afiliado_cep']);    
                    } else {
                        $this->session->set_userdata('afiliado_cep', '00000000');    
                    }
                    
                    
                    if($afiliado['afiliado_cep'] == null || $afiliado['afiliado_cep'] == ""){
                        $aux++;
                    } else if($afiliado['afiliado_endereco'] == null || $afiliado['afiliado_endereco'] == ""){
                        $aux++;
                    } else if($afiliado['afiliado_numero'] == null || $afiliado['afiliado_numero'] == ""){
                        $aux++;
                    } else if($afiliado['afiliado_bairro'] == null || $afiliado['afiliado_bairro'] == ""){
                        $aux++;
                    } else if($afiliado['afiliado_cidade'] == null || $afiliado['afiliado_cidade'] == ""){
                        $aux++;
                    } else if($afiliado['afiliado_estado'] == null || $afiliado['afiliado_estado'] == ""){
                        $aux++;
                    } else if($afiliado['afiliado_email'] == null || $afiliado['afiliado_email'] == ""){
                        $aux++;
                    } else if($afiliado['afiliado_nascimento'] == null || $afiliado['afiliado_nascimento'] == ""){
                        $aux++;
                    }
                    
                    if($aux > 0){
                        $this->session->set_userdata('afiliado_sem_endereco', 1);
                    } else {
                        $this->session->set_userdata('afiliado_sem_endereco', 0);
                    }
                    
                    redirect(base_url('painelAfiliado'));
                }
            } else {
                $this->session->set_userdata('msg', 1);
                redirect(base_url('entrarAfiliado'));
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
        $this->load->model('departamentos');
        $this->load->model('comprasmodel');
        $this->load->model('servicos');
	    $site = $this->configs->getSite();
	    
	    $dadosHeader    = array(
            'idpag'               => 6,
		    'telefonedecontato'   => $site['whats'],
		    'conta'               => 1,
		    'header'              => $this->departamentos->menuDepts(),
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
        /*[__ci_last_regenerate] => 1644417476 [logado] => 1 [cliente_logado] => 1 [user_id] => 1 [cliente_nome] => Anderson Moreira [perfil] => afiliado [senha] => bfd59291e825b5f2bbf1eb76569f8fe7 
        */

        if($_SESSION['logado'] == 1){
            $idafi = $this->afiliados->verific($_SESSION['user_id']);
    	    
    	    if($idafi['afiliado_id']) {
    	       $data  = array(
    	            'servicos'   => $this->servicos->getAll(),
    	            'afiliado'   => $this->afiliados->getAfiliadoID($idafi['afiliado_id']),
    	            'cliente'    => $this->afiliados->get($this->session->userdata('user_id')),
    	            'pedidos'    => $this->afiliados->getPedidoView($idafi['afiliado_id']),
    	            'chave'      => $this->configs->getChave(1),    
    	       );
    		   $this->load->view('recursos/header', $dadosHeader);
               $this->load->view('principaluserAfiliado', $data);
               $this->load->view('recursos/footer', $dadosFooter);
    	        
    	    } else {
    		    redirect(base_url('entrarAfiliado'));
    		}
		} else {
		    redirect(base_url('entrarAfiliado'));
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
                    $cliente = array(
                        'cliente_nome'          => mb_strtoupper($this->input->post('nome_cadastro')),    
                        'cliente_cpf'           => $this->limpa($this->input->post('cpf_cadastro')),
                        'cliente_senha'         => md5($senha),
                        'cliente_ativo'         => 1,
                        'cliente_datacadastro'  => date('Y-m-d'),
                    );
                    
                    $id = $this->clientes->insert($cliente);
                    
                    $this->session->set_userdata('cliente_user_id', $id);
                    $this->session->set_userdata('cliente_nome', $this->input->post('nome_cadastro'));
                    $this->session->set_userdata('cliente_logado', 1);
                    $this->session->set_userdata('cliente_sem_endereco', 1);
                }   
            }
        }else{
            $this->session->set_userdata('msg', 7);
        }
        
      redirect(base_url('painelAfiliado'));
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
        
        redirect(base_url('painelAfiliado'));
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
        
        redirect(base_url('painelAfiliado'));
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
        $this->session->unset_userdata('cliente_user_id');
        $this->session->unset_userdata('cliente_logado');
        $this->session->unset_userdata('cliente_nome');
        $this->session->unset_userdata('cliente_cep');
        
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
        
        redirect(base_url('painelAfiliado'));
        
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
        
        $this->email->from($gestoremail['email_user'], 'Email Nsolucoes');
        $this->email->to($email); 
        $this->email->subject($assunto);
        $this->email->message($mailbody);  
        
        $this->email->send();
	}
	
    public function limpa($val){
	    $helper = array(",", ".", "(", ")", "+", "-", " ", "/", "_");
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
	
	function loginAfiliado(){
	    $this->load->model('usuarios');
	    $user = $this->limpa($_POST['login']);
	    $pass = $_POST['pass'];
	    $login = $this->usuarios->afiliadoLogin($user, $pass);
        if($login){
            $sessao = array(
        	    'logado'        => TRUE,
        	    'cliente_logado'=> TRUE,
        	    'user_id'       => $login['afiliado_id'],
        	    'cliente_nome'  => $login['afiliado_nome'],
        	    'perfil'        => 'afiliado',
        	    'senha'         => $login['afiliado_senha'],
            );
            $this->session->set_userdata($sessao);
            redirect(base_url('painelAfiliado'));
        }else{
            $this->session->set_userdata('msg', "Usuário/senha incorreto ou não cadastrado!");

            redirect(base_url('entrarAfiliado'));
        }
	}
	
	function newAfiliado(){
	    $this->load->model('usuarios');
	    $data = array(
	        'afiliado_senha'        => md5($_POST['senha']),
            'afiliado_usuario'      => $this->limpa($_POST['cnpj']),
            'afiliado_cnpj'         => $this->limpa($_POST['cnpj']),
            'afiliado_nome'         => $_POST['nome'], 
            'afiliado_empresa'      => $_POST['empresa'],
            'afiliado_email'        => $_POST['email'],
            'afiliado_telefone'     => $this->limpa($_POST['telefone']),
            'afiliado_cep'          => $this->limpa($_POST['cep']),
            'afiliado_rua'          => $_POST['rua'],
            'afiliado_numero'       => $_POST['numero'],
            'afiliado_complemento'  => $_POST['complemento'],
            'afiliado_bairro'       => $_POST['bairro'],
            'afiliado_cidade'       => $_POST['cidade'],
            'afiliado_estado'       => $_POST['estado'],
            'afiliado_banco'        => $_POST['banco'],
            'afiliado_ativo'        => 0,
            'afiliado_codigo'       => md5($_POST['cnpj']),
	        );
	    $a = $this->usuarios->newAfiliado($data);
	    if(array_key_exists('erro', $a)){
	        $this->session->set_userdata('msg', $a['erro']);
	        redirect(base_url('cadastroAfiliado'));     
	    }else{
	        redirect(base_url('painelAfiliado'));
	    }
	}
    
    public function novoAfiliadoPublico(){

        //if($_POST['g-recaptcha-response']){
            $new = array(
                'afiliado_usuario'      => $this->limpa($_POST['cnpj']),
                'afiliado_senha'        => md5($_POST['senha']),
                'afiliado_empresa'      => $_POST['empresa'],
                'afiliado_codigo'       => md5($_POST['cnpj']),
                'afiliado_cnpj'         => $this->limpa($_POST['cnpj']),
                'afiliado_nome'         => $_POST['nome'],
                'afiliado_email'        => $_POST['email'],
                'afiliado_telefone'     => $this->limpa($_POST['telefone']),
                'afiliado_cep'          => $this->limpa($_POST['cep']),
                'afiliado_rua'          => $_POST['rua'],
                'afiliado_numero'       => $_POST['numero'],
                'afiliado_complemento'  => $_POST['complemento'],
                'afiliado_bairro'       => $_POST['bairro'],
                'afiliado_cidade'       => $_POST['cidade'],
                'afiliado_estado'       => $_POST['estado'],
                'afiliado_banco'        => $_POST['banco'],
                'afiliado_ativo'        => '0',
            );
            $a = $this->afiliados->insert($new);
            redirect(base_url('painelAfiliado'));
        // }else{
        //     redirect(base_url('cadastroAfiliado'));
        // }
    }
    
    function updateAfiliado(){
        $this->load->model('afiliados');
	    $data = $this->afiliados->updateAfiliado($_POST);
	    redirect(base_url('painelAfiliado'));
    }
}