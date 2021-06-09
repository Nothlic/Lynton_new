<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Promotion_model');
        $this->load->model('Event_model');
        is_logged_in();
    }

    public function index($id)
    {
        $data['url'] = 'event';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['live'] = $this->db->query("SELECT * FROM live_stream where idCompany = '" . $id . "'")->row_array();
        $data['products'] = $this->db->query("SELECT * FROM product where idCompany = '" . $id . "'")->result_array();
        $data['company'] = $this->db->query("SELECT * FROM company where id = '" . $id . "' ")->row_array();


        $idUser = $data['user']['id'];
        $idLive = $data['live']['id'];
        $idCompany = $data['company']['id'];

        $dataReport = array(
            'idUser' => $idUser,
            'idLive' => $idLive,
            'idCompany' => $idCompany
        );

        
        $this->Event_model->addReport($dataReport, 'report');

        $this->load->view('event/layout/header');
        $this->load->view('event/index', $data);
        $this->load->view('event/layout/footer', $data);
    }

    public function home()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['url'] = 'tenant';
        $data['promotions'] = $this->db->query('SELECT * FROM promotion where isActive = 1')->result_array();
        $category_temp = $this->db->query("SELECT category FROM contactPerson where id = '" . $data['user']['idUser'] . "' ")->row_array();
        $categories = explode(',', $category_temp['category']);

        $sql = "";
        $i = 0;
        foreach ($categories as $category) {
            if ($i != 0) {
                $sql .= ' OR ';
            }
            $sql .= " category = '" . $category . "' ";
            ++$i;
        }

        $companies = $this->db->query("SELECT * FROM company where $sql ")->result_array();

        $sql_company = "";
        $j = 0;

        foreach ($companies as $company) {
            if ($j != 0) {
                $sql_company .= ' OR ';
            }
            $sql_company .= " idCompany = '" . $company['id'] . "' ";
            ++$j;
        }

        $data['live_streams'] = $this->db->query("SELECT * FROM live_stream where ($sql_company)  and isActive = 1")->result_array();

        $data['lives'] = $this->db->query("SELECT * FROM live_stream where isActive = 1")->result_array();

        $this->load->view('event/layout/header');
        $this->load->view('event/home', $data);
        $this->load->view('event/layout/footer', $data);
    }

    public function filterEvent()
    {
        $category = $this->input->post('category');

        if ($category == null || $category == "") {
            $data = $this->db->query("SELECT * FROM live_stream where isActive = 1")->result();
            echo json_encode($data);
        } else {
            $companies = $this->db->query("SELECT id FROM company where category = '" . $category . "' ")->result_array();

            $filter = "";
            $i = 0;

            foreach ($companies as $company) {
                if ($i != 0) {
                    $filter .= ' OR ';
                }
                $filter .= " idCompany = '" . $company['id'] . "' ";
                ++$i;
            }


            $data = $this->db->query("SELECT * FROM live_stream where ($filter)  and isActive = 1")->result();
            echo json_encode($data);
        }
    }

    public function profile()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['url'] = 'tenant';

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('event/layout/header');
            $this->load->view('event/profile', $data);
            $this->load->view('event/layout/footer', $data);
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
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
            redirect('event/profile');
        }
    }

    public function category()
    {
        $data['url'] = 'tenant';
        $this->load->view('event/layout/header');
        $this->load->view('event/category');
        $this->load->view('event/layout/footer', $data);
    }

    public function promosi($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['promotion'] = $this->Promotion_model->getPromotionById($id);
        $data['url'] = 'promotion';
        $data['anotherPromotion'] = $this->db->query("SELECT * FROM promotion where id != '$id' AND isActive = 1 LIMIT 3 ")->result_array();

        $this->load->view('event/layout/header');
        $this->load->view('event/promosi', $data);
        $this->load->view('event/layout/footer', $data);
    }

    public function getChat()
    {
        $idCompany = $this->input->post('idCompany', TRUE);

        $data = $this->db->query("SELECT * FROM chat where idCompany = '" . $idCompany . "' ")->result();
        echo json_encode($data);
    }

    function create()
    {
        $idCompany = $this->input->post('idCompany', TRUE);
        $name = $this->input->post('name', TRUE);
        $image = $this->input->post('image', TRUE);
        $text = $this->input->post('text', TRUE);

        $data = array(
            'idCompany' => $idCompany,
            'name' => $name,
            'image' => $image,
            'text' => $text
        );
        $this->db->insert('chat', $data);

        //        require_once __DIR__ . '/views/vendor/autoload.php';
        require_once(APPPATH . '/views/vendor/autoload.php');
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher\Pusher(
            '4989a359f9bcaf8f0e4e',
            '76862773ca7291fca4b2',
            '1104017',
            $options
        );

        $data['message'] = 'success';
        $pusher->trigger('my-channel', 'my-event', $data);
    }
}
