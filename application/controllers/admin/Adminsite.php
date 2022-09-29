<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminsite extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
        
        $this->load->database();
        $this->load->model('configs');
        $this->load->model('perguntas');
    }
    
    public function site(){
        
        if($this->session->userdata('msg')){
            $data['msg'] = $this->session->userdata('msg');
            $this->session->unset_userdata('msg');
        }
        
        $data['site']       = $this->configs->getSite();
        $data['perguntas']  = $this->perguntas->getAll();
        
        $this->header(6);
        $this->load->view('restrito/site', $data);
        $this->footer();
    }
    
        
    public function atualizarSite(){
       
        
        $site = array(
            'logo'                  => '/imagens/site/logo.png',
            'logo2'                 => '/imagens/site/logo2.png',
            'email'                 => $this->input->post('email'),
            'whats'                 => $this->limpa($this->input->post('whats')),    
            'telefone'              => $this->limpa($this->input->post('telefone')),
            'facebook'              => $this->input->post('facebook'),
            'instagram'             => $this->input->post('instagram'),
            'twitter'               => $this->input->post('twitter'),
            'termos'                => $this->input->post('termos'),
            'endereco'              => $this->input->post('endereco'),
            'nome_empresa'          => $this->input->post('nome_empresa'),
            'cnpj'                  => $this->limpa($this->input->post('cnpj')),
            'sobre_loja'            => $this->input->post('desc'),
            'politica_entrega'      => $this->input->post('desc2'),
            'politica_privacidade'  => $this->input->post('desc3'),
            'termos'                => $this->input->post('desc4'),
            'banner_principal1'     => '/imagens/site/banner_principal1.png',
            'banner_principal2'     => '/imagens/site/banner_principal2.png',
            'banner_principal3'     => '/imagens/site/banner_principal3.png',
            'parallax'              => '/imagens/site/parallax.png',
            'banner_contato'        => '/imagens/site/banner_contato.png',
            'imagem1'               => '/imagens/site/imagem1.png',
            'imagem2'               => '/imagens/site/imagem2.png',
            'imagem3'               => '/imagens/site/imagem3.png',
            'img_full2'             => '/imagens/site/img_full2.png',
            'img_full1'             => '/imagens/site/img_full1.png',
            'text_banner1'          => $this->input->post('text_banner1'),
            'text_banner2'          => $this->input->post('text_banner2'),
            'text_banner3'          => $this->input->post('text_banner3'),
            'btn_banner1'           => $this->input->post('btn_banner1'),
            'btn_banner2'           => $this->input->post('btn_banner2'),
            'btn_banner3'           => $this->input->post('btn_banner3'),
        );
        
        
        $this->uploadGui('banner_principal1',   'banner_principal1.png');
        $this->uploadGui('banner_principal2',   'banner_principal2.png');
        $this->uploadGui('banner_principal3',   'banner_principal3.png');
        $this->uploadGui('banner_contato',      'banner_contato.png');
        $this->uploadGui('img_banner1',         'img_banner1.png');
        $this->uploadGui('img_banner2',         'img_banner2.png');
        $this->uploadGui('img_banner3',         'img_banner3.png');
        $this->uploadGui('img_full1',           'img_full1.png');
        $this->uploadGui('img_full2',           'img_full2.png');
        $this->uploadGui('parallax',            'parallax.png');
        $this->uploadGui('imagem1',             'imagem1.png');
        $this->uploadGui('imagem2',             'imagem2.png');
        $this->uploadGui('imagem3',             'imagem3.png');
        $this->uploadGui('logo2',               'logo2.png');
        $this->uploadGui('ebook',               'ebook.pdf');
        $this->uploadGui('logo',                'logo.png');
        
        for ($i = 0; $i< $_POST['qtdPerg']; $i++){
            $perguntas[$i] = array(
                    'pergunta_id'           => $i+1,
                    'pergunta_titulo'       => $_POST['pergunta_titulo_'.$i],
                    'pergunta_resposta'     => $_POST['pergunta_resposta_'.$i],
            );
        }
        
        $this->perguntas->updatePergunta($perguntas);
        $this->configs->updateSite($site);
        
        
        $this->session->set_userdata('msg', 1);
        
        redirect(base_url('af8889282b50f9030f8cc7a19b3f706d'), 'refresh');
    }
    
    public function uploadGui($file, $nome){
        $config['upload_path']      = './imagens/site/';
        $config['allowed_types']    = 'gif|jpg|png|pdf';
        $config['max_size']         = '9000';
        $config['overwrite']        = true;
        $config['file_name']        = $nome;
        
        $this->load->library('upload', $config);
        
        $this->upload->initialize($config);
        
        $this->upload->do_upload($file);
    }
    
    function newPerguntaLista() {
        
	    $aux = $_POST['row'] + 1;
	    $html = "";
	    $html .=   "<br><div class='row'id='perguntaFrequente".$aux."'>
                    <div class='col-md-2' style='text-align:-webkit-center;'>
                    <button id='buttonPergunta".$aux."' type='button' class='btn btn-success' onclick='novaPergunta(".$aux.")'>
                    <i class='fa fa-plus' aria-hidden='true'></i>
                    </button>
                    </div>
                    <div class='col-md-10'>
                    <div class='row' >
                    <div class='col-md-12'>
                    <div>
                    <label style='color: #4da751;'>Campo:</label><br>
                    <input placeholder='Pergunta' type='text' class='form-control' name='pergunta_titulo_".$aux."' id='pergunta_titulo_".$aux."'>
                    </div>
                    <div style='margin-top: 2%;'>
                    <input placeholder='Resposta' type='text' class='form-control' name='pergunta_resposta_".$aux."' id='pergunta_resposta_".$aux."'>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>";
        echo json_encode($html);
    }
    
}