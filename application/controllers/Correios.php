<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Correios extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('correiosmodel');
        $this->load->model('carrinhomodel');
    }
    
    public function frete(){
        echo json_encode($_POST);
    }
    
    public function updateCorreios(){
        $dados = array(
            'idDadosCorreios'   => $this->input->post('idDadosCorreios'),
            'cdServico'         => $this->input->post('cdServico'),
            'tipoServico'       => $this->input->post('tipoServico'),
            'cepOrigem'         => $this->input->post('cepOrigem'),
            'dadosAtivo'        => $this->input->post('dadosAtivo'), 
        );
        $this->correiosmodel->updateDados($dados);
    }
    
    public function freteCorreio(){
        $caixa = $this->correiosmodel->frete($_POST['carrinho'], $_POST['cep']);
        $html = "";
        foreach($caixa as $cx){/*".str_replace(' ', '', $cx['servico'])."*/
                $html .= "<tr style='border-bottom: 8px solid #f5f5f7;'>
                        <td><input type='radio' onclick='calculaTotal(".'"'.$cx['servico'].'"'.", ".@$cx['valor'].")' class='radio-frete' id='".str_replace(' ', '', $cx['servico'])."' name='frete' required style='display: inline'> ".$cx['servico']."</td>
                        <td class=text-center valor>R$ ".@$cx['valor']."</td>
                        <td class=text-center> ".@$cx['prazo']." dias</td>
                      </tr>";
        }
        $this->session->set_userdata('cep', $_POST['cep']);
        echo json_encode($html);
    } 
    
}