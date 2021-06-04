<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Product';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();


        $data['produk'] = $this->Produk_model->getProdukDetail($data['user']['idCompany']);


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tenant/product/index', $data);
        $this->load->view('templates/footer', $data);
    }


    public function tambah()
    {
        $data['title'] = 'Product';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('image', 'image', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('tenant/product/tambah', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Produk_model->tambahProduk();
            redirect('Produk');
        }
    }

    function tambahProduk()
    {
        $name = $this->input->post('name');
        $price = $this->input->post('price');
        $idCompany = $this->input->post('idCompany');
        $image = $_FILES['image']['name'];

        if ($image = '') {
            echo $this->upload->display_errors();
        } else {
            $config['upload_path']          = './assets/img/produk/';
            $config['allowed_types']        = 'png|jpg|gif';
            $config['max_size']             = 25000;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Oops Terjadi Kesalahan !</div>');
                redirect("Produk/tambah");
            } else {
                $image = $this->upload->data('file_name');
            }

            $data = array(
                "name" => $name,
                "price" => $price,
                'image' => $image,
                "idCompany" => $idCompany
            );

            $this->Produk_model->tambahProduk($data, 'product');
            redirect('Produk');
        }
    }

    public function hapusProduk($id)
    {
        $this->Produk_model->hapusProduk($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus !</div>');
        redirect('Produk');
    }

    public function editProduk($id)
    {
        $data['title'] = 'Product';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $data['produk'] = $this->Produk_model->getProdukById($id);

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('image', 'Image', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('tenant/product/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Produk_model->editDataProduk($id);
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('Produk');
        }
    }

    function prosesedit()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $price = $this->input->post('price');
        $idCompany = $this->input->post('idCompany');
        $image = $_FILES['image']['name'];

        if (empty($_FILES["image"]['name'])) {
            $image = $this->input->post('old_file');
            $data = array(
                "name" => $name,
                "price" => $price,
                'image' => $image,
                "idCompany" => $idCompany
            );
            $this->Produk_model->editProduk($data, 'product', $id);
            redirect('Produk');
        } else {
            $config['upload_path']          = './assets/img/produk/';
            $config['allowed_types']        = 'png|jpg|gif';
            $config['max_size']             = 25000;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Oops Terjadi Kesalahan !</div>');
                redirect("Produk/edit");
            } else {
                $image = $this->upload->data('file_name');
            }

            $data = array(
                "name" => $name,
                "price" => $price,
                'image' => $image,
                "idCompany" => $idCompany
            );

            $this->Produk_model->editProduk($data, 'product', $id);
            redirect('Produk');
        }
    }
}
