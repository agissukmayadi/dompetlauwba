<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{

    // view
    public function view_contact()
    {

        $this->load->view('admin/include/header');
        $this->load->view('admin/include/sidebar');
        $this->load->view('admin/include/navbar');
        $this->load->view('admin/contact/view_contact');
        $this->load->view('admin/include/footer');
    }

    // tambah
    public function form_tambah()
    {

        $this->load->view('admin/include/header');
        $this->load->view('admin/include/sidebar');
        $this->load->view('admin/include/navbar');
        $this->load->view('admin/contact/tambah_contact');
        $this->load->view('admin/include/footer');
    }
    public function insert()
    {
        $deskripsi = $this->input->post('deskripsi', TRUE);
        $alamat = $this->input->post('alamat', TRUE);
        $telp = $this->input->post('telp', TRUE);
        $email = $this->input->post('email', TRUE);

        $data = array(
            'deskripsi' => $deskripsi,
            'alamat' => $alamat,
            'telp' => $telp,
            'email' => $email
        );

        $this->db->insert('contact', $data);
        redirect('Contact/view_contact');

    }

    //edit
    function form_edit($id_contact)
    {
        $data['contact'] = $this->Contact_m->select_db($id_contact);
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/sidebar');
        $this->load->view('admin/include/navbar');
        $this->load->view('admin/contact/edit_contact', $data);
        $this->load->view('admin/include/footer');
    }
    public function update()
    {

        $id_contact = $this->input->post('id_contact', TRUE);
        $deskripsi = $this->input->post('deskripsi', TRUE);
        $alamat = $this->input->post('alamat', TRUE);
        $telp = $this->input->post('telp', TRUE);
        $email = $this->input->post('email', TRUE);
        $latest = './assets/images/about/' . $this->input->post('latest', TRUE);
        if (!empty($_FILES['gambar']['name'])) {
            if (file_exists($latest)) {
                unlink($latest);
            }
            $image_name = time();
            $config['file_name'] = $image_name;
            $config['upload_path'] = './assets/images/contact/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['overwrite'] = TRUE;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('gambar')) {
                $image = $this->upload->data();
                $image = $image['file_name'];

                $data = array(
                    'gambar' => $image,
                    'deskripsi' => $deskripsi,
                    'alamat' => $alamat,
                    'telp' => $telp,
                    'email' => $email
                );

                $this->Contact_m->update($id_contact, $data);
                redirect('Contact/view_contact');

            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">' . $this->upload->display_errors() . '</div>');
                redirect('Contact/form_edit/' . $id_contact);
            }
        } else {
            $data = array(
                'deskripsi' => $deskripsi,
                'alamat' => $alamat,
                'telp' => $telp,
                'email' => $email
            );

            $this->Contact_m->update($id_contact, $data);
            redirect('Contact/view_contact');
        }

    }

    //hapus
    function delete($id_contact)
    {
        $this->Contact_m->delete($id_contact);
        redirect('Contact/view_contact');

    }


}