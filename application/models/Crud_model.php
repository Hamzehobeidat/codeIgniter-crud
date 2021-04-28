<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crud_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function createData()
    {
        $data = array(
            'lastName' => $this->input->post('lastName'),
            'firstName' => $this->input->post('firstName'),
            'birthdate' => $this->input->post('birthdate'),
            'contactNo' => $this->input->post('contactNo'),
            'bio' => $this->input->post('bio')
        );
        $this->db->insert('crud_tbl', $data);
    }


    function getAllData()
    {
        $query = $this->db->query('SELECT * FROM crud_tbl');
        return $query->result();
    }

    function getData($id)
    {
        $query = $this->db->query('SELECT * FROM crud_tbl WHERE `id` =' . $id);
        return $query->row();
    }

    function updateData($id)
    {
        $data = array(
            'lastName' => $this->input->post('lastName'),
            'firstName' => $this->input->post('firstName'),
            'birthdate' => $this->input->post('birthdate'),
            'contactNo' => $this->input->post('contactNo'),
            'bio' => $this->input->post('bio')
        );
        $this->db->where('id', $id);
        $this->db->update('crud_tbl', $data);
    }

    function deleteData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('crud_tbl');
    }
}
