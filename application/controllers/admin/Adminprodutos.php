<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminprodutos extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('produtos');
        $this->load->model('departamentos');
        $this->load->model('marcas');
    }
    
    public function produtos(){
        
        $this->load->library("pagination");
        
        $filtro = $this->input->post('filtro');
        $filtro = mb_strtoupper($filtro);
        if($this->uri->segment(2) == 'f'){
            $filtro = strtoupper(urldecode($this->uri->segment(3))); 
        }
        
        if($filtro){
            $config = array();
            $config["base_url"] = base_url('391a027a8fef2eba4487a00156901156/f/' . $filtro . '/');
            $config["total_rows"] = $this->produtos->get_countFiltro($filtro);
            $config["per_page"] = 10;
            $config["uri_segment"] = 4;
            
            $this->pagination->initialize($config);
            
            $data['links'] = $this->pagination->create_links();
            
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    
            $data['produtos']  = $this->produtos->getAllProdutosFiltro($filtro, 10, $page);
            $data['filtro']    = $filtro;
        } else {
            $config = array();
            $config["base_url"] = base_url('391a027a8fef2eba4487a00156901156/n/');
            $config["total_rows"] = $this->produtos->get_count();
            $config["per_page"] = 10;
            $config["uri_segment"] = 3;
            
            $this->pagination->initialize($config);
            
            $data['links'] = $this->pagination->create_links();
            
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    
            $data['produtos']  = $this->produtos->getAllProdutos(10, $page);
        
        }

        if($this->session->userdata('alert')){
            $data['alert'] = $this->session->userdata('alert');
            $this->session->unset_userdata('alert');
        }
        
        $this->header(2);
        $this->load->view('restrito/produtos', $data);
        $this->footer();
    }
    
        
    public function cadastrarProduto(){
        
        
        $data['marcas']         = $this->marcas->getAllAtivos();
        $data['produtos']       = $this->produtos->getAll();
        $data['departamentos']  = $this->departamentos->getAll();
        
		$this->header(2);
		$this->load->view('restrito/produto', $data);
		$this->footer();
	}
    
    public function editaProduto(){
	    $id = $this->uri->segment(2);
	    
	    $data['produto']        = $this->produtos->get($id);
	    $data['produtos']       = $this->produtos->getAll();
        //         $data['departamentos']  = $this->departamentos->getAll();
        //         $data['marcas']         = $this->marcas->getAllAtivos();
        //         $data['tamanhos']       = $this->opcoes->getAllTamanhos();
        //         $data['cores']          = $this->opcoes->getAllCores();

		$this->header(2);
		$this->load->view('restrito/editaproduto', $data);
		$this->footer();
	}
	
	public function excluirProduto(){
	    
	    
	    $id = $this->input->post('id');
	    $senha = md5($this->input->post('senha'));
        $this->produtos->delete($id);    
	    // if($senha == $this->session->userdata('senha')){
	    //     $this->session->set_userdata('alert', 3);
	        
	    //     // #5 - Chamada da função para gerar log de produto, quando der certo a senha e concluir a exclusão.
	    //     $produto = $this->produtos->get($id);
	    //     $dados = array(
	    //         'produto_id'    => $id,    
	    //         'produto_nome'  => $produto['produto_nome'],
	    //     );
	    //     $this->logProduto($dados);
	    //     // Fim #5
	        
	       
	    // } else {
	    //     $this->logBlock();
	    //     $this->session->set_userdata('alert', 4);
	    // }
	    
	    redirect(base_url('391a027a8fef2eba4487a00156901156'), 'refresh');
	}
	
	public function updateProduto(){
	    
	    
	    $id = $this->input->post('id');
	    
	    $config['upload_path']          = './imagens/produtos/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2000;
        $config['overwrite']            = true;
        $config['file_name']            = $id . '.jpg';
        
        $produtos_imagens = $this->produtos->get($id);

	    $produto = array(
            'produto_nome'                      => mb_strtoupper(addslashes($_POST['nome'])),
            'produto_subtitulo'                 => mb_strtoupper(addslashes($_POST['modelo'])),
            'produto_codigo'                    => mb_strtoupper(addslashes($_POST['codigo'])),
            'produto_fabricante'                => mb_strtoupper(addslashes($_POST['fabricante'])),
            'produto_valor'                     => $this->limpaValor(addslashes($_POST['valor'])),
            'produto_promocaoPreco'             => $this->limpaValor(addslashes($_POST['preco_promocao'])),
            // 'produto_promocaoAtivo'             => addslashes($_POST['preco_promocao_ativo']),
            'produto_desconto'                  => addslashes($_POST['desconto']),
            'produto_descontoAtivo'             => addslashes($_POST['desconto_ativo']),
            // 'produto_datainicial_promocao'      => addslashes($_POST['datainicial_promocao']),
            // 'produto_datafinal_promocao'        => addslashes($_POST['datafinal_promocao']),
            // 'produto_datafinal_promocao_ativo'  => addslashes($_POST['datafinal_promocao_ativo']),
            'produto_cupom'                     => addslashes($_POST['cupom']),
            // 'produto_cupom_ativo'               => addslashes($_POST['cupom_ativo']),
            // 'produto_marca_id'                  => addslashes($_POST['marca']),
            // 'produto_departamentos'             => $this->montarArray(addslashes($_POST['departamentos'])),
            // 'produto_relacionados'              => $this->montarArray(addslashes($_POST['relacionados'])),
            // 'produto_tamanhos'                  => $this->montarArray(addslashes($_POST['tamanhos'])),
            // 'produto_cores'                     => $this->montarArray(addslashes($_POST['cores'])),
            // 'produto_variacoes'                 => $this->montarArray(addslashes($_POST['variacoes'])),
            'produto_habilitado'                => addslashes($_POST['habilitado']),
            'produto_quantidade'                => addslashes($_POST['quantidade']),
            // 'produto_estoque_minimo'            => addslashes($_POST['minimo']),
            // 'produto_minimo_venda'              => addslashes($_POST['minimo_venda']),
            // 'produto_reduzir'                   => addslashes($_POST['reduzir']),
            'und_comprimento'                 => addslashes($_POST['medida']),
            'comprimento'               => addslashes($_POST['comprimento']),
            'largura'                   => addslashes($_POST['largura']),
            'altura'                    => addslashes($_POST['altura']),
            'und_peso'                   => addslashes($_POST['un_peso']),
            'peso'                      => addslashes($_POST['peso']),
            'produto_sku'                       => addslashes($_POST['sku']),
            'produto_ncm'                       => addslashes($_POST['ncm']),
            'produto_cest'                      => addslashes($_POST['cest']),
            'produto_upc'                       => addslashes($_POST['upc']),
            'produto_ean'                       => addslashes($_POST['ean']),
            'produto_jan'                       => addslashes($_POST['jan']),
            'produto_isbn'                      => addslashes($_POST['isbn']),
            'produto_mpn'                       => addslashes($_POST['mpn']),
            'produto_detalhes'                  => addslashes($_POST['desc']),
        );
        
        for ($i=1; $i <=5; $i++){
            if (!empty($_FILES['opcional' . $i]['name'])){
                $produto['produto_imagens_opcional' . $i] = 'imagens/produtos/opcionais/' . $id . "-" . $i . ".jpg";
                $this->uploadOpcionais('opcional' . $i, $id . "-" . $i);
            }else if($produtos_imagens['produto_imagens_opcional' . $i] != null) {
                $produto['produto_imagens_opcional' . $i] = $produtos_imagens['produto_imagens_opcional' . $i];
            }else {
                $produto['produto_imagens_opcional' . $i] = null;
            }
        }
        
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        
        $this->upload->do_upload('imagem');
        
        $this->produtos->update($id, $produto);
        $this->session->set_userdata('alert', 2);
        
        redirect(base_url('391a027a8fef2eba4487a00156901156'));
	}
	
	public function verProduto(){
	    
	    
	    $id = $this->uri->segment(2);
	    
	    $data['produto']        = $this->produtos->get($id);
	    $data['produtos']       = $this->produtos->getAll();
        $data['departamentos']  = $this->departamentos->getAll();
        $data['marcas']         = $this->marcas->getAllAtivos();

		$this->header(2);
		$this->load->view('restrito/verproduto', $data);
		$this->footer();
	}
    
    public function novoProduto(){

        $config['upload_path']          = './imagens/produtos/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2000;

        $new = array(
            'produto_nome'                      => mb_strtoupper(addslashes($_POST['nome'])),
            'produto_subtitulo'                 => mb_strtoupper(addslashes($_POST['modelo'])),
            'produto_codigo'                    => mb_strtoupper(addslashes($_POST['codigo'])),
            'produto_fabricante'                => mb_strtoupper(addslashes($_POST['fabricante'])),
            'produto_valor'                     => $this->limpaValor(addslashes($_POST['valor'])),
            'produto_promocaoPreco'             => $this->limpaValor(addslashes($_POST['preco_promocao'])),
            'produto_promocaoAtivo'             => addslashes($_POST['preco_promocao_ativo']),
            'produto_desconto'                  => addslashes($_POST['desconto']),
            'produto_descontoAtivo'             => addslashes($_POST['desconto_ativo']),
            // 'produto_datainicial_promocao'      => addslashes($_POST['datainicial_promocao']),
            // 'produto_datafinal_promocao'        => addslashes($_POST['datafinal_promocao']),
            // 'produto_datafinal_promocao_ativo'  => addslashes($_POST['datafinal_promocao_ativo']),
            'produto_cupom'                     => addslashes($_POST['cupom']),
            'produto_cupomAtivo'               => addslashes($_POST['cupom_ativo']),
            // 'produto_marca_id'                  => addslashes($_POST['marca']),
            'produto_departamento'             => addslashes($this->montarArray($_POST['departamentos'])),
            // 'produto_relacionados'              => $this->montarArray(addslashes($_POST['relacionados'])),
            // 'produto_tamanhos'                  => addslashes($this->montarArray($_POST['tamanhos'])),
            // 'produto_cores'                     => addslashes($this->montarArray($_POST['cores'])),
            // 'produto_variacoes'                 => $this->montarArray(addslashes($_POST['variacoes'])),
            'produto_habilitado'                => addslashes($_POST['habilitado']),
            'produto_quantidade'                => addslashes($_POST['quantidade']),
            // 'produto_estoque_minimo'            => addslashes($_POST['minimo']),
            // 'produto_minimo_venda'              => addslashes($_POST['minimo_venda']),
            // 'produto_reduzir'                   => addslashes($_POST['reduzir']),
            'und_comprimento'                 => addslashes($_POST['medida']),
            'comprimento'               => addslashes($_POST['comprimento']),
            'largura'                   => addslashes($_POST['largura']),
            'altura'                    => addslashes($_POST['altura']),
            'und_peso'                   => addslashes($_POST['un_peso']),
            'peso'                      => addslashes($_POST['peso']),
            'produto_sku'                       => addslashes($_POST['sku']),
            'produto_ncm'                       => addslashes($_POST['ncm']),
            'produto_cest'                      => addslashes($_POST['cest']),
            'produto_upc'                       => addslashes($_POST['upc']),
            'produto_ean'                       => addslashes($_POST['ean']),
            'produto_jan'                       => addslashes($_POST['jan']),
            'produto_isbn'                      => addslashes($_POST['isbn']),
            'produto_mpn'                       => addslashes($_POST['mpn']),
            'produto_detalhes'                  => addslashes($_POST['desc']),
        );
        
        $id = $this->produtos->insert($new);

        
        $config['file_name'] = $id . '.jpg';
        
        for ($i=1; $i <=5; $i++){
            if (!empty($_FILES['opcional' . $i]['name'])){
               $produto['produto_imagens_opcional' . $i] = 'imagens/produtos/opcionais/' . $id . "-" . $i . ".jpg";
                $this->uploadOpcionais('opcional' . $i, $id . "-" . $i);
            }else {
                $produto['produto_imagens_opcional' . $i] = null;
            }
        } 
        
        $this->produtos->update($id, $produto);
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload('imagem');
        $this->session->set_userdata('alert', 1);
        
        redirect(base_url('391a027a8fef2eba4487a00156901156'));
    }
    
        
    public function solicitacoes(){
        
        $this->load->library("pagination");
        
        
        $filtro = $this->input->post('filtro');
        $filtro = mb_strtoupper($filtro);
        if($this->uri->segment(2) == 'f'){
            $filtro = strtoupper(urldecode($this->uri->segment(3))); 
        }
        
        if($filtro){
            $config = array();
            $config["base_url"] = base_url('4f713efdd5a702bb7c0bf2608f3a6a72/f/' . $filtro . '/');
            $config["total_rows"] = $this->produtos->get_countSolicitacoesFiltro($filtro);
            $config["per_page"] = 10;
            $config["uri_segment"] = 4;
            
            $this->pagination->initialize($config);
            
            $data['links'] = $this->pagination->create_links();
            
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    
            $data['solicitacoes']  = $this->produtos->getAllSolicitacoesPaginationFiltro($filtro, 10, $page);
            $data['filtro']        = $filtro;
        } else {
            $config = array();
            $config["base_url"] = base_url('4f713efdd5a702bb7c0bf2608f3a6a72/n/');
            $config["total_rows"] = $this->produtos->get_countSolicitacoes();
            $config["per_page"] = 10;
            $config["uri_segment"] = 3;
            
            $this->pagination->initialize($config);
            
            $data['links'] = $this->pagination->create_links();
            
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    
            $data['solicitacoes']  = $this->produtos->getAllSolicitacoesPagination(10, $page);
        }
        
        $this->header(4);
        $this->load->view('restrito/solicitacoes', $data);
        $this->footer();
    }

    public function getSolicitacao(){
        
        
        $id = $this->input->post('id');
        
        $solicitacao = $this->produtos->getSolicitacao($id);
        
        echo json_encode($solicitacao);
    }
    
    public function verSolicitacao(){
        
        
        $id = $this->uri->segment(2);
        
        $data['solicitacao'] = $this->produtos->getSolicitacao($id);
        $data['andamento'] = $this->produtos->getAllAndamento($id);
        
        $this->header(4);
        $this->load->view('restrito/solicitacao', $data);
        $this->footer();
    }
    
    public function updateStatus(){
        
        
        date_default_timezone_set('America/Sao_Paulo');
        $datahora = date('d/m/y | H:i');
        
        $id = $this->input->post('id');
        
        $solicitacao = array(
            'solicitacao_status'    => $this->input->post('status'),
        );
        
        $andamento = array(
            'andamento_solicitacao_id'  => $id,
            'andamento_mensagem'        => $this->input->post('andamento'),
            'andamento_status'          => $this->input->post('status'),
            'andamento_datahora'        => $datahora,
        );
        
        $this->produtos->insertAndamento($andamento);
        
        $this->produtos->updateSolicitacao($id, $solicitacao);
        
        redirect(base_url('4f713efdd5a702bb7c0bf2608f3a6a72'), 'refresh');
    }
    
    public function updateAndamento(){
        
        
        $id = $this->input->post('id');
        $mensagem = $this->input->post('mensagem');
        
        $andamento = array(
            'andamento_mensagem'  => $mensagem,    
        );
        
        $this->produtos->updateAndamento($id, $andamento);

    }
    
    public function deleteAndamento(){
        
        
        $id = $this->input->post('id');
        
        $this->produtos->deleteAndamento($id);

    }
    
    public function logProduto($dados){
        $this->load->model('Logger');
        date_default_timezone_set('America/Sao_Paulo');
        
        $log = array(
            'logproduto_ip'             => $_SERVER['REMOTE_ADDR'],
            'logproduto_user_id'        => $this->session->userdata('user_id'),
            'logproduto_data'           => date('Y-m-d'),
            'logproduto_hora'           => date('H:i:s'),
            'logproduto_produto_nome'   => $dados['produto_nome'],  
            'logproduto_produto_id'     => $dados['produto_id'],  
        );
        
        $this->logger->logProduto($log);
    }
    
    public function logBlock(){
        $this->load->model('Logger');
        $this->load->model('usuarios');
        date_default_timezone_set('America/Sao_Paulo');
        
        $log = array(
            'log_ip'             => $_SERVER['REMOTE_ADDR'],
            'log_user_id'        => $this->session->userdata('user_id'),
            'log_nome'           => $this->session->userdata('nome'),
            'log_data'           => date('Y-m-d'),
            'log_hora'           => date('H:i:s'),
            'log_funcao'         => '391a027a8fef2eba4487a00156901156',  
            'log_tipo'           => 'SENHA',  
        );
        
        
        if($this->session->userdata('user_block')){
            $cont = $this->session->userdata('user_block');
            $this->session->set_userdata('user_block', $cont + 1);
        } else {
            $this->session->set_userdata('user_block', 1);
        }
        
        if($this->session->userdata('user_block') >= 3){
            $user_content = array(
                'ativo' => 0,
            );
            $this->usuarios->atualizarUsuario($user_content, $this->session->userdata('user_id'));
            
            $this->session->unset_userdata('user_block');
            
            redirect(base_url('dc28f82848daefd26e2f0f38094d5818'));
        }
        
        
        $this->logger->logBlock($log);
    }
    public function montarArray($itens){
        $array  = "";
        $cont   = 0;
        
        if($itens){
            foreach($itens as $i){
                if($cont == 0){
                    $array .= $i;    
                } else {
                    $array .= '¬' . $i;
                }
                $cont++;
            }
        } 
        
        return $array;
    }
}