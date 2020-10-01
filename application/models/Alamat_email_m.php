<?php defined('BASEPATH') or exit('No direct script access allowed');

class Alamat_email_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('p_alamat_email');
        if ($id != null) {
            $this->db->where('alamat_email_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        //tambah dan edit biar satu form
        $params = [
            'nama' => $post['nama'],
            'email' => $post['email'],
            'no_telepon' => $post['no_telepon'],
        ];
        $this->db->insert('p_alamat_email', $params);
    }

    public function edit($post)
    {
        //tambah dan edit biar satu form
        $params = [
            'nama' => $post['nama'],
            'email' => $post['email'],
            'no_telepon' => $post['no_telepon'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('alamat_email_id', $post['id']);
        $this->db->update('p_alamat_email', $params);
    }

    public function del($id)
    {
        $this->db->where('alamat_email_id', $id);
        $this->db->delete('p_alamat_email');
    }
}
