<?php

class Pegawai extends CI_Controller
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
        $data['title'] = 'Data Pegawai';
        $data['pegawai'] = $this->penggajian_model->get_data('pegawai')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/pegawai', $data);
        $this->load->view('template_admin/footer');
    }

    public function tambah_data()
    {
        $data['title'] = 'Form Tambah Data Pegawai';
        $data['jabatan'] = $this->penggajian_model->get_data('jabatan')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/tambah_pegawai', $data);
        $this->load->view('template_admin/footer');
    }

    public function tambah_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == false) {
            $this->tambah_data();
        } else {
            $nik       = $this->input->post('nik');
            $n_peg     = $this->input->post('n_peg');
            $jk        = $this->input->post('jk');
            $n_jab     = $this->input->post('n_jab');
            $tgl_masuk = $this->input->post('tgl_masuk');
            $status    = $this->input->post('status');
            $hak_akses = $this->input->post('hak_akses');
            $username  = $this->input->post('username');
            $password  = md5($this->input->post('password'));
            $foto      = $_FILES['foto']['name'];

            if ($foto == '') {
            } else {
                $config['upload_path'] = './assets/foto';
                $config['allowed_types'] = 'jpeg|jpg|png|tiff';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('foto')) {
                    echo 'Foto Gagal DiUpload';
                } else {
                    $foto = $this->upload->data('file_name');
                }
            }

            $data = array(
                'nik'       => $nik,
                'n_peg'     => $n_peg,
                'jk'        => $jk,
                'n_jab'     => $n_jab,
                'tgl_masuk' => $tgl_masuk,
                'status'    => $status,
                'hak_akses' => $hak_akses,
                'username'  => $username,
                'password'  => $password,
                'foto'      => $foto
            );

            $this->penggajian_model->insert_data($data, 'pegawai');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Ditambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/pegawai');
        }
    }

    public function update_data($id)
    {
        $data['title'] = 'Form Ubah Data Pegawai';
        $where = array('id_peg' => $id);
        $data['jabatan'] = $this->penggajian_model->get_data('jabatan')->result();
        $data['pegawai'] = $this->db->query("SELECT * FROM pegawai WHERE id_peg = '$id'")->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/update_pegawai', $data);
        $this->load->view('template_admin/footer');
    }

    public function update_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $id        = $this->input->post('id_peg');
            $nik       = $this->input->post('nik');
            $n_peg     = $this->input->post('n_peg');
            $jk        = $this->input->post('jk');
            $n_jab     = $this->input->post('n_jab');
            $tgl_masuk = $this->input->post('tgl_masuk');
            $status    = $this->input->post('status');
            $hak_akses = $this->input->post('hak_akses');
            $username  = $this->input->post('username');
            $password  = md5($this->input->post('password'));
            $foto      = $_FILES['foto']['name'];

            if ($foto) {
                $config['upload_path'] = './assets/foto';
                $config['allowed_types'] = 'jpg|jpeg|png|tiff';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto')) {
                    $foto = $this->upload->data('file_name');
                    $this->db->set('foto', $foto);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = array(
                'nik'       => $nik,
                'n_peg'     => $n_peg,
                'jk'        => $jk,
                'n_jab'     => $n_jab,
                'tgl_masuk' => $tgl_masuk,
                'status'    => $status,
                'hak_akses' => $hak_akses,
                'username'  => $username,
                'password'  => $password,
                // 'foto'      => $foto
            );

            $where = array('id_peg' => $id);

            $this->penggajian_model->update_data('pegawai', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Diubah
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/pegawai');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nik', 'nik', 'required', ['required' => 'NIK jabatan Harus Diisi']);
        $this->form_validation->set_rules('n_peg', 'n_peg', 'required', ['required' => 'Nama Pegawai Harus Diisi']);
        $this->form_validation->set_rules('username', 'username', 'required', ['required' => 'Username Harus Diisi']);
        $this->form_validation->set_rules('password', 'password', 'required', ['required' => 'Password Harus Diisi']);
        $this->form_validation->set_rules('jk', 'jk', 'required', ['required' => 'Jenis Kelamin Harus Diisi']);
        $this->form_validation->set_rules('n_jab', 'n_jab', 'required', ['required' => 'Jabatan Harus Diisi']);
        $this->form_validation->set_rules('tgl_masuk', 'tgl_masuk', 'required', ['required' => 'Tanggal Masuk Harus Diisi']);
        $this->form_validation->set_rules('status', 'status', 'required', ['required' => 'Satus Harus Diisi']);
    }

    public function delete_data($id)
    {
        $where = array('id_peg' => $id);
        $this->penggajian_model->delete_data($where, 'pegawai');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/pegawai');
    }
}
