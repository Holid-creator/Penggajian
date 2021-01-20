<?php

class Ubah_pass extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Ubah Password';

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('pegawai/ubah_pass', $data);
        $this->load->view('template_admin/footer');
    }

    public function aksi()
    {
        $passb = $this->input->post('passb');
        $passn = $this->input->post('passn');

        $this->form_validation->set_rules('passb', 'Password Baru', 'required|matches[passn]', ['required' => 'Password Baru Wajib Diisi', 'matches' => 'Password tidak sama, Harap di ulang kembali']);
        $this->form_validation->set_rules('passn', 'Password Ulang', 'required', ['required' => 'Password Ulang Wajib Diisi']);

        if ($this->form_validation->run() != false) {
            $data = array('password' => md5($passn));
            $id   = array('id_peg' => $this->session->userdata('id_peg'));

            $this->penggajian_model->update_data('pegawai', $data, $id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Password Berhasil Diubah
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('form_login');
        } else {
            $data['title'] = 'Ubah Password';
            $this->load->view('template_admin/header', $data);
            $this->load->view('template_admin/sidebar');
            $this->load->view('pegawai/ubah_pass', $data);
            $this->load->view('template_admin/footer');
        }
    }
}
