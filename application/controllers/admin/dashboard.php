<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('hak_akses') != '1') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Maaf Anda Belum Login
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('form_login');
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard';

        $pegawai = $this->db->query("SELECT * FROM pegawai");
        $data['pegawai'] = $pegawai->num_rows();

        $admin = $this->db->query("SELECT * FROM pegawai WHERE n_jab = 'Admin'");
        $data['admin'] = $admin->num_rows();

        $jabatan = $this->db->query("SELECT * FROM jabatan");
        $data['jabatan'] = $jabatan->num_rows();

        $kehadiran = $this->db->query("SELECT * FROM data_kehadiran");
        $data['hadir'] = $kehadiran->num_rows();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('template_admin/footer');
    }
}
