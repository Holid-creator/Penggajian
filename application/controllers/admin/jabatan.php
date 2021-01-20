<?php

class Jabatan extends CI_Controller
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
        $data['title'] = 'Jabatan';
        $data['jabatan'] = $this->penggajian_model->get_data('jabatan')->result();

        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/jabatan', $data);
        $this->load->view('template_admin/footer');
    }

    public function tambah_data()
    {
        $data['title'] = 'Form Tambah Data Jabatan';

        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/tambah_jabatan', $data);
        $this->load->view('template_admin/footer');
    }

    public function tambah_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == false) {
            $this->tambah_data();
        } else {
            $n_jab = $this->input->post('n_jab');
            $gaji_pokok = $this->input->post('gaji_pokok');
            $transport = $this->input->post('transport');
            $uang_makan = $this->input->post('uang_makan');

            $data = array(
                'n_jab' => $n_jab,
                'gaji_pokok' => $gaji_pokok,
                'transport' => $transport,
                'uang_makan' => $uang_makan,
            );

            $this->penggajian_model->insert_data($data, 'jabatan');
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">Data Berhasil Ditambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/jabatan');
        }
    }

    public function update_data($id)
    {
        $data['title'] = 'Form Ubah Data Jabatan';
        $where = array('id_jab' => $id);
        $data['jabatan'] = $this->db->query("SELECT * FROM jabatan WHERE id_jab = '$id'")->result();

        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/update_jabatan', $data);
        $this->load->view('template_admin/footer');
    }

    public function update_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $id = $this->input->post('id_jab');
            $n_jab = $this->input->post('n_jab');
            $gaji_pokok = $this->input->post('gaji_pokok');
            $transport = $this->input->post('transport');
            $transport = $this->input->post('transport');
            $uang_makan = $this->input->post('uang_makan');

            $data = array(
                'n_jab' => $n_jab,
                'gaji_pokok' => $gaji_pokok,
                'transport' => $transport,
                'uang_makan' => $uang_makan,
            );

            $where = array('id_jab' => $id);

            $this->penggajian_model->update_data('jabatan', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Diubah
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/jabatan');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('n_jab', 'n_jab', 'required', ['required' => 'Nama jabatan Harus Diisi']);
        $this->form_validation->set_rules('gaji_pokok', 'gaji_pokok', 'required', ['required' => 'Gaji Pokok jabatan Harus Diisi']);
        $this->form_validation->set_rules('transport', 'transport', 'required', ['required' => 'Tj. Transport Harus Diisi']);
        $this->form_validation->set_rules('uang_makan', 'uang_makan', 'required', ['required' => 'Uang Makan Harus Diisi']);
    }

    public function delete_data($id)
    {
        $where = array('id_jab' => $id);
        $this->penggajian_model->delete_data($where, 'jabatan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/jabatan');
    }
}
