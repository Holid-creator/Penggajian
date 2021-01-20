<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('hak_akses') != '2') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Maaf Anda Belum Login
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('form_login');
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $id = $this->session->userdata('id_peg');
        $data['pegawai'] = $this->db->query("SELECT * FROM pegawai WHERE id_peg = '$id'")->result();

        $this->load->view('template_peg/header', $data);
        $this->load->view('template_peg/sidebar');
        $this->load->view('pegawai/dashboard', $data);
        $this->load->view('template_peg/footer');
    }
}
