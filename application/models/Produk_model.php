<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_model extends CI_Model
{

    public function getProduk()
    {
        return $this->db->get('product')->result_array();
    }

    public function getProdukDetail($id)
    {
        return $this->db->query("SELECT * FROM product where idCompany = '$id' ")->result_array();
    }


    public function tambahProduk($data, $tabel)
    {
        $this->db->insert($tabel, $data);
    }

    public function hapusProduk($id)
    {
        $this->db->delete('product', ['id' => $id]);
    }

    public function getProdukById($id)
    {
        return $this->db->get_where('product', ['id' => $id])->row_array();
    }

    public function editProduk($data, $tabel, $produk_id)
    {
        $this->db->where("id", $produk_id);
        $this->db->update($tabel, $data);
    }

    function get_all_produk()
    {
        $hasil = $this->db->get('product');
        return $hasil->result();
    }
}
