<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->session->set_flashdata('not-login', 'Gagal!');
		if (!$this->session->userdata('email')) {
			redirect('welcome/admin');
		}
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('admin', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('admin/index');
	}

	public function about_bawaslu()
	{
		$data['user'] = $this->db->get_where('admin', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('admin/about_bawaslu');
	}

	// Management kegiatan

	public function data_kegiatan()
	{
		$this->load->model('m_kegiatan');

		$data['user'] = $this->db->get_where('admin', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['user'] = $this->m_kegiatan->tampil_data()->result();
		$this->load->view('admin/data_kegiatan', $data);
	}

	public function detail_kegiatan($id)
	{
		$this->load->model('m_kegiatan');
		$where = array('id' => $id);
		$detail = $this->m_kegiatan->detail_kegiatan($id);
		$data['detail'] = $detail;
		// var_dump($data);
		// die();
		$this->load->view('admin/detail_kegiatan', $data);
	}

	// get view update
	public function update_kegiatan($id)
	{
		$this->load->model('m_kegiatan');
		$where = array('id' => $id);
		$data['user'] = $this->m_kegiatan->update_kegiatan($where, 'kegiatan')->result();
		$this->load->view('admin/update_kegiatan', $data);
	}

	// post update
	public function kegiatan_edit()
	{
		$this->load->model('m_kegiatan');

		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$tanggal = $this->input->post('tanggal');
		$divisi = $this->input->post('divisi');
		$image = $_FILES['foto']['name'];
		
		$data = array(
			'nama' => $nama,
			'tanggal' => $tanggal,
			'divisi' => $divisi
		);

		$config['allowed_types'] = 'jpg|png';
		$config['max_size'] = '5120';
		$config['upload_path'] = './uploads/';

		$this->load->library('upload', $config);
		// jika ada post gambar
		if($image != ""){
			if ($this->upload->do_upload('foto')) {
				$imageBaru = $this->upload->data('foto');
				$this->db->set('image', $imageBaru);
			} else {
				echo $this->upload->display_errors();
			}
		}else{
			$imageLama = $this->input->post('imageLama');
		}

		$where = array(
			'id' => $id,
		);

		$this->m_kegiatan->update_data($where, $data, 'kegiatan');
		$this->session->set_flashdata('success-edit', 'berhasil');
		redirect('admin/data_kegiatan');
	}

	public function delete_kegiatan($id)
	{
		$this->load->model('m_kegiatan');
		$where = array('id' => $id);
		$this->m_kegiatan->delete_kegiatan($where, 'kegiatan');
		$this->session->set_flashdata('user-delete', 'berhasil');
		redirect('admin/data_kegiatan');
	}

	// Get & Post db kegiatan
    public function add_kegiatan()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[4]', [
            'required' => 'Harap isi kolom Kegiatan.',
            'min_length' => 'Nama terlalu pendek.',
        ]);
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required', [
            'required' => 'Harap isi kolom Tanggal.'
        ]);
        $this->form_validation->set_rules('divisi', 'Divisi', 'required', [
            'required' => 'Harap isi kolom Divisi.'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/add_kegiatan');
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

				$tanggal = $this->input->post('tanggal', true);
				$data = [
					'nama' => htmlspecialchars($this->input->post('nama', true)),
					'tanggal' => htmlspecialchars($tanggal),
					'image' => $path,
					'divisi' => htmlspecialchars($this->input->post('divisi')),
				];
				print_r($data);
				if($this->db->insert('kegiatan', $data)){
					$this->session->set_flashdata('success-reg', 'Berhasil!');
					redirect(base_url('admin/data_kegiatan'));
				}else{

				}
			}else{
				echo $this->upload->display_errors();
			}
        }
    }

	// CRUD user

	// index semua data user
	public function data_user()
	{
		$this->load->model('m_user');
		$data['user'] = $this->db->get_where('admin', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['user'] = $this->m_user->tampil_data()->result();
		$this->load->view('admin/data_user', $data);
	}

	public function detail_user($id)
	{
		$this->load->model('m_user');
		$where = array('id' => $id);
		$detail = $this->m_user->detail_user($id);
		$data['detail'] = $detail;
		$this->load->view('admin/detail_user', $data);
	}

	// Get 
	public function update_user($id)
	{
		$this->load->model('m_user');
		$where = array('id' => $id);
		$data['user'] = $this->m_user->update_user($where, 'user')->result();
		$this->load->view('admin/update_user', $data);
	}

	// Post
	public function user_edit()
	{
		$this->load->model('m_user');
		$id = $this->input->post('id');
		$telepon = $this->input->post('telepon');
		$email = $this->input->post('email');
		$nama = $this->input->post('nama');
		$divisi = $this->input->post('divisi');

		$data = array(
			'id' => $id,
			'telepon' => $telepon,
			'email' => $email,
			'nama' => $nama,
			'divisi' => $divisi
		);

		$where = array(
			'id' => $id,
		);

		$this->m_user->update_data($where, $data, 'user');
		$this->session->set_flashdata('success-edit', 'berhasil');
		redirect('admin/data_user');
	}

	public function delete_user($id)
	{
		$this->load->model('m_user');
		$where = array('id' => $id);
		$this->m_user->delete_user($where, 'user');
		$this->session->set_flashdata('user-delete', 'berhasil');
		redirect('admin/data_user');
	}

	// Get & Post
	public function add_user()
	{
		$this->form_validation->set_rules('telepon', 'Telepon', 'required', [
			'required' => 'Harap isi kolom Nomor.',
		]);

		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'Email ini telah digunakan!',
			'required' => 'Harap isi kolom email.',
			'valid_email' => 'Masukan email yang valid.',
		]);

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[4]', [
			'required' => 'Harap isi kolom Nama.',
			'min_length' => 'Nama terlalu pendek.',
		]);

		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]|matches[password2]', [
			'required' => 'Harap isi kolom Password.',
			'matches' => 'Password tidak sama!',
			'min_length' => 'Password terlalu pendek',
		]);

		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', [
			'matches' => 'Password tidak sama!',
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('user/add_user');
		} else {
			$data = [
				'telepon' => htmlspecialchars($this->input->post('telepon', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'divisi' => htmlspecialchars($this->input->post('divisi', true)),
			];

			$this->db->insert('user', $data);

			$this->session->set_flashdata('success-reg', 'Berhasil!');
			redirect(base_url('admin/data_user'));
		}
	}

	// divisi

	// get view
	public function update_divisi($id)
	{
		$this->load->model('m_divisi');
		$where = array('id' => $id);
		$data['user'] = $this->m_divisi->update_divisi($where, 'divisi')->result();
		$this->load->view('admin/update_divisi', $data);
	}

	// post update divisi
	public function divisi_edit()
	{
		$this->load->model('m_divisi');

		$id = $this->input->post('id');
		$title = $this->input->post('title');

		$data = array(
			'title' => $title,
		);

		$where = array(
			'id' => $id,
		);

		$this->m_divisi->update_data($where, $data, 'divisi');
		$this->session->set_flashdata('success-edit', 'berhasil');
		redirect('admin/data_divisi');
	}

	// get view
	public function data_divisi()
	{
		$this->load->model('m_divisi');

		$data['user'] = $this->db->get_where('admin', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['user'] = $this->m_divisi->tampil_data()->result();
		$this->load->view('admin/data_divisi', $data);
	}

	public function delete_divisi($id)
	{
		$this->load->model('m_divisi');
		$where = array('id' => $id);
		$this->m_divisi->delete_divisi($where, 'divisi');
		$this->session->set_flashdata('user-delete', 'berhasil');
		redirect('admin/data_divisi');
	}

	public function tambah_divisi()
	{
		$this->form_validation->set_rules('title', 'Title', 'required|trim|min_length[4]', [
			'required' => 'Harap isi kolom Divisi.',
			'min_length' => 'Divisi terlalu pendek.',
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/add_divisi');
		} else {
			$data = [
				'title' => htmlspecialchars($this->input->post('title', true)),
			];

			$this->db->insert('divisi', $data);
			$this->session->set_flashdata('success-reg', 'Berhasil!');
			redirect(base_url('admin/data_divisi'));
		}
	}
}
