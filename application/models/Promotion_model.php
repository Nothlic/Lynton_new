<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Promotion_model extends CI_Model
{

    public function getPromotion()
    {
        return $this->db->get('promotion')->result_array();
    }

    public function getPromotionDetail($id)
    {
        return $this->db->query("SELECT * FROM promotion where id = '$id' ")->result_array();
    }


    public function tambahPromotion($data, $tabel)
    {
        $this->db->insert($tabel, $data);
    }

    public function hapusPromotion($id)
    {
        $this->db->delete('promotion', ['id' => $id]);
    }

    public function getPromotionById($id)
    {
        return $this->db->get_where('promotion', ['id' => $id])->row_array();
    }

    public function editPromotion($data, $tabel, $promotion_id)
    {
        $this->db->where("id", $promotion_id);
        $this->db->update($tabel, $data);
    }

    function get_all_promotion()
    {
        $hasil = $this->db->get('promotion');
        return $hasil->result();
    }
}
