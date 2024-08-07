<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Front extends CI_Controller
{

	// view
	public function index()
	{
		$data['active'] = "home";
		$this->load->view('front/include/header', $data);
		$this->load->view('front/index');
		$this->load->view('front/include/footer');

	}
	public function about()
	{

		$data['active'] = "about";
		$this->load->view('front/include/header', $data);
		$this->load->view('front/about');
		$this->load->view('front/include/footer');

	}
	public function contact()
	{

		$data['active'] = "contact";
		$this->load->view('front/include/header', $data);
		$this->load->view('front/contact');
		$this->load->view('front/include/footer');

	}
	public function program()
	{

		$data['active'] = "program";
		$this->load->view('front/include/header', $data);
		$this->load->view('front/program');
		$this->load->view('front/include/footer');

	}

	public function donasi()
	{

		$data['active'] = "donasi";
		$this->load->view('front/include/header', $data);
		$this->load->view('front/donasi');
		$this->load->view('front/include/footer');
	}

	public function aksi_donasi()
	{
		$this->form_validation->set_rules('id_bank', 'Bank Tujuan', 'required', [
			'required' => 'Pilih salah satu %s!',
		]);
		$this->form_validation->set_rules("email", "Email", "required|trim|valid_email", [
			"required" => "%s tidak boleh kosong",
			"valid_email" => "%s tidak valid",
		]);
		$this->form_validation->set_rules("no_rek_pengirim", "Nomor Rekening", "required|trim|numeric", [
			"required" => "%s tidak boleh kosong",
			"numeric" => "%s harus berupa angka",
		]);
		$this->form_validation->set_rules("atas_nama_pengirim", "Atas Nama Rekening", "required|trim", [
			"required" => "%s tidak boleh kosong"
		]);
		$this->form_validation->set_rules("nominal", "Nominal", "required|numeric", [
			"required" => "%s tidak boleh kosong",
			"numeric" => "%s harus berupa angka",
		]);


		if ($this->form_validation->run() == false) {
			$data['active'] = "donasi";
			$this->load->view('front/include/header', $data);
			$this->load->view('front/donasi');
			$this->load->view('front/include/footer');
		} else {
			$data = [
				"id_bank" => $this->input->post("id_bank"),
				"email" => $this->input->post('email'),
				"no_rek_pengirim" => $this->input->post('no_rek_pengirim'),
				"atas_nama_pengirim" => $this->input->post('atas_nama_pengirim'),
				"nominal" => $this->input->post('nominal'),
			];
			$bukti_transfer = $_FILES['bukti_transfer']['name'];
			if ($bukti_transfer) {
				$config['upload_path'] = './assets/images/bukti_transfer/';
				$config['allowed_types'] = 'jpeg|jpg|png';
				$config['max_size'] = '3000';
				$config['file_name'] = 'bukti_transfer' . time();
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if (!$this->upload->do_upload('bukti_transfer')) {
					$data['active'] = "donasi";
					$data['error'] = ["bukti_transfer" => $this->upload->display_errors("<small class='text-danger'>", "</small>")];
					$this->load->view('front/include/header', $data);
					$this->load->view('front/donasi');
					$this->load->view('front/include/footer');
				} else {
					$upload_data = $this->upload->data();
					$bukti_transfer_file = $upload_data["file_name"];
					$data['bukti_transfer'] = $bukti_transfer_file;
					$data['id_donation'] = generate_id_donation();
					$data['tanggal'] = date('Y-m-d');
					$sendEmail = $this->_sendEmail($data);
					if ($sendEmail) {
						$data['status'] = "CHECK";
						$this->Donasi_m->insert($data);
						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Donasi Berhasil, Silahkan cek email untuk mengecek status Donasi!</div>');
						redirect('front/donasi');
					} else {
						$data['status'] = "FAILED";
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Donasi Gagal, Silahkan coba lagi!</div>');
						redirect('front/donasi');
					}
				}
			}

		}
	}

	private function _sendEmail($data)
	{
		$emailOwner = 'agissukmayadi009@gmail.com';
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => $emailOwner,
			'smtp_pass' => 'yalusawmccifyoyw',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		];

		$this->load->library('email', $config);

		$this->email->from($emailOwner, 'Yayasan Lauwba');
		$this->email->to($data['email']);
		$this->email->subject('Yayasan Lauwba - Kode Donasi');
		$this->email->message('Kode Donasi Anda : ' . $data['id_donation']);


		return $this->email->send();
	}

	public function all_berita()
	{

		$data['active'] = "berita";
		$this->load->view('front/include/header', $data);
		$this->load->view('front/all_berita');
		$this->load->view('front/include/footer');

	}
	public function detail_berita($id_berita)
	{

		$data['active'] = null;
		$data['berita'] = $this->Berita_m->select_db($id_berita);
		$this->load->view('front/include/header', $data);
		$this->load->view('front/detail_berita', $data);
		$this->load->view('front/include/footer');

	}

	public function detail_program($id_program)
	{

		$data['active'] = null;
		$data['program'] = $this->Program_m->select_db($id_program);
		$this->load->view('front/include/header', $data);
		$this->load->view('front/detail_program', $data);
		$this->load->view('front/include/footer');

	}


}