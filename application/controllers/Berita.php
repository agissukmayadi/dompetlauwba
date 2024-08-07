<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{

    // view
    public function view_berita()
    {

        $this->load->view('admin/include/header');
        $this->load->view('admin/include/sidebar');
        $this->load->view('admin/include/navbar');
        $this->load->view('admin/berita/view_berita');
        $this->load->view('admin/include/footer');
    }

    // tambah
    public function form_tambah()
    {

        $this->load->view('admin/include/header');
        $this->load->view('admin/include/sidebar');
        $this->load->view('admin/include/navbar');
        $this->load->view('admin/berita/tambah_berita');
        $this->load->view('admin/include/footer');
    }

    public function insert()
    {
        $berita = $this->input->post('berita', TRUE);
        $deskripsi = $this->input->post('deskripsi', TRUE);
        $image_name = $berita;
        $config['file_name'] = $image_name;
        $config['upload_path'] = './assets/images/berita/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['overwrite'] = TRUE;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('gambar')) {
            $image = $this->upload->data();
            $image = $image['file_name'];

            $t = time();

            $data = array(
                'berita' => $berita,
                'deskripsi' => $deskripsi,
                'gambar' => $image,
                'tanggal' => date("Y-m-d", $t)
            );

            $this->db->insert('berita', $data);
            redirect('Berita/view_berita');

        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">' . $this->upload->display_errors() . '</div>');
            redirect('Berita/form_tambah');
        }
    }

    //edit
    function form_edit($id_berita)
    {
        $data['berita'] = $this->Berita_m->select_db($id_berita);
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/sidebar');
        $this->load->view('admin/include/navbar');
        $this->load->view('admin/berita/edit_berita', $data);
        $this->load->view('admin/include/footer');
    }
    public function update()
    {
        $id_berita = $this->input->post('id_berita', TRUE);
        $berita = $this->input->post('berita', TRUE);
        $deskripsi = $this->input->post('deskripsi', TRUE);
        $latest = './assets/images/berita/' . $this->input->post('latest', TRUE);

        if (!empty($_FILES['gambar']['name'])) {

            if (file_exists($latest)) {
                unlink($latest);
            }
            $image_name = $berita;
            $config['file_name'] = $image_name;
            $config['upload_path'] = './assets/images/berita/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['overwrite'] = TRUE;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('gambar')) {
                $image = $this->upload->data();
                $image = $image['file_name'];

                $t = time();

                $data = array(
                    'berita' => $berita,
                    'deskripsi' => $deskripsi,
                    'gambar' => $image,
                    'tanggal' => date("Y-m-d", $t),
                );

                $this->Berita_m->update($id_berita, $data);
                redirect('Berita/view_berita');

            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">' . $this->upload->display_errors() . '</div>');
                redirect('Berita/form_edit/' . $id_berita);
            }
        } else {

            $t = time();

            $data = array(
                'berita' => $berita,
                'deskripsi' => $deskripsi,
                'tanggal' => date("Y-m-d", $t),
            );

            $this->Berita_m->update($id_berita, $data);
            redirect('Berita/view_berita');
        }

    }

    //hapus
    function delete($id_berita, $gambar)
    {
        $this->Berita_m->delete($id_berita);
        $delete = './assets/images/berita/' . $gambar;

        if (file_exists($delete)) {
            unlink($delete);
        }
        redirect('Berita/view_berita');

    }


}