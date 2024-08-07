<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Program extends CI_Controller
{

    // view
    public function view_program()
    {

        $this->load->view('admin/include/header');
        $this->load->view('admin/include/sidebar');
        $this->load->view('admin/include/navbar');
        $this->load->view('admin/program/view_program');
        $this->load->view('admin/include/footer');
    }

    // tambah
    public function form_tambah()
    {

        $this->load->view('admin/include/header');
        $this->load->view('admin/include/sidebar');
        $this->load->view('admin/include/navbar');
        $this->load->view('admin/program/tambah_program');
        $this->load->view('admin/include/footer');
    }
    public function insert()
    {
        $program = $this->input->post('program', TRUE);
        $deskripsi = $this->input->post('deskripsi', TRUE);
        $image_name = $program;
        $config['file_name'] = $image_name;
        $config['upload_path'] = './assets/images/program/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['overwrite'] = TRUE;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('gambar')) {
            $image = $this->upload->data();
            $image = $image['file_name'];

            $data = array(
                'program' => $program,
                'deskripsi' => $deskripsi,
                'gambar' => $image
            );

            $this->db->insert('program', $data);
            redirect('Program/view_program');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">' . $this->upload->display_errors() . '</div>');
            redirect('Program/form_tambah');
        }
    }

    //edit
    function form_edit($id_program)
    {
        $data['program'] = $this->Program_m->select_db($id_program);
        $this->load->view('admin/include/header');
        $this->load->view('admin/include/sidebar');
        $this->load->view('admin/include/navbar');
        $this->load->view('admin/program/edit_program', $data);
        $this->load->view('admin/include/footer');
    }
    public function update()
    {
        $id_program = $this->input->post('id_program', TRUE);
        $program = $this->input->post('program', TRUE);
        $deskripsi = $this->input->post('deskripsi', TRUE);
        $latest = './assets/images/program/' . $this->input->post('latest', TRUE);
        if (!empty($_FILES['gambar']['name'])) {
            if (file_exists($latest)) {
                unlink($latest);
            }
            $image_name = $program;
            $config['file_name'] = $image_name;
            $config['upload_path'] = './assets/images/program/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['overwrite'] = TRUE;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('gambar')) {
                $image = $this->upload->data();
                $image = $image['file_name'];

                $data = array(
                    'program' => $program,
                    'deskripsi' => $deskripsi,
                    'gambar' => $image
                );

                $this->Program_m->update($id_program, $data);
                redirect('Program/view_program');

            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">' . $this->upload->display_errors() . '</div>');
                redirect('Program/form_edit/' . $id_program);
            }
        } else {
            $data = array(
                'program' => $program,
                'deskripsi' => $deskripsi
            );
            $this->Program_m->update($id_program, $data);
            redirect('Program/view_program');
        }
    }

    //hapus
    function delete($id_program, $gambar)
    {
        $this->Program_m->delete($id_program);
        $delete = './assets/images/program/' . $gambar;
        if (file_exists($delete)) {
            unlink($delete);
        }
        redirect('Program/view_program');

    }


}