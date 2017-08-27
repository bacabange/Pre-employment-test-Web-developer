<?php 

include 'base.php';

// Patient Model
// Core Class
class patient extends base
{
    public function __construct()
    {
        // constructing the parent gives us 
        // access to the db through $this->db
        // which is a native php mysqli interface
        parent::__construct();
    }

    public function list_all()
    {
        $result_array = array();
        $result = $this->db->query('select * from patients');

        return parent::result_array($result);
    }

    public function list_by_age($age = 50)
    {
        $result_array = array();
        $result = $this->db->query('select * from patients where patient_age >= ' . $age);

        return parent::result_array($result);
    }

    public function list_group_by_age()
    {
        $result_array = array();
        $result = $this->db->query('select patient_age, count(patient_id) as quantity from patients group by patient_age');
        return parent::result_array($result);
    }
}