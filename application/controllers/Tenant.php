<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tenant extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tenant_model');
        $this->load->model('Produk_model');
        $this->load->library('form_validation');
        is_logged_in();
    }

//	public function index()
//	{
//		$data['url'] = 'tenant';
//		$this->load->view('layout/header');
//		$this->load->view('tenant');
//		$this->load->view('layout/footer', $data);
//	}

    public function questionnaireTenant()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['url'] = 'tenant';
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('event/layout/header');
            $this->load->view('event/tenant', $data);
            $this->load->view('event/layout/footer', $data);
        } else {
            $category = $this->input->post('category', true);
            $address = $this->input->post('address', true);
            $idCompany = $this->input->post('idCompany', true);
            $email = $this->input->post('email', true);
            $isNew = 0;

            $data = [
                'category' => $category,
                'address' => $address,
                'isNew' => $isNew
            ];

            $this->db->where('id', $idCompany);
            $this->db->update('company', $data);

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->db->where('email', $email);
            $this->db->update('user');

            redirect('tenant/tenantProduct');
        }
    }


    public function tenantProduct()
    {
        $data['title'] = 'Product';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');
        $data['produk'] = $this->Produk_model->getProdukDetail($data['user']['idCompany']);


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tenant/product/index', $data);
        $this->load->view('templates/footer');
    }

    public function addProduct()
    {
        $data['title'] = 'Product';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('price', 'price', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('tenant/product/create', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name', true);
            $price = $this->input->post('price', true);
            $description = $this->input->post('description', true);
            $idCompany = $this->input->post('idCompany', true);

            $data = [
                'name' => $name,
                'price' => $price,
                'description' => $description,
                'idCompany' => $idCompany,
            ];

            $this->db->insert('contactPerson', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please activate your account</div>');
            redirect('tenant/tenantProduct');
        }
    }

    public function liveStream()
    {
        $data['title'] = 'Live Stream';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['youtube'] = $this->Tenant_model->getCodeLiveDetail($data['user']['idCompany']);
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->form_validation->set_rules('menu', 'Menu', 'required');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tenant/live-stream/index', $data);
        $this->load->view('templates/footer');
    }

    public function createLiveStream()
    {
        $data['title'] = 'Live Stream';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();
        $this->form_validation->set_rules('code', 'Embed Code', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('tenant/live-stream/create', $data);
            $this->load->view('templates/footer', $data);
        } else {

            $code = $this->input->post('code');
            $title = $this->input->post('title');
            $isActive = $this->input->post('isActive');
            $idCompany = $this->input->post('idCompany');
            $image = $_FILES['image']['name'];

            if ($image = '') {
                echo $this->upload->display_errors();
            } else {
                $config['upload_path'] = './assets/img/banner/';
                $config['allowed_types'] = 'png|jpg|gif';
                $config['max_size'] = 25000;

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image')) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Oops Terjadi Kesalahan !</div>');
                    redirect("tenant/liveStream");
                } else {
                    $image = $this->upload->data('file_name');
                }

                if ($isActive == null) {
                    $isActive = 0;
                }

                $data = array(
                    "code" => $code,
                    "title" => $title,
                    "isActive" => $isActive,
                    "idCompany" => $idCompany,
                    "banner" => $image
                );

                $this->Tenant_model->tambahYoutube($data, 'live_stream');
                redirect('tenant/liveStream');
            }
        }
    }

    public function editLiveStream($id)
    {
        $data['title'] = 'Live Stream';
        $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $data['youtube'] = $this->Tenant_model->getYoutubeById($id);
        $this->form_validation->set_rules('code', 'Embed Code', 'required');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tenant/live-stream/edit', $data);
        $this->load->view('templates/footer');
    }

    function prosesEditLiveStream()
    {
        $id = $this->input->post('id');
        $code = $this->input->post('code');
        $title = $this->input->post('title');
        $isActive = $this->input->post('isActive');
        $old_file = $this->input->post('oldFile');
        $image = $_FILES['image']['name'];


        if ($isActive == null) {
            $isActive = 0;
        }

        if ($image = '') {
            $data = array(
                "code" => $code,
                "title" => $title,
                "isActive" => $isActive,
                "banner" => $old_file
            );
            $this->Tenant_model->editYoutube($data, 'live_stream', $id);
            redirect('tenant/liveStream');
        } else {
            $config['upload_path'] = './assets/img/banner/';
            $config['allowed_types'] = 'png|jpg|gif';
            $config['max_size'] = 25000;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                $data = array(
                    "code" => $code,
                    "title" => $title,
                    "isActive" => $isActive,
                    "banner" => $old_file
                );
                $this->Tenant_model->editYoutube($data, 'live_stream', $id);
                redirect('tenant/liveStream');
            } else {
                $image = $this->upload->data('file_name');
            }

            $data = array(
                "code" => $code,
                "title" => $title,
                "isActive" => $isActive,
                "banner" => $image
            );
            $this->Tenant_model->editYoutube($data, 'live_stream', $id);
            redirect('tenant/liveStream');
        }
    }

    public function deleteLiveStream($id)
    {
        $this->Tenant_model->hapusYoutube($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus !</div>');
        redirect('tenant/liveStream');
    }

    public function setting()
    {
        $data['title'] = 'Setting';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('tenant/setting', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->dispay_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('tenant/setting');
        }
    }

    public function report()
    {
        $data['title'] = 'Report';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['youtube'] = $this->Tenant_model->getCodeLiveDetail($data['user']['idCompany']);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $data['report'] = $this->db->query("
            SELECT 
                user.name,
                live_stream.title,
                report.date_create
            FROM report 
            
            JOIN user ON user.id = report.idUser
            JOIN live_stream ON live_stream.id = report.idLive
            
            WHERE report.idCompany = '".$data['user']['idCompany']."'
            
            GROUP BY 
                report.idUser,
                report.idCompany,
                report.idLive
        ")->result_array();

//        echo json_encode(array($report));

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tenant/report', $data);
        $this->load->view('templates/footer');
    }
}
