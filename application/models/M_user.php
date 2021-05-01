<?php

class M_user extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('user');
    }

    public function detail_user($id = null)
    {
        $query = $this->db->get_where('user', array('id' => $id))->row();
        return $query;
    }

    public function delete_user($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function update_user($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
