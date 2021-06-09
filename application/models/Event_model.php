<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event_model extends CI_Model
{
    public function addReport($data, $tabel)
    {
        $this->db->insert($tabel, $data);
    }
}
