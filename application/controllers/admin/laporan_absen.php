<?php

class Laporan_absen extends CI_Controller
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

        $data['title'] = 'Laporan Absensi';

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/laporan_absen');
        $this->load->view('template_admin/footer');
    }

    public function cetak_absen()
    {
        $data['title'] = 'Cetak Laporan Absensi';
        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $blnthn = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $blnthn = $bulan . $tahun;
        }
        $data['laporan_kh'] = $this->db->query("SELECT * FROM data_kehadiran WHERE bulan = '$blnthn' ORDER BY n_peg ASC")->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('admin/cetak_absen');
    }
}
