<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Donasi extends CI_Controller
{

    public function get($kode_donasi)
    {
        $data = [
            'donasi' => $this->Donasi_m->get_where($kode_donasi)
        ];

        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    // view
    public function view_donasi()
    {

        $this->load->view('admin/include/header');
        $this->load->view('admin/include/sidebar');
        $this->load->view('admin/include/navbar');
        $this->load->view('admin/donasi/view_donasi');
        $this->load->view('admin/include/footer');
    }

    public function success($id_donation)
    {
        $data = [
            'status' => "SUCCESS"
        ];
        $this->Donasi_m->update($id_donation, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Donasi Berhasil di Approve!</div>');
        redirect('Donasi/view_donasi');
    }

    public function failed($id_donation)
    {
        $data = [
            'status' => "FAILED"
        ];
        $this->Donasi_m->update($id_donation, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Donasi Berhasil tidak di Approve!</div>');
        redirect('Donasi/view_donasi');
    }

}