<?php

class Pot_gaji extends CI_Controller
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

        $data['title'] = 'Setting Potongan Gaji';
        $data['pot_gaji'] = $this->penggajian_model->get_data('pot_gaji')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/pot_gaji', $data);
        $this->load->view('template_admin/footer');
    }

    public function tambah()
    {

        $data['title'] = 'Tambah Potongan Gaji';
        $data['pot_gaji'] = $this->penggajian_model->get_data('pot_gaji')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/tambah_pg', $data);
        $this->load->view('template_admin/footer');
    }

    public function tambah_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == false) {
            $this->tambah();
        } else {
            $potongan = $this->input->post('potongan');
            $jml_pot = $this->input->post('jml_pot');

            $data = array(
                'potongan' => $potongan,
                'jml_pot' => $jml_pot
            );

            $this->penggajian_model->insert_data($data, 'pot_gaji');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Potongan Gaji Berhasil Ditambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/pot_gaji');
        }
    }

    public function update($id)
    {
        $data['title'] = 'Form Ubah Data Potongan Gaji';
        $where = array('id' => $id);
        $data['pot_gaji'] = $this->db->query("SELECT * FROM pot_gaji WHERE id = '$id'")->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/update_pg', $data);
        $this->load->view('template_admin/footer');
    }

    public function update_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == false) {
            $this->update();
        } else {
            $id = $this->input->post('id');
            $potongan = $this->input->post('potongan');
            $jml_pot = $this->input->post('jml_pot');

            $data = array(
                'potongan' => $potongan,
                'jml_pot' => $jml_pot
            );

            $where = array('id' => $id);

            $this->penggajian_model->update_data('pot_gaji', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Potongan Gaji Berhasil Diubah
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/pot_gaji');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('potongan', 'potongan', 'required', ['required' => 'Potongan Wajib Diisi']);
        $this->form_validation->set_rules('jml_pot', 'jml_pot', 'required', ['required' => 'Jumlah Potongan Wajib Diisi']);
    }

    public function delete_data($id)
    {
        $where = array('id' => $id);
        $this->penggajian_model->delete_data($where, 'pot_gaji');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Potongan Gaji Berhasil Dihapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/pot_gaji');
    }
}
