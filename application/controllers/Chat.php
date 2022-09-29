<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends Public_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('chatmodel');
    }
    
    public function insertChat(){        
        
        $chat = $this->chatmodel->get(md5($this->input->post('pedido')));
        
        if(!empty($_FILES['anexo'])){
            $this->newUploadImagem(str_replace(' ', '', $this->input->post('nomeArquivo')), 'anexo');
        }
        
        $mensagem = array(
            'mensagem_chat'      => $chat['chat_id'],
            'mensagem_conteudo'  => addslashes($this->input->post('mensagem')),
            'mensagem_visto'     => 0,
            'mensagem_remetente' => $this->input->post('cliente'),
            'mensagem_admin'     => $this->input->post('admin'),
            'mensagem_dataHora'  => date('Y-m-d H:i'),
        );
        
        $this->chatmodel->insertMensagem($mensagem);
    }
    
    
    
    public function getChat(){
        
        
        $chat = $this->chatmodel->get(md5($this->input->post('pedido')));
        $mensagens = $this->chatmodel->getMensagem($chat['chat_id']);
        
        $chats = [];
        $cont  = 0;
        
        foreach($mensagens as $a){
            $chats[$cont] = array(
                'mensagem'  => addslashes($a['mensagem_conteudo']) ,
                'nome'      => ucwords(strtolower($a['mensagem_remetente'])),
                'admin'     => $a['mensagem_admin'],
                'dataHora'  => date('d/m/Y H:i', strtotime($a['mensagem_dataHora'])),
            );
            $cont++;
            
            if($a['mensagem_admin'] == $this->input->post('admin')){
                $update = array(
                    'mensagem_visto'    => 1,    
                );
                
                $this->chatmodel->updateMensagem($a['mensagem_id'], $update); 
            }
        }
        echo json_encode($chats);
    }
    
    
    public function getChatRealTime(){
        
        
        $chat = $this->chatmodel->get(md5($this->input->post('pedido')));
        $mensagens = $this->chatmodel->getMensagemVisto($chat['chat_id']);
        
        $chats = [];
        $cont  = 0;
        
        foreach($mensagens as $a){
            if($a['mensagem_admin'] != $this->input->post('admin')){
                $chats[$cont] = array(
                    'mensagem'  => addslashes($a['mensagem_conteudo']) ,
                    'nome'      => ucwords(strtolower($a['mensagem_remetente'])),
                    'admin'     => $a['mensagem_admin'],
                    'dataHora'  => date('d/m/Y H:i', strtotime($a['mensagem_dataHora'])),
                );
                $cont++;
                
                
                $update = array(
                    'mensagem_visto'    => 1,    
                );
                
                $this->chatmodel->updateMensagem($a['mensagem_id'], $update); 
            }
        }
        
        echo json_encode($chats);
    }
    
    
    function newUploadImagem($name, $file){
        $config = array();
        $config['upload_path']          = './imagens/chat/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf';
        $config['max_size']             = 20000;
        $config['overwrite']            = true;
        $config['file_name']            = $name;
        
        $this->load->library('upload');
        
        $this->upload->initialize($config);

        $this->upload->do_upload($file);
    }
}