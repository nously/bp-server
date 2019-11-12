<?php

class Lawyers extends CI_Model {
    public function getThree() {
        $this->db->select('Lawyer.id, Lawyer.name, Field.name as field, Lawyer.photo');
        $this->db->from('Lawyer');
        $this->db->limit(3);
        $this->db->order_by('rand()');
        $this->db->join('Field', 'Field.id = Lawyer.field_id');
        $query = $this->db->get();
         return $query->result();
    }

    public function getAll() {
        $this->db->select('Lawyer.id, Lawyer.name, Field.name as field, Lawyer.photo');
        $this->db->from('Lawyer');
        $this->db->order_by('rand()');
        $this->db->join('Field', 'Field.id = Lawyer.field_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function getLawyerEducation() {
        $this->db->select('*');
        $this->db->from('Lawyer');
        $this->db->order_by('rand()');
        $this->db->join('Education', 'Education.lawyer_id = Lawyer.id');
        $query = $this->db->get();
        $result = $query->result();

        $nestedResult = array();
        $maxId = -1;
        foreach ($result as $row) {
            if (!isset($nestedResult[$row->id]) || $nestedResult[$row->id] === null)
                $nestedResult[$row->id] = array();
            array_push($nestedResult[$row->id], $row);
        }
        
        return array_values($nestedResult);
    }
}

?>
