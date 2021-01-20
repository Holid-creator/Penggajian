<?php

class Absensi extends CI_Controller
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
        $data['title'] = 'Data Absensi';

        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $blnthn = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $blnthn = $bulan . $tahun;
        }

        $data['absensi'] = $this->db->query("SELECT data_kehadiran.*, pegawai.n_peg, pegawai.jk, pegawai.n_jab
        FROM data_kehadiran
        INNER JOIN pegawai ON data_kehadiran.nik = pegawai.nik
        INNER JOIN jabatan ON pegawai.n_jab = jabatan.n_jab
        WHERE data_kehadiran.bulan = '$blnthn'
        ORDER BY pegawai.n_peg ASC")->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/absensi', $data);
        $this->load->view('template_admin/footer');
    }

    public function input_absensi()
    {
        if ($this->input->post('submit', true) == 'submit') {
            $post = $this->input->post();

            foreach ($post['bulan'] as $key => $value) {
                if ($post['bulan'][$key] != '' || $post['nik'][$key] != '') {
                    $simpan[] = array(
                        'bulan' => $post['bulan'][$key],
                        'nik'   => $post['nik'][$key],
                        'n_peg' => $post['n_peg'][$key],
                        'jk'    => $post['jk'][$key],
                        'n_jab' => $post['n_jab'][$key],
                        'hadir' => $post['hadir'][$key],
                        'sakit' => $post['sakit'][$key],
                        'alpha' => $post['alpha'][$key]
                    );
                }
            }

            $this->penggajian_model->insert_batch('data_kehadiran', $simpan);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Ditambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/absensi');
        }

        $data['title'] = 'Form Input Absensi';
        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $blnthn = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $blnthn = $bulan . $tahun;
        }

        $data['input_absen'] = $this->db->query("SELECT pegawai.*, jabatan.n_jab
        FROM pegawai
        INNER JOIN jabatan ON pegawai.n_jab=jabatan.n_jab
        WHERE NOT EXISTS (SELECT * FROM data_kehadiran WHERE bulan='$blnthn'
        AND pegawai.nik=data_kehadiran.nik)
        ORDER BY pegawai.n_peg ASC")->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/input_absensi', $data);
        $this->load->view('template_admin/footer');
    }
}
