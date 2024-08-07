<?php

class Bank_m extends CI_model
{
    //select
    function select()
    {
        $this->db->select('*');
        $this->db->from('bank');

        return $this->db->get()->result();
    }

    //edit
    function select_db($id_bank)
    {
        $this->db->select('*');
        $this->db->from('bank');
        $this->db->where('id_bank', $id_bank);

        return $this->db->get()->row_array();
    }
    function update($id_bank, $data)
    {
        $this->db->where('id_bank', $id_bank);
        $this->db->update('bank', $data);
    }

    //delete
    function delete($id_bank)
    {
        $this->db->where('id_bank', $id_bank);
        $this->db->delete('bank');
    }

}

?>