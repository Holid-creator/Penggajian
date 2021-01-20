<?php

class Slip_gaji extends CI_Controller
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
        $data['title'] = 'Slip Gaji Pegawai';
        $data['pegawai'] = $this->penggajian_model->get_data('pegawai')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/slip_gaji');
        $this->load->view('template_admin/footer');
    }

    public function cetak_slip()
    {
        $data['title'] = 'Cetak Slip Gaji';
        $data['potongan'] = $this->penggajian_model->get_data('pot_gaji')->result();
        $nama = $this->input->post('n_peg');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $blnthn = $bulan . $tahun;
        $data['cetakSlip'] = $this->db->query("SELECT pegawai.nik, pegawai.n_peg, jabatan.n_jab, jabatan.gaji_pokok, jabatan.transport, jabatan.uang_makan, data_kehadiran.alpha, data_kehadiran.bulan
        FROM pegawai
        INNER JOIN data_kehadiran ON data_kehadiran.nik = pegawai.nik
        INNER JOIN jabatan ON jabatan.n_jab = pegawai.n_jab
        WHERE data_kehadiran.bulan = '$blnthn'
        AND data_kehadiran.n_peg = '$nama'
        ORDER BY pegawai.n_peg ASC")->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('admin/cetak_slip', $data);
    }
}
