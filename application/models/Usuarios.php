<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Model {
    
    function logar($user){
        $this->db->where('login_usuario', $user);
	    $userid = $this->db->get('usuarios');
	    return $userid->row_array();
    }
    
    //função que pega um usuario com base no id
	public function usuarioId($id){
	    $this->db->where('id_usuario', $id);
	    $userid = $this->db->get('usuarios');
	    return $userid->row_array();
	}
	
	//função que pega todos os usuários
	public function getUsuarios(){
	    $this->db->where('super', 0);
	    $userid = $this->db->get('usuarios');
	    return $userid->result_array();
	}
	
	public function get($id){
	    $this->db->where('id_usuario', $id);
	    $userid = $this->db->get('usuarios');
	    return $userid->row_array();
	}
	
	public function getAll(){
	    $userid = $this->db->get('usuarios');
	    return $userid->result_array();
	}
	
	public function adicionarUsuario($user){
	    $this->db->insert('usuarios', $user);
	    return $this->db->insert_id();
	}
	
	public function excluirUsuario($id){
	    $this->db->where('id_usuario', $id);
	    $this->db->delete('usuarios');
	}
	
	public function atualizarUsuario($us, $id){
	    $this->db->where('id_usuario', $id);
	    $this->db->update('usuarios', $us);
	}
	
	public function getAllUsuarios($limit, $start){
        $this->db->select('id_usuario, nome_usuario, login_usuario, email, telefone, ativo');
        $this->db->order_by('id_usuario', 'desc');
        $this->db->limit($limit, $start);
        $data = $this->db->get('usuarios');
        return $data->result_array();
    }
    
    public function get_count() {
        $this->db->select(" COUNT(*) as pages");
        $a = $this->db->get('usuarios')->row_array();
        return $a['pages'];
    }
    
    public function getAllUsuariosFiltro($filter, $limit, $start){
        $this->db->select('id_usuario, nome_usuario, login_usuario, email, telefone, ativo');
        $this->db->join('status_cliente', 'usuarios.ativo = status_cliente.status_id');
        $this->db->like('nome_usuario', $filter, 'both');
        $this->db->or_like('login_usuario', $filter, 'both');
        $this->db->or_like('email', $filter, 'both');
        $this->db->or_like('telefone', $filter, 'both');
        $this->db->or_like('status_nome', $filter, 'both');
        $this->db->order_by('id_usuario', 'desc');
        $this->db->limit($limit, $start);
        $data = $this->db->get('usuarios');
        return $data->result_array();
    }
    
    public function get_countFiltro($filter) {
        $this->db->select(" COUNT(*) as pages");
        $this->db->like('nome_usuario', $filter, 'both');
        $this->db->or_like('login_usuario', $filter, 'both');
        $this->db->or_like('email', $filter, 'both');
        $this->db->or_like('telefone', $filter, 'both');
        $a = $this->db->get('usuarios')->row_array();
        return $a['pages'];
    }
    
    public function limpa($val){
	    $helper = array(",", ".", "(", ")", "+", "-", " ", "/", "_");
        return str_replace($helper, "", $val);
	}
	
    public function afiliadoLogin($user, $pass){
        $this->db->where('afiliado_senha', md5($pass));
        $this->db->where('afiliado_usuario', $user);
	    $userid = $this->db->get('afiliadosLogin')->row_array();
	    return $userid;
    }
    
    public function newAfiliado($dados){
        $this->db->where('afiliado_cnpj', $dados['afiliado_cnpj']);
        $a = $this->db->get('afiliadosLogin')->row_array();
        
        if($a){
            return $data['return'] = array( 'erro' => "CNPJ já cadastrado.");
        }else{
            $this->db->insert('afiliadosLogin', $dados);
            return $data['return'] = array( 'success' => "Cadastro de Afiliado realizado, aguarde aprovação.");
        }
    }
	
}