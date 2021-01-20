<?php

class Penggajian extends CI_Controller
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
        $data['title'] = 'Data Gaji Pegawai';
        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $blnthn = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $blnthn = $bulan . $tahun;
        }

        $data['potongan'] = $this->penggajian_model->get_data('pot_gaji')->result();
        $data['gaji'] = $this->db->query("SELECT pegawai.nik, pegawai.n_peg, pegawai.jk, jabatan.n_jab, jabatan.gaji_pokok, jabatan.transport, jabatan.uang_makan, data_kehadiran.alpha
        FROM pegawai
        INNER JOIN data_kehadiran ON data_kehadiran.nik = pegawai.nik
        INNER JOIN jabatan ON jabatan.n_jab = pegawai.n_jab
        WHERE data_kehadiran.bulan = '$blnthn' ORDER BY pegawai.n_peg ASC")->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/gaji', $data);
        $this->load->view('template_admin/footer');
    }

    public function cetak_gaji()
    {
        $data['title'] = 'Cetak Data Gaji Pegawai';
        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $blnthn = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $blnthn = $bulan . $tahun;
        }

        $data['potongan'] = $this->penggajian_model->get_data('pot_gaji')->result();
        $data['cetakGaji'] = $this->db->query("SELECT pegawai.nik, pegawai.n_peg, pegawai.jk, jabatan.n_jab, jabatan.gaji_pokok, jabatan.transport, jabatan.uang_makan, data_kehadiran.alpha
        FROM pegawai
        INNER JOIN data_kehadiran ON data_kehadiran.nik = pegawai.nik
        INNER JOIN jabatan ON jabatan.n_jab = pegawai.n_jab
        WHERE data_kehadiran.bulan = '$blnthn'
        ORDER BY pegawai.n_peg ASC")->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('admin/cetakGaji', $data);
    }
}
