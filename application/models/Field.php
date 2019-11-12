<?php

class Field extends CI_Model {
    public function getAll() {
        $query = $this->db->get('Field');
        return $query->result();
    }    
}

?>
