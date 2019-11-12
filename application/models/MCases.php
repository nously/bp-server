<?php

class MCases extends CI_Model {
    public function getBusinessCase() {
        $this->db->select('Cases.*, Field.name as fieldName');
        $this->db->from('Cases');
        $this->db->join('Field', 'Field.id = Cases.field_id');
        $this->db->where('Field.name', 'Business Law');
        $query = $this->db->get();
        return $query->result();
    }

    public function getFamilyCase() {
        $this->db->select('Cases.*, Field.name as fieldName');
        $this->db->from('Cases');
        $this->db->join('Field', 'Field.id = Cases.field_id');
        $this->db->where('Field.name', 'Family Law');
        $query = $this->db->get();
        return $query->result();
    }

    public function getFinanceCase() {
        $this->db->select('Cases.*, Field.name as fieldName');
        $this->db->from('Cases');
        $this->db->join('Field', 'Field.id = Cases.field_id');
        $this->db->where('Field.name', 'Finance Law');
        $query = $this->db->get();
        return $query->result();
    }


    public function getEducationCase() {
        $this->db->select('Cases.*, Field.name as fieldName');
        $this->db->from('Cases');
        $this->db->join('Field', 'Field.id = Cases.field_id');
        $this->db->where('Field.name', 'Education Law');
        $query = $this->db->get();
        return $query->result();
    }
}

?>
