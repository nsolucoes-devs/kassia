<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logincontroller extends CI_Controller {
    
    public function telaLogin(){
        $this->load->database();
        $this->load->model('configs');
        
        if(array_key_exists('mensagem_erro', $this->session->userdata())){
	        $erro = $this->session->userdata('mensagem_erro');
	        $this->session->unset_userdata('mensagem_erro');
	    }
	    
	    if(array_key_exists('logado', $this->session->userdata())){
            if($_SESSION['logado'] == 1){
                redirect('106a6c241b8797f52e1e77317b96a201','refresh');
            }
	    }
	    
        if(!isset($erro)){
            $erro = 0;
        }
        
        $dados = array(
            'erro' => $erro,
            'chave' => $this->configs->getChave(2)
        );
    
        
        $this->load->view('restrito/login', $dados);
    }
    
    public function validar(){
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('usuarios');
        $this->load->model('logger');
        
        // RETIRA OS DADOS DO FORMULARIO E PREPARA PARA VERIFICAR
        $user = $this->input->post("login");
        $senha = MD5($this->input->post("senha"));
        $url = $this->input->post("url");
        
        
        //DESATIVADO NO MODO DE DESENVOLVIMENTO - SE ESTIVER EM PRODUÇÃO, POR FAVOR INVERTA A CONDIÇÃO DO IF
        // if($this->input->post('g-recaptcha-response')){
            
        // VERIFICA DADOS DO USUARIO NO BANCO
        $login = $this->usuarios->logar($user);
        if($login != null){

            // SE DADOS ESTAO CORRETOS VERIFICA A SENHA
            if($senha == $login['senha_usuario']){

                // VERIFICA SE O USUÁRIO NÃO ESTÁ BLOQUEADO
                if($login['ativo'] != 0){
    
                    $id = $login['id_usuario'];
    
                    if($id != 0){
                        
                        //GERA OS DADOS DA SESSAO E INICIALIZA O COOKIE
                        $sessao = array(
                    	    'logado'        => TRUE,
                    	    'user_id'       => $login['id_usuario'],
                    	    'nome'          => $login['nome_usuario'],
                    	    'perfil'        => $login['perfil'],
                    	    'senha'         => $login['senha_usuario'],
                    	    'super'         => $login['super'],
                    	    'foto'          => $login['foto'],
                        );
                        $this->session->set_userdata($sessao);
                        
                        redirect(base_url('106a6c241b8797f52e1e77317b96a201'));

                    }else{
                        $erro = $this->input->get("erro");
                        $this->telaLogin($erro);
                    }
                }else{
                    // SE ESTIVER BLOQUEADO INFORMA ERRO
                    $this->session->set_userdata('mensagem_erro', 5);
                    redirect(base_url('nsgestst'), 'refresh');
                }
        
            }else{
                
                //ERRO DE SENHA INCORRETA
                $this->session->set_userdata('mensagem_erro', 2);
                redirect(base_url('nsgestst'), 'refresh');
            }
        }else{
            
            //ERRO DE USUÁRIO INCORRETO
            $this->session->set_userdata('mensagem_erro', 1);
            redirect(base_url('nsgestst'), 'refresh');
        }
        
        // } else {
        //     //ERRO DE CAPTCHA NÃO VERIFICADO
        //     $this->session->set_userdata('mensagem_erro', 4);
        //     redirect(base_url('nsgestst'), 'refresh');    
        // }
        
    }
    
    //Função que vai deslogar do painel administrativo e encerrar a sessão
    public function sair(){
        $check = $this->session->userdata('sorteio');
        session_destroy();
        if($check != 0){
            redirect(base_url('nspartnerst'), 'refresh');
        } else {
            redirect(base_url('nsgestst'), 'refresh');    
        }
        
    }
}