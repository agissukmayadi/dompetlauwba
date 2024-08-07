<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bank extends CI_Controller
{

    // view
    public function view_bank()
    {

        $this->load->view('admin/include/header');
        $this->load->view('admin/include/sidebar');
        $this->load->view('admin/include/navbar');
        $this->load->view('admin/bank/view_bank');
        $this->load->view('admin/include/footer');
    }

    // tambah
    public function form_tambah()
    {

        $this->load->view('admin/include/header');
        $this->load->view('admin/include/sidebar');
        $this->load->view('admin/include/navbar');
        $this->load->view('admin/bank/tambah_bank');
        $this->load->view('admin/include/footer');
    }
    public function insert()
    {
        $atas_nama = $this->input->post('atas_nama', TRUE);
        $nama_bank = $this->input->post('nama_bank', TRUE);
        $no_rek = $this->input->post('no_rek', TRUE);
        $data = array(
            'atas_nama' => $atas_nama,
            'nama_bank' => $nama_bank,
            'no_rek' => $no_rek
        );

        $this->db->insert('bank', $data);
        redirect('Bank/view_bank');
    }

    function form_edit($id_bank)
    {
        $data['bank'] = $this->Bank_m->select_db($id_bank);
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/sidebar');
        $this->load->view('admin/include/navbar');
        $this->load->view('admin/bank/edit_bank', $data);
        $this->load->view('admin/include/footer');
    }
    public function update()
    {
        $id_bank = $this->input->post('id_bank', TRUE);
        $atas_nama = $this->input->post('atas_nama', TRUE);
        $nama_bank = $this->input->post('nama_bank', TRUE);
        $no_rek = $this->input->post('no_rek', TRUE);

        $data = array(
            'atas_nama' => $atas_nama,
            'nama_bank' => $nama_bank,
            'no_rek' => $no_rek
        );

        $this->Bank_m->update($id_bank, $data);
        redirect('Bank/view_bank');

    }
    function delete($id_bank)
    {
        $this->Bank_m->delete($id_bank);
        redirect('Bank/view_bank');
    }


}