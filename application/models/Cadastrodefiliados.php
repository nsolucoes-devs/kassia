<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastrodefiliados extends CI_Model {
    
    public function insert($new){
        $this->db->insert('afiliados', $new);
        return $this->db->insert_id();
    }
}