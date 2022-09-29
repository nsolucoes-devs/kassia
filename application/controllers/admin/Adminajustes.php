<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminajustes extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
        date_default_timezone_set('America/Sao_Paulo');
        $this->load->database();
        $this->load->model('correiosmodel');
        $this->load->model('configs');
    }
    
    public function pagamentos(){
        $correios = $this->correiosmodel->dados();
        $gestores = $this->configs->getGestor();
        $dados = array(
            'correios'      => $correios,
            'pagamentos'    => $gestores,
            'chave'         => $this->configs->getChave(1),
            'chave2'        => $this->configs->getChave(2),
            'email'         => $this->configs->getEmail(1),
        );
        
        
        $this->header(6);
        $this->load->view('restrito/configuracoes', $dados);
        $this->footer();
        
    }
    
    public function atualizarCorreios(){
        for($i = 1; $i <= 9;$i++){
            $ceporigem          = $this->input->post('cep' . $i);
            $status             = $this->input->post('status' . $i);
            $contrato           = $this->input->post('contrato' . $i);
            $valor              = $this->input->post('valor' . $i);
            $valor1             = str_replace(".", "", $valor);
            $valor2             = str_replace(",", ".", $valor1);
            $estados            = "";
            $entregaextra       = $this->input->post('entregamais'. $i);
            
            if($i == 8 || $i == 9){
                $cont = 0;

                if(isset($_REQUEST['estados' . $i])){
                    foreach($_REQUEST['estados' . $i] as $e){
                        if($cont == 0){
                            $estados .= $e;    
                        } else {
                            $estados .= '¬' . $e;    
                        }
                        $cont++;
                    }
                }
            }
            
            $correio = array(
                'cepOrigem'         =>  $this->limpa($ceporigem),
                'dadosAtivo'        =>  $status,
                'contratoCorreio'   =>  $contrato,
                'valorMinimo'       =>  $valor2,
                'regiaoGratis'      =>  $estados,
                'dias_entrega_extra'=>  $entregaextra
            );
            
            $this->correiosmodel->update($i, $correio);
        }
        
        redirect(base_url('8fb192af45f75504361d0011c1677415'));
    }
    
    function gestorPG(){
        if($this->input->post('gestor') !== null){
            $gestor                 = $this->input->post('gestor');
        }else{
            $gestor                 = null;
        }
        if($this->input->post('publickey') !== null){
            $gestor_publickey       = $this->input->post('publickey');
        }else{
            $gestor_publickey       = null;
        }
        if($this->input->post('privatekey') !== null){
            $gestor_privatekey      = $this->input->post('privatekey');
        }else{
            $gestor_privatekey      = null;
        }
        if($this->input->post('acesstoken') !== null){
            $gestor_acesstoken      = $this->input->post('acesstoken');
        }else{
            $gestor_acesstoken      = null;
        }
        if($this->input->post('clientid') !== null){
            $gestor_clientid        = $this->input->post('clientid');
        }else{
            $gestor_clientid        = null;
        }
        if($this->input->post('clientsecret') !== null){
            $gestor_clientsecret    = $this->input->post('clientsecret');
        }else{
            $gestor_clientsecret    = null;
        }
        if($this->input->post('emailPag') !== null){
            $gestor_email           = $this->input->post('emailPag');
        }else{
            $gestor_email           = null;
        }
        if($this->input->post('sandboxId') !== null){
            $gestor_sandbox           = "1";
        }else{
            $gestor_sandbox           = "0";
        }

        $dados = array(
            'idgestor'              => 1,
            'gestor'                => $gestor,
            'gestor_publickey'      => $gestor_publickey,
            'gestor_privatekey'     => $gestor_privatekey,
            'gestor_acesstoken'     => $gestor_acesstoken,
            'gestor_clientid'       => $gestor_clientid,
            'gestor_clientsecret'   => $gestor_clientsecret,
            'gestor_email'          => $gestor_email,
            'gestor_sandbox'        => $gestor_sandbox,
        );
        
        $this->configs->gestor($dados);
        redirect('8fb192af45f75504361d0011c1677415');
        
    }
    
    public function chaves(){
        $id = $this->input->post('google-id');
        
        $chave = array(
            'chave_key'     => $this->input->post('google-key'), 
        );
        
        $this->configs->updateChave($id, $chave);
        
        $chave = array(
            'chave_key'     => $this->input->post('google-key2'), 
        );
        
        $this->configs->updateChave(2, $chave);
        
        redirect(base_url('8fb192af45f75504361d0011c1677415'));
    }
    
    public function insertEmail(){
        $email = array (
            'email_protocol' => $this->input->post('email_protocol'),
            'email_user'     => $this->input->post('email_user'),
            'email_pass'     => $this->input->post('email_pass'),
            'email_host'     => $this->input->post('email_host'),
            'email_port'     => $this->input->post('email_port'),
            'email_timeout'  => $this->input->post('email_timeout'),
            'email_charset'  => $this->input->post('email_charset'),
        );
        
        $this->configs->updateEmail(1, $email);
        
        redirect(base_url('8fb192af45f75504361d0011c1677415'));
    }
    
    
}