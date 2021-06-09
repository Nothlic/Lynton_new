<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['url'] = 'home';
		$this->load->view('layout/header');
		$this->load->view('home');
		$this->load->view('layout/footer', $data);
	}

	public function tenant()
    {
        $data['url'] = 'tenant';
        $this->load->view('layout/header');
        $this->load->view('tenant');
        $this->load->view('layout/footer', $data);
    }

	public function contact()
	{
		$this->form_validation->set_rules('firstName', 'First Name', 'required|trim');
		$this->form_validation->set_rules('lastName', 'Last Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('phoneNumber', 'Phone Numbers', 'required');


		if ($this->form_validation->run() == false) {
			$data['url'] = 'home';
			$this->load->view('layout/header');
			$this->load->view('home');
			$this->load->view('layout/footer', $data);
		} else {
			$email = $this->input->post('email', true);

			$name = htmlspecialchars($this->input->post('firstName')) . ' ' . htmlspecialchars($this->input->post('lastName'));

			$data = [
				'name' => $name,
				'phoneNumber' => $this->input->post('phoneNumber'),
				'message' => $this->input->post('message'),
                'isNew' => 1
			];

			$this->db->insert('contactPerson', $data);


            $user = $this->db->query('SELECT * FROM contactPerson ORDER BY id desc LIMIT 1')->row_array();

            $dataRegister = [
                'name' => $name,
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'idUser' => $user['id'],
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $dataRegister);


            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created.</div>');
			redirect('login');
		}
	}
}
