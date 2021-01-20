<?php

class Gaji extends CI_Controller
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
        $data['title'] = 'Data Gaji';
        $nik = $this->session->userdata('nik');
        $data['potongan'] = $this->penggajian_model->get_data('pot_gaji')->result();
        $data['gaji'] = $this->db->query("SELECT pegawai.n_peg, pegawai.nik, jabatan.gaji_pokok, jabatan.transport, jabatan.uang_makan, data_kehadiran.alpha, data_kehadiran.bulan, data_kehadiran.id_hdr
        FROM pegawai
        INNER JOIN data_kehadiran ON data_kehadiran.nik = pegawai.nik
        INNER JOIN jabatan ON jabatan.n_jab = pegawai.n_jab
        WHERE data_kehadiran.nik = '$nik' ORDER BY data_kehadiran.bulan DESC")->result();

        $this->load->view('template_peg/header', $data);
        $this->load->view('template_peg/sidebar');
        $this->load->view('pegawai/gaji', $data);
        $this->load->view('template_peg/footer');
    }

    public function cetak($id)
    {
        $data['title'] = 'Cetak Slip Gaji';
        $data['potongan'] = $this->penggajian_model->get_data('pot_gaji')->result();

        $data['cetakSlip'] = $this->db->query("SELECT pegawai.nik, pegawai.n_peg, jabatan.n_jab, jabatan.gaji_pokok, jabatan.transport, jabatan.uang_makan, data_kehadiran.alpha, data_kehadiran.bulan
        FROM pegawai
        INNER JOIN data_kehadiran ON data_kehadiran.nik = pegawai.nik
        INNER JOIN jabatan ON jabatan.n_jab = pegawai.n_jab
        WHERE data_kehadiran.id_hdr = '$id'")->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('pegawai/cetak', $data);
    }
}
