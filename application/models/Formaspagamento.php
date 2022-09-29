<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formaspagamento extends CI_Model {
    
    public function getFormas(){
        $formas = $this->db->get('formas_pagamento');
        return $formas->result_array();
    }
    
    public function getFormaId($id){
        $this->db->where('id_forma', $id);
        $forma = $this->db->get('formas_pagamento');
        return $forma->row_array();
    }
    
    public function atualizaHistorico($reference, $notificationCode, $status){
        $this->db->where('idcompra', $reference);
        $a = $forma = $this->db->get('historicocompras')->row_array();
        
        $a['codTransacao'] = $notificationCode;
        
        $a['statusCompra'] = $status;
        
        $this->db->replace('historicocompras', $a);
    }
    
}