<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Promotion extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Promotion_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
//        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Promotion';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();


        $data['promotion'] = $this->Promotion_model->getPromotion();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('promotion/index', $data);
        $this->load->view('templates/footer', $data);
    }


    public function tambah()
    {
        $data['title'] = 'Promotion';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('image', 'image', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('promotion/tambah', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Promotion_model->tambahProduk();
            redirect('Promotion');
        }
    }

    function tambahPromotion()
    {
        $title = $this->input->post('title');
        $description = $this->input->post('description');
        $isActive = $this->input->post('isActive');
        $image = $_FILES['image']['name'];

        if ($image = '') {
            echo $this->upload->display_errors();
        } else {
            $config['upload_path']          = './assets/img/promotion/';
            $config['allowed_types']        = 'png|jpg|gif';
            $config['max_size']             = 25000;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Oops Terjadi Kesalahan !</div>');
                redirect("Promotion/tambah");
            } else {
                $image = $this->upload->data('file_name');
            }

            $data = array(
                "title" => $title,
                "description" => $description,
                'image' => $image,
                "isActive" => $isActive
            );

            $this->Promotion_model->tambahPromotion($data, 'promotion');
            redirect('Promotion');
        }
    }

    public function hapusPromotion($id)
    {
        $this->Promotion_model->hapusPromotion($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus !</div>');
        redirect('Promotion');
    }

    public function editPromotion($id)
    {
        $data['title'] = 'Promotion';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $data['promotion'] = $this->Promotion_model->getPromotionById($id);


        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('image', 'image', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('promotion/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Promotion_model->editDataProduk($id);
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('Produk');
        }
    }

    function prosesedit()
    {
        $id = $this->input->post('id');
        $title = $this->input->post('title');
        $description = $this->input->post('description');
        $isActive = $this->input->post('isActive');
        $image = $_FILES['image']['name'];

        if (empty($_FILES["image"]['name'])) {
            $image = $this->input->post('old_file');
            $data = array(
                "title" => $title,
                "description" => $description,
                'image' => $image,
                "isActive" => $isActive
            );
            $this->Promotion_model->editPromotion($data, 'promotion', $id);
            redirect('Promotion');
        } else {
            $config['upload_path']          = './assets/img/promotion/';
            $config['allowed_types']        = 'png|jpg|gif';
            $config['max_size']             = 25000;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Oops Terjadi Kesalahan !</div>');
                redirect("Promotion");
            } else {
                $image = $this->upload->data('file_name');
            }

            $data = array(
                "title" => $title,
                "description" => $description,
                'image' => $image,
                "isActive" => $isActive
            );

            $this->Promotion_model->editPromotion($data, 'promotion', $id);
            redirect('Promotion');
        }
    }
}
