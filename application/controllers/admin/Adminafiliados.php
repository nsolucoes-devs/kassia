<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminafiliados extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
    
        date_default_timezone_set('America/Sao_Paulo');
        $this->load->database();
        $this->load->model('afiliados');
        $this->load->model('servicos');
        $this->load->model('clientes');
        $this->load->model('comprasmodel');
        $this->load->model('configs');
    }
    
    public function afiliados(){
        $data['afiliados'] = $this->afiliados->getAll();
        $this->header(4);
        $this->load->view('restrito/afiliados', $data);
        $this->footer();
    }
    
    public function cadastro(){
        
        
		$this->header(4);
		$this->load->view('restrito/afiliado');
		$this->footer();
	}
	
	public function verAfiliado(){
		$this->header(4);
		$this->load->view('restrito/verafiliado', $this->montarArray());
		$this->footer();
	}
	
	function montarArray(){
	    
	    
	    $afiliado   =  $this->afiliados->get($this->uri->segment(4));
	    $aux        = explode('¬', $afiliado['afiliado_servico']);
	    $aux_por    = explode('¬', $afiliado['afiliado_porcentagem']);
	    $aux_link   = explode('¬', $afiliado['afiliado_link']);
	    
	    $vinculados = $pedidos = [];
	    $cont = $cont2 = 0;
	    
	    
	    foreach($aux as $a){
	        $servico = $this->servicos->get($a);
	        
	        if($servico){
	           $vinculados[$cont] = array(
    	            'id'            =>  $a,
    	            'nome'          =>  $servico['produto_nome'],
    	            'link'          =>  $aux_link[$cont],
    	            'porcentagem'   =>  $aux_por[$cont],
    	        );
    	        $cont++; 
	        }
	    }
	    
	    $array = $this->afiliados->getPedido($afiliado['afiliado_id']);
	    foreach($array as $ar){
	        $cliente = $this->clientes->get($ar['idClient']);
	        $status = $this->comprasmodel->getStatus($ar['statusPagamento']);
	        if($status){
	            $statusNome = $status['nomeStatusCompra'];
	        } else {
	            $statusNome = "Não encontrado";    
	        }
	        
	        $pedidos[$cont2] = array(
	            'id'        => $ar['idcompra'],
	            'nome'      => ucwords(strtolower($cliente['cliente_nome'])),
	            'total'     => 'R$' . number_format($ar['valorCompra'],2,',','.'),
	            'data'      => date('d/m/Y H:i', strtotime($ar['dataCompra'])),
	            'status'    => $statusNome,
	        );
	        $cont2++;
	    }
	    
	    $data = array(
	        'afiliado'      =>  $afiliado,
	        'vinculados'    =>  $vinculados,
	        'servicos'      =>  $this->servicos->getAll(),
	        'pedidos'       =>  $pedidos,
	    );
	    
	    return $data;
	}
	
	public function edita($id){
		
		$data['afiliado'] = $this->afiliados->getAfiliadoID($id);
		$data['pedidos'] = $this->afiliados->getPedidoView($id);
        $data['servicos'] = $this->servicos->getAllLista();
		
		$this->header(4);
		$this->load->view('restrito/editaafiliado', $data);
		$this->footer();
	}
	
	public function novoAfiliado(){
        
        $new = array(
            'afiliado_cnpj'         => $this->limpa($this->input->post('cnpj')),
            'afiliado_nome'         => $this->input->post('nome'),
            'afiliado_email'        => $this->input->post('email'),
            'afiliado_comissao'     => $this->input->post('comissao'),
            'afiliado_telefone'     => $this->limpa($this->input->post('telefone')),
            'afiliado_cep'          => $this->limpa($this->input->post('cep')),
            'afiliado_rua'          => $this->input->post('rua'),
            'afiliado_numero'       => $this->input->post('numero'),
            'afiliado_complemento'  => $this->input->post('complemento'),
            'afiliado_bairro'       => $this->input->post('bairro'),
            'afiliado_cidade'       => $this->input->post('cidade'),
            'afiliado_estado'       => $this->input->post('estado'),
            'afiliado_banco'        => $this->input->post('banco'),
            'afiliado_ativo'        => '1',
        );
        
        $this->afiliados->insert($new);
        
        $this->session->set_userdata('alert', 1);
        
        
        
        redirect(base_url('admin/adminafiliados/afiliados'));
    }
    
    
    
    public function updateAfiliado(){
        
        
        $new = array(
            'afiliado_comissao'     => $this->input->post('comissao'),
            'afiliado_produtos'     => $this->input->post('servicoVinculo'),
            
            /*'afiliado_cnpj'         => $this->limpa($this->input->post('cnpj')),
            'afiliado_rua'          => $this->input->post('rua'),
            'afiliado_numero'       => $this->input->post('numero'),
            'afiliado_complemento'  => $this->input->post('complemento'),
            'afiliado_bairro'       => $this->input->post('bairro'),
            'afiliado_cidade'       => $this->input->post('cidade'),
            'afiliado_estado'       => $this->input->post('estado'),
            'afiliado_banco'        => $this->input->post('banco'),
            'afiliado_nome'         => $this->input->post('nome'),
            'afiliado_email'        => $this->input->post('email'),
            'afiliado_telefone'     => $this->limpa($this->input->post('telefone')),
            'afiliado_cep'          => $this->limpa($this->input->post('cep')),
            'afiliado_porcentagem'  => $this->input->post('porcentagemVinculo'),    
            'afiliado_link'         => $this->input->post('linkVinculo'),*/
        );
        
        $this->afiliados->update($this->input->post('id'), $new);
        
        $this->session->set_userdata('alert', 2);
        
        redirect(base_url('admin/adminafiliados/afiliados'));
    }
    
    public function relatorio(){
        
        $data['pedidos'] = $this->comprasmodel->relatorioPedidosAfiliados($this->input->get('id'), $this->input->get('data_inicio'), $this->input->get('data_fim'));
        
        $data['configs']    = $this->configs->getSite();
        
        $this->load->view('restrito/relatorios/pedidosintetico', $data);
    }
    
    public function excluirProduto(){
	    
	    $id = 2;
	    $produto = 61;
	    
	   $this->afiliados->excluirProduto($id ,$produto);    
	    
	   //redirect(base_url('admin/adminafiliados/afiliados'), 'refresh');
	}
    
    
    public function excluirAfiliado(){
	    
	    $id = $this->input->post('id');
	    $senha = md5($this->input->post('senha'));
	    
	    if($senha == $this->session->userdata('senha')){
	        $this->session->set_userdata('alert', 3);
	        
	        $this->afiliados->delete($id);    
	    } else {
	        $this->session->set_userdata('alert', 4);
	    }
	    
	    redirect(base_url('admin/adminafiliados/afiliados'), 'refresh');
	}
    
    function afiliadoAtivo(){
        $id = $this->input->post_get('id');
        $step = $this->input->post_get('step');

        $this->afiliados->afiliadoAtivo($id, $step);
        $feedback = array(
            'title' => 'Sucesso',
            'msg' => 'Afiliado ',
            'type' => 'success',
        );
        if($step == 1) 
            $feedback['msg'] .= 'aprovado com sucesso';
        else if($step == 2) 
            $feedback['msg'] .= 'reprovado com sucesso'; 

        echo json_encode($feedback);          
    }        
}