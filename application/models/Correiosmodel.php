<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Correiosmodel extends CI_Model {
    /**************************************
    FUNÇÕES DE CORREIOS NÃO ALTERAR
    **************************************/
    public function frete($carrinho, $cep){
        $this->db->select('valorTotal, qtdServicos, listServicosId');
        $this->db->where('idTemp', $carrinho);
        $aux = $this->db->get('cartunico')->row_array();

        $caixas = $this->calcCaixa($aux['listServicosId'], $aux['qtdServicos']);
        
        $this->db->where('dadosAtivo', 1);
        $this->db->where('idDadosCorreios >', 5);
        $a = $this->db->get('dadosCorreios')->result_array();
        $frete = $this->calcfrete($caixas, $cep);
        return $frete;
    }
    
    function calcCaixa($produtos, $quantidades){
        if(strpos($produtos, "¬")){
            $z = explode("¬", $produtos);
            $x = count($z);
        }else{
            $z[0] = $produtos;
            $x = 1;
        }
        if(strpos($quantidades, "¬")){
            $y = explode("¬", $quantidades);
            if(count($y) < $x){
                $x = count($y);
            }
        }else{
            $y[0] = $quantidades;
            $x = 1;
        }
        
        $helper = $volCub = $peso = 0;
        
        for($i = 0; $i < $x; $i++){
            $this->db->select('comprimento, largura, altura, peso');
            $this->db->where('produto_id', $z[$i]);
            $w = $this->db->get('produtos')->row_array();
            
            if($w['comprimento'] < 15){
                $w['comprimento'] = 15;
            }
            
            if($w['largura'] < 10){
                $w['largura'] = 10;
            }
            
            if($w['altura'] < 1){
                $w['altura'] = 1;
            }
            
            $vol = $w['comprimento'] * $w['largura'] * $w['altura'];  
            $vol = $vol * $y[$i];
            $helper = $helper + $vol;
            $peso = $peso + ($w['peso'] * $y[$i]) ;
        }
        
        $volCub = ceil(pow($helper, 1/3));
        
        if($volCub*3 > 200){
            $caixa = ceil($volCub/200);
        }else{
            $caixa = 1;
        }
        
        if($volCub < 26){
            $dados = array(
                'caixas'        => $caixa,
                'peso'          => $peso,
                'comprimento'   => $w['comprimento'],
                'altura'        => $w['altura'],
                'largura'       => $w['largura'],
            );
        }else{
            $dados = array(
                'caixas'        => $caixa,
                'peso'          => $peso,
                'comprimento'   => $volCub,
                'altura'        => $volCub,
                'largura'       => $volCub,
                );
        }
        return $dados;
    }

    function calcfrete($dados, $cep){
        $this->db->select('cdServico, tipoServico, cepOrigem, valorServico, dias_entrega_extra, servicoCorreio, idDadosCorreios');
        $this->db->where('dadosAtivo', 1);
        $a = $this->db->get('dadosCorreios')->result_array();
        $i = 0;

        foreach($a as $correio){
            if($correio['servicoCorreio'] == 1){
                $nCdServico             =   $correio['cdServico'];
                $sCepOrigem             =   $correio['cepOrigem'];
                $sCepDestino            =   $cep;
                $nVlPeso                =   $dados['peso'];
                $nVlComprimento         =   $dados['comprimento'];//Comprimento da encomenda (incluindo embalagem), em centímetros.
                $nVlAltura              =   $dados['altura'];//Altura da encomenda (incluindo embalagem), em centímetros. 
                $nVlLargura             =   $dados['largura'];//Largura da encomenda (incluindo embalagem), em centímetros
                
                $frete = $this->chamaCorreio($nCdServico, $sCepOrigem, $sCepDestino, $nVlPeso, $nVlComprimento, $nVlAltura, $nVlLargura);
                $valor = $frete['cServico']['Valor'];
                                                                                        
                if($frete['cServico']['Erro'] != 0){
                    $aux[$i] = array(
                        'id'        => $correio['idDadosCorreios'],
                        'servico'   => $correio['tipoServico'],
                        'erro'      => $frete['cServico']['MsgErro'],
                        );
                }else{
                    $aux[$i] = array(
                        'id'        => $correio['idDadosCorreios'],
                        'servico'   => $correio['tipoServico'],
                        'valor'     => str_replace(",", ".", $valor),
                        'prazo'     => $frete['cServico']['PrazoEntrega'] + $correio['dias_entrega_extra'],
                        'erro'      => 0,
                    );
                }
            }else{
                $aux[$i] = array(
                    'id'        => $correio['idDadosCorreios'],
                    'servico'   => $correio['tipoServico'],
                    'valor'     => $correio['valorServico'],
                    'prazo'     => $correio['dias_entrega_extra'],
                    'erro'      => 0,
                );
            }
            $i++;
        }
        
        
        
        return $aux;
    }

    function chamaCorreio($nCdServico, $sCepOrigem, $sCepDestino, $nVlPeso, $nVlComprimento, $nVlAltura, $nVlLargura){

        $nCdFormato             =   1; //1 – Formato caixa/pacote //2 – Formato rolo/prisma //3 – Envelope
        $sCdMaoPropria          =   'N';//Valores possíveis: S ou N (S – Sim, N – Não)
        $nVlValorDeclarado      =   0;//Se não optar pelo serviço informar zero.
        $sCdAvisoRecebimento    =   'N';//Valores possíveis: S ou N (S – Sim, N – Não)
        $StrRetorno             =   'xml';
        
        $correio = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdServico=$nCdServico&sCepOrigem=$sCepOrigem&sCepDestino=$sCepDestino&nVlPeso=$nVlPeso&nCdFormato=$nCdFormato&nVlComprimento=$nVlComprimento&nVlAltura=$nVlAltura&nVlLargura=$nVlLargura&sCdMaoPropria=$sCdMaoPropria&nVlValorDeclarado=$nVlValorDeclarado&sCdAvisoRecebimento=$sCdAvisoRecebimento&StrRetorno=$StrRetorno";
                //  http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdServico=$nCdServico&sCepOrigem=$sCepOrigem&sCepDestino=$sCepDestino&nVlPeso=$nVlPeso&nCdFormato=$nCdFormato&nVlComprimento=$nVlComprimento&nVlAltura=$nVlAltura&nVlLargura=$nVlLargura&sCdMaoPropria=$sCdMaoPropria&nVlValorDeclarado=$nVlValorDeclarado&sCdAvisoRecebimento=$sCdAvisoRecebimento&StrRetorno=$StrRetorno";
        $ch = curl_init($correio);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($ch);
        $xml = simplexml_load_string($res);
        curl_close($ch);
        return json_decode(json_encode($xml), true);
    }
    /**************************************
    FIM DAS FUNÇÕES DE CORREIOS NÃO ALTERAR
    **************************************/
    
    public function dados(){
        return $this->db->get('dadosCorreios')->result_array();
    }
    
    public function updateDados($dados){
        $this->db->update('dadosCorreios', $dados);
    }
    
    public function update($id, $dados){
        $this->db->where('idDadosCorreios', $id);
        $this->db->update('dadosCorreios', $dados);
    }
    
    public function relatorioFrete(){
        $result         = $this->db->get('historicocompras')->result_array();
        $i              = 0;
        $total_geral    = 0;
        $pedidos        = [];
        
        foreach($result as $aux){
            $this->db->select('cliente_nome, cliente_cpf, cliente_cidade, cliente_estado');
            $this->db->where('cliente_id', $aux['idClient']);
            $cliente = $this->db->get('cliente')->row_array();
            
            $total_geral = $total_geral + $aux['valorFrete'];
            
            $aux_endereco = explode('¬', $aux['enderecoCompra']);
            
            if($cliente){
                $nome_cliente       = $cliente['cliente_nome'];
                $cpf_cliente        = $cliente['cliente_cpf'];
                $cidade_cliente     = $cliente['cliente_cidade'];
                $estado_cliente     = $cliente['cliente_estado'];
            } else {
                $nome_cliente       = 'Cliente excluído';
                $cpf_cliente        = 'Cliente excluído';
                $cidade_cliente     = 'Cliente excluído';
                $estado_cliente     = 'Cliente excluído';
            }
            
            $pedidos[$i] = array(
                'idpedido'      => $aux['idcompra'],
                'cliente_nome'  => $nome_cliente,
                'cliente_cpf'   => $cpf_cliente,
                'cliente_cidade'=> $cidade_cliente,
                'cliente_estado'=> $estado_cliente,
                'data'          => $aux['dataCompra'],
                'valor'         => $aux['valorCompra'],
                'frete'         => $aux['valorFrete'],
                'desconto'      => $aux['desconto'],
            );
            $i++;
        }
        $data['pedidos']        = $pedidos;
        $data['total_geral']    = $total_geral;
        
        return $data;
    }
    
    public function relatorioFreteFiltros($filtros){
        if($filtros['datainicio']){
            $this->db->where('dataCompra >=', $filtros['datainicio']);
        }
        if($filtros['datafim']){
            $this->db->where('dataCompra <=', $filtros['datafim']);
        }
        $result         = $this->db->get('historicocompras')->result_array();
        $i              = 0;
        $total_geral    = 0;
        $pedidos        = [];
        
        foreach($result as $aux){
            $this->db->select('cliente_nome, cliente_cpf, cliente_cidade, cliente_estado');
            $this->db->where('cliente_id', $aux['idClient']);
            $cliente = $this->db->get('cliente')->row_array();
            
            $total_geral = $total_geral + $aux['valorFrete'];
            
            $aux_endereco = explode('¬', $aux['enderecoCompra']);
            
            if($cliente){
                $nome_cliente       = $cliente['cliente_nome'];
                $cpf_cliente        = $cliente['cliente_cpf'];
                $cidade_cliente     = $cliente['cliente_cidade'];
                $estado_cliente     = $cliente['cliente_estado'];
            } else {
                $nome_cliente       = 'Cliente excluído';
                $cpf_cliente        = 'Cliente excluído';
                $cidade_cliente     = 'Cliente excluído';
                $estado_cliente     = 'Cliente excluído';
            }
            
            $pedidos[$i] = array(
                'idpedido'      => $aux['idcompra'],
                'cliente_nome'  => $nome_cliente,
                'cliente_cpf'   => $cpf_cliente,
                'cliente_cidade'=> $cidade_cliente,
                'cliente_estado'=> $estado_cliente,
                'data'          => $aux['dataCompra'],
                'valor'         => $aux['valorCompra'],
                'frete'         => $aux['valorFrete'],
                'desconto'      => $aux['desconto'],
            );
            $i++;
        }
        $data['pedidos']        = $pedidos;
        $data['total_geral']    = $total_geral;
        
        return $data;
    }
       
}