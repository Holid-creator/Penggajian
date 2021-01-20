<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form_login extends CI_Controller
{
	public function index()
	{
		$this->_rules();
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Form Login';
			$this->load->view('template_admin/header', $data);
			$this->load->view('form_login');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$cek = $this->penggajian_model->cek_login($username, $password);

			if ($cek == false) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Username atau Password Salah
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('form_login');
			} else {
				$this->session->set_userdata('hak_akses', $cek->hak_akses);
				$this->session->set_userdata('n_peg', $cek->n_peg);
				$this->session->set_userdata('foto', $cek->foto);
				$this->session->set_userdata('id_peg', $cek->id_peg);
				$this->session->set_userdata('nik', $cek->nik);
				switch ($cek->hak_akses) {
					case 1:
						redirect('admin/dashboard');
						break;
					case 2:
						redirect('pegawai/dashboard');
						break;
					default:
						break;
				}
			}
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('username', 'username', 'required', ['required' => 'Username Wajib diisi']);
		$this->form_validation->set_rules('password', 'password', 'required', ['required' => 'Password Wajib diisi']);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('form_login');
	}
}
