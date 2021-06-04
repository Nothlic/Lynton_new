<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tenant_model extends CI_Model
{

    public function getCodeLive()
    {
        return $this->db->get('live_stream')->result_array();
    }

    public function getCodeLiveDetail($id)
    {
        return $this->db->query("SELECT * FROM live_stream where idCompany = '$id'")->result_array();
    }

    public function tambahYoutube($data, $tabel)
    {
        $this->db->insert($tabel, $data);
    }

    public function hapusYoutube($id)
    {
        $this->db->delete('live_stream', ['id' => $id]);
    }

    public function getYoutubeById($id)
    {
        return $this->db->get_where('live_stream', ['id' => $id])->row_array();
    }

    public function editYoutube($data, $tabel, $idYoutube)
    {
        $this->db->where("id", $idYoutube);
        $this->db->update($tabel, $data);
    }
}
