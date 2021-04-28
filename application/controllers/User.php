<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // $this->session->set_flashdata('not-login', 'Gagal!');
        // if (!$this->session->userdata('email')) {
        //     redirect('welcome');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('siswa', ['email' =>
            $this->session->userdata('email')])->row_array();

        $this->load->view('user/index');
        $this->load->view('template/footer');
    }

    public function kelas10()
    {
        $data['user'] = $this->db->get_where('siswa', ['email' =>
            $this->session->userdata('email')])->row_array();

        $this->load->view('user/kelas10');
        $this->load->view('template/footer');
    }

    public function kelas11()
    {
        $data['user'] = $this->db->get_where('siswa', ['email' =>
            $this->session->userdata('email')])->row_array();

        $this->load->view('user/kelas11');
        $this->load->view('template/footer');
    }

    public function kelas12()
    {
        $data['user'] = $this->db->get_where('siswa', ['email' =>
            $this->session->userdata('email')])->row_array();

        $this->load->view('user/kelas12');
        $this->load->view('template/footer');
    }

	// Get tambah kegiatan
    public function registration()
    {
        $this->load->view('guru/registrationsiswa');
        
    }

	// Post db kegiatan
    public function registration_act()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[4]', [
            'required' => 'Harap isi kolom Kegiatan.',
            'min_length' => 'Nama terlalu pendek.',
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|min_length[4]', [
            'required' => 'Harap isi kolom Tanggal.',
            'min_length' => 'Tanggal terlalu pendek.',
        ]);
        $this->form_validation->set_rules('is_active', 'Is_active', 'required|trim|min_length[4]', [
            'required' => 'Harap isi kolom Divisi.',
            'min_length' => 'Nama terlalu pendek.',
        ]);
        // $this->form_validation->set_rules('retype_password', 'Password', 'required|trim|matches[password]', [
        //     'matches' => 'Password tidak sama!',
        // ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('guru/registrationsiswa');
        } else {
			// set config foto
			// $config['file_name'] = $id;
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = '5120';
			$config['overwrite'] = TRUE;

			$this->load->library('upload', $config);
			if($this->upload->do_upload('foto')){
				$upload_data = $this->upload->data();
				$path = './uploads/'.$upload_data['file_name'];

				$email = $this->input->post('email', true);
				$data = [
					'nama' => htmlspecialchars($this->input->post('nama', true)),
					'email' => htmlspecialchars($email),
					'image' => $path,
					'is_active' => htmlspecialchars($this->input->post('is_active')),
				];
				print_r($data);
				if($this->db->insert('siswa', $data)){
					$this->session->set_flashdata('success-reg', 'Berhasil!');
					redirect(base_url('admin/data_siswa'));
				}else{

				}
			}else{
				echo $this->upload->display_errors();
			}
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'ini email disini',
            'smtp_pass' => 'Isi Password gmail disini',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
        ];

        $this->email->initialize($config);

        $data = array(
            'name' => 'syauqi',
            'link' => ' ' . base_url() . 'welcome/verify?email=' . $this->input->post('email') . '& token' . urlencode($token) . '"',
        );

        $this->email->from('LearnifyEducations@gmail.com', 'Learnify');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $link =
            $this->email->subject('Verifikasi Akun');
            $body = $this->load->view('template/email-template.php', $data, true);
            $this->email->message($body);
        } else {
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die();
        }
    }

}
