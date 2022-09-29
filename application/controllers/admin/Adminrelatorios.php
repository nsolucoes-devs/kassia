<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminrelatorios extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
        
        $this->load->database();
        $this->load->model('comprasmodel');
        $this->load->model('produtos');
        $this->load->model('carrinhomodel');
        $this->load->model('configs');
        $this->load->model('clientes');
        $this->load->model('correiosmodel');
        $this->load->model('servicos');
    }
    
    public function relatorios(){
        $this->load->model('formaspagamento');
        
        $data['servicos'] = $this->servicos->getAll();
        $data['clientes'] = $this->clientes->getAll();
        $data['estados']  = $this->configs->getEstados();
        $data['status']   = $this->configs->getstatuscompras();
        
        $this->header(4);
        $this->load->view('restrito/relatorio', $data);
        $this->footer();
    }
    
    public function gerarRelatorioPedidos(){
        
        if($_POST['filtro-pedido']){
            $pedido = $_POST['filtro-pedido'];
        } else {
            $pedido = "";
        }
        if($_POST['cliente']){
            $cliente = $_POST['cliente'];
        } else {
            $cliente = "";
        }
        if($_POST['produto']){
            $produto = $_POST['produto'];
        } else {
            $produto = "";
        }
        if($_POST['datainicio']){
            $datainicio = date('Y-m-d H:i', strtotime($_POST['datainicio']));
        } else {
            $datainicio = date('Y-m-d 00:00');
        }
        if($_POST['datafim']){
            $datafim = date('Y-m-d H:i', strtotime($_POST['datafim']));
        } else {
            $datafim = date('Y-m-d 23:59');
        }
        if($_POST['status']){
            $status = $_POST['status'];
        } else {
            $status = "";
        }
        if($_POST['forma_pagamento']){
            $forma_pagamento = $_POST['forma_pagamento'];
        } else {
            $forma_pagamento = "";
        }
        
        if($_POST['estado']){
            $estado = $_POST['estado'];
        } else {
            $estado = "";
        }
        
        $filtros = array(
            'filtro-pedido'     => $pedido,
            'cliente'           => $cliente,
            'produto'           => $produto,
            'datainicio'        => $datainicio,
            'datafim'           => $datafim,
            'status'            => $status,
            'forma_pagamento'   => $forma_pagamento,
            'estado'            => $estado,
        );
        
        $this->RelatorioPedidos($filtros);
    }
    
    public function RelatorioPedidos($filtros){
        
        $result = $this->comprasmodel->relatorioPedidosDetalhado($filtros);
        
        if($result){
            $data['result'] = $result;
        } else {
            $data['result'] = null;
        }
        
        $filtro_data = null;
        if($filtros['datainicio']){
            $datainicio = date('d/m/Y', strtotime($filtros['datainicio']));
            $filtro_data .= "Data Inicio: ". $datainicio;
        } else {
            $datainicio = null;
        }
        
        if($filtros['datafim']){
            $datafim = date('d/m/Y', strtotime($filtros['datafim']));
            $filtro_data .= " Data Fim: ".  $datafim;
        } else {
            $datafim = null;
        }
        
        if($filtros['status'] != null || $filtros['status'] != ""){
            $status = $this->carrinhomodel->getStatus($filtros['status']);    
        } else {
            $status = null;
        }
        
        $data['filtros'] = array(
            'filtro_data'        =>  $filtro_data,
            'status'            =>  $status,
        );
        $data['configs']    = $this->configs->getSite();
        
        $this->load->view('restrito/relatorios/pedidosdetalhado', $data);
    }
    
    public function gerarRelatorioProdutos(){
        if($this->input->post('filtro-pedido2') == 's'){
            if($this->input->post('datainicio2')){
                $datainicio = $this->input->post('datainicio2');
                $datainicio = $datainicio . ' 00:00:00';
            } else {
                $datainicio = null;
            }
            
            if($this->input->post('datafim2')){
                $datafim = $this->input->post('datafim2');
                $datafim = $datafim . ' 23:59:59';
            } else {
                $datafim = null;
            }
            
            $filtros = array(
                'estado'                => $this->input->post('estado2'),
                'produto'               => $this->input->post('produto2'),    
                'datainicio'            => $datainicio,
                'datafim'               => $datafim,
                'status'                => $this->input->post('status2'),
                'forma_pagamento'       => $this->input->post('forma_pagamento2'),
            );
            
            $this->vendasprodutoFiltros($filtros);
        } else {
            $this->vendasproduto();    
        }
    }
    
    public function gerarRelatorioPedidosSintetico(){
        if($this->input->post('filtro-pedido3') == 's'){
            if($this->input->post('datainicio3')){
                $datainicio = $this->input->post('datainicio3');
                $datainicio = $datainicio . ' 00:00:00';
            } else {
                $datainicio = null;
            }
            
            if($this->input->post('datafim3')){
                $datafim = $this->input->post('datafim3');
                $datafim = $datafim . ' 23:59:59';
            } else {
                $datafim = null;
            }
            
            $filtros = array(
                'estado'                => $this->input->post('estado3'),
                'datainicio'            => $datainicio,
                'datafim'               => $datafim,
                'status'                => $this->input->post('status3'),
                'forma_pagamento'       => $this->input->post('forma_pagamento3'),
            );
            
            $this->pedidoSinteticoFiltros($filtros);
        } else {
            $this->pedidoSintetico();    
        }
    }
    
    public function gerarRelatorioClienteSintetico(){
        if($this->input->post('filtro-pedido5') == 's'){
            if($this->input->post('datainicio5')){
                $datainicio = $this->input->post('datainicio5');
                $datainicio = $datainicio . ' 00:00:00';
            } else {
                $datainicio = null;
            }
            
            if($this->input->post('datafim5')){
                $datafim = $this->input->post('datafim5');
                $datafim = $datafim . ' 23:59:59';
            } else {
                $datafim = null;
            }
            
            $filtros = array(
                'estado'                => $this->input->post('estado5'),
                'datainicio'            => $datainicio,
                'datafim'               => $datafim,
            );
            
            $this->clienteSinteticoFiltros($filtros);
        } else {
            $this->clienteSintetico();    
        }
    }
    
    public function gerarRelatorioClientes(){
        echo 'O que deve mostrar nesse relatório?';
    }
    
    public function gerarRelatorioFrete(){
        if($this->input->post('filtro-pedido6') == 's'){
            if($this->input->post('datainicio6')){
                $datainicio = $this->input->post('datainicio6');
                $datainicio = $datainicio . ' 00:00:00';
            } else {
                $datainicio = null;
            }
            
            if($this->input->post('datafim6')){
                $datafim = $this->input->post('datafim6');
                $datafim = $datafim . ' 23:59:59';
            } else {
                $datafim = null;
            }
            
            $filtros = array(
                'datainicio'            => $datainicio,
                'datafim'               => $datafim,
            );
            
            $this->freteFiltros($filtros);
        } else {
            $this->frete();    
        }
    }
    
    public function frete(){
        
        
        $data['fretes']    = $this->correiosmodel->relatorioFrete();
        $data['configs']    = $this->configs->getSite();
        
        $this->load->view('restrito/relatorios/frete', $data);
    }
    
    public function freteFiltros($filtros){
        
        
        $data['fretes'] = $this->correiosmodel->relatorioFreteFiltros($filtros);
        
        if($filtros['datainicio']){
            $datainicio = date('d/m/Y', strtotime($filtros['datainicio']));
        } else {
            $datainicio = null;
        }
        
        if($filtros['datafim']){
            $datafim = date('d/m/Y', strtotime($filtros['datafim']));
        } else {
            $datafim = null;
        }
        
        $data['filtros']    = array(
            'datainicio'        =>  $datainicio,
            'datafim'           =>  $datafim,
        );
        
        $data['configs']    = $this->configs->getSite();
        
        $this->load->view('restrito/relatorios/frete', $data);
    }
    
    public function clienteDetalhado(){
        
        
        $data['clientes']   = $this->clientes->relatorioClientesDetalhado();
        $data['configs']    = $this->configs->getSite();
        
        $this->load->view('restrito/relatorios/clientedetalhado', $data);
    }
    
    public function clienteDetalhadoFiltros($filtros){
        
        
        $data['clientes']    = $this->clientes->relatorioClientesDetalhadoFiltros($filtros);
        
        if($filtros['datainicio']){
            $datainicio = date('d/m/Y', strtotime($filtros['datainicio']));
        } else {
            $datainicio = null;
        }
        
        if($filtros['datafim']){
            $datafim = date('d/m/Y', strtotime($filtros['datafim']));
        } else {
            $datafim = null;
        }
        
        if($filtros['status'] != null || $filtros['status'] != ""){
            $status = $this->carrinhomodel->getStatus($filtros['status']);    
        } else {
            $status = null;
        }
        
        $data['filtros']    = array(
            'estado'            =>  $filtros['estado'],
            'cliente'           =>  $this->clientes->get($filtros['cliente']),
            'datainicio'        =>  $datainicio,
            'datafim'           =>  $datafim,
            'status'            =>  $status,
            'forma_pagamento'   =>  $filtros['forma_pagamento'],
        );
        
        $data['configs']    = $this->configs->getSite();
        
        $this->load->view('restrito/relatorios/clientedetalhado', $data);
    }
    
    public function clienteSintetico(){
        
        
        $data['clientes']    = $this->clientes->relatorioClientes();
        $data['configs']    = $this->configs->getSite();
        
        $this->load->view('restrito/relatorios/clientesintetico', $data);
    }
    
    public function clienteSinteticoFiltros($filtros){
        
        
        $data['clientes'] = $this->clientes->relatorioClientesFiltros($filtros);
        
        if($filtros['datainicio']){
            $datainicio = date('d/m/Y', strtotime($filtros['datainicio']));
        } else {
            $datainicio = null;
        }
        
        if($filtros['datafim']){
            $datafim = date('d/m/Y', strtotime($filtros['datafim']));
        } else {
            $datafim = null;
        }
        
        $data['filtros']    = array(
            'estado'            =>  $filtros['estado'],
            'datainicio'        =>  $datainicio,
            'datafim'           =>  $datafim,
        );
        
        $data['configs']    = $this->configs->getSite();
        
        $this->load->view('restrito/relatorios/clientesintetico', $data);
    }
    
    public function pedidosDetalhado(){
        
        
        $data['pedidos']    = $this->comprasmodel->relatorioPedidosDetalhado();
        $data['servicos']   = $this->servicos->getAll();
        $data['configs']    = $this->configs->getSite();
        
        $this->load->view('restrito/relatorios/pedidosdetalhado', $data);
    }
    
    public function pedidosDetalhadoFiltros($filtros){
        
        
        $data['pedidos']    = $this->comprasmodel->relatorioPedidosDetalhadoFiltros($filtros);
        
        if($filtros['datainicio']){
            $datainicio = date('d/m/Y', strtotime($filtros['datainicio']));
        } else {
            $datainicio = null;
        }
        
        if($filtros['datafim']){
            $datafim = date('d/m/Y', strtotime($filtros['datafim']));
        } else {
            $datafim = null;
        }
        
        if($filtros['status'] != null || $filtros['status'] != ""){
            $status = $this->carrinhomodel->getStatus($filtros['status']);    
        } else {
            $status = null;
        }
        
        $data['filtros']    = array(
            'datainicio'        =>  $datainicio,
            'datafim'           =>  $datafim,
            'status'            =>  $status,
        );
        
        $data['servicos']   = $this->servicos->getAllFiltro($filtros, $datainicio, $datafim);
        $data['configs']    = $this->configs->getSite();
        
        $this->load->view('restrito/relatorios/pedidosdetalhado', $data);
    }
    
    public function pedidoSintetico(){
        
        
        $data['pedidos'] = $this->comprasmodel->relatorioPedidos();
        $data['configs']    = $this->configs->getSite();
        
        $this->load->view('restrito/relatorios/pedidosintetico', $data);
    }
    
    public function pedidoSinteticoFiltros($filtros){
        
        
        $data['pedidos'] = $this->comprasmodel->relatorioPedidosFiltros($filtros);
        
        if($filtros['datainicio']){
            $datainicio = date('d/m/Y', strtotime($filtros['datainicio']));
        } else {
            $datainicio = null;
        }
        
        if($filtros['datafim']){
            $datafim = date('d/m/Y', strtotime($filtros['datafim']));
        } else {
            $datafim = null;
        }
        
        if($filtros['status'] != null || $filtros['status'] != ""){
            $status = $this->carrinhomodel->getStatus($filtros['status']);    
        } else {
            $status = null;
        }
        
        $data['filtros']    = array(
            'estado'            =>  $filtros['estado'],
            'datainicio'        =>  $datainicio,
            'datafim'           =>  $datafim,
            'status'            =>  $status,
            'forma_pagamento'   =>  $filtros['forma_pagamento'],
        );
        
        $data['configs']    = $this->configs->getSite();
        
        $this->load->view('restrito/relatorios/pedidosintetico', $data);
    }
    
    public function entrega(){
        
        
        $id = $this->uri->segment(4);
        
        $data['pedido'] = $this->comprasmodel->pedido($id);
        $data['configs']    = $this->configs->getSite();
        
        $this->load->view('restrito/relatorios/entrega', $data);
    }
    
    public function vendasproduto(){
        
        
        $data['produtos'] = $this->comprasmodel->relatorioVendasProdutosDetalhado();
        $data['configs']    = $this->configs->getSite();
        
        $this->load->view('restrito/relatorios/vendasproduto', $data);
    }
    
    public function vendasprodutoFiltros($filtros){
        
        
        $data['produtos']   = $this->comprasmodel->relatorioVendasProdutosDetalhadoFiltros($filtros);
        if($filtros['datainicio']){
            $datainicio = date('d/m/Y', strtotime($filtros['datainicio']));
        } else {
            $datainicio = null;
        }
        
        if($filtros['datafim']){
            $datafim = date('d/m/Y', strtotime($filtros['datafim']));
        } else {
            $datafim = null;
        }
        
        if($filtros['status'] != null || $filtros['status'] != ""){
            $status = $this->carrinhomodel->getStatus($filtros['status']);    
        } else {
            $status = null;
        }
        
        
        $data['filtros']    = array(
            'estado'            =>  $filtros['estado'],
            'produto'           =>  $this->produtos->get($filtros['produto']),
            'datainicio'        =>  $datainicio,
            'datafim'           =>  $datafim,
            'status'            =>  $status,
            'forma_pagamento'   =>  $filtros['forma_pagamento'],
        );

        $data['configs']    = $this->configs->getSite();
        
        $this->load->view('restrito/relatorios/vendasproduto', $data);
    }
}