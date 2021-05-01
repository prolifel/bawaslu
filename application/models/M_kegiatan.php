<?php

class M_kegiatan extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('kegiatan');
    }

    public function detail_kegiatan($id = null)
    {
        $query = $this->db->get_where('kegiatan', array('id' => $id))->row();
        return $query;
    }

    public function delete_kegiatan($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function update_kegiatan($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
