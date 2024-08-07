<?php

class Donasi_m extends CI_model
{
    //select
    function select()
    {
        $this->db->select('donate.*, bank.atas_nama, bank.no_rek, bank.nama_bank');
        $this->db->join("bank", "bank.id_bank = donate.id_bank");
        $this->db->from('donate');

        return $this->db->get()->result();
    }

    //edit
    function select_db($id_donasi)
    {
        $this->db->select('*');
        $this->db->from('donasi');
        $this->db->where('id_donasi', $id_donasi);

        return $this->db->get()->row_array();
    }

    function get_where($kode_donasi)
    {
        $this->db->select('donate.*, bank.atas_nama, bank.no_rek, bank.nama_bank');
        $this->db->join("bank", "bank.id_bank = donate.id_bank");
        $this->db->from('donate');
        $this->db->where('id_donation', $kode_donasi);
        return $this->db->get()->row_array();
    }
    function update($id_donation, $data)
    {
        $this->db->where('id_donation', $id_donation);
        $this->db->update('donate', $data);
    }

    public function insert($data)
    {
        $this->db->insert('donate', $data);
    }

    public function total_donasi()
    {
        $this->db->select_sum('nominal');
        $this->db->where('status', 'SUCCESS');
        return $this->db->get('donate')->row_array();
    }

}

?>