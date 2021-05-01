<?php

class M_divisi extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('divisi');
    }

    public function detail_divisi($id = null)
    {
        $query = $this->db->get_where('divisi', array('id' => $id))->row();
        return $query;
    }

    public function delete_divisi($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function update_divisi($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
