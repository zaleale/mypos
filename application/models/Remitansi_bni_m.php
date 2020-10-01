<?php defined('BASEPATH') or exit('No direct script access allowed');

class Remitansi_bni_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('p_remitansi_bni');
        if ($id != null) {
            $this->db->where('remitansi_bni_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        // tambah dan edit biar satu form
        $params = [
            'question' => $post['question'],
            'answer' => $post['answer'],
        ];
        $this->db->insert('p_remitansi_bni', $params);
    }

    public function edit($post)
    {
        // tambah dan edit biar satu form
        $params = [
            'question' => $post['question'],
            'answer' => $post['answer'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('remitansi_bni_id', $post['id']);
        $this->db->update('p_remitansi_bni', $params);
    }

    public function del($id)
    {
        $this->db->where('remitansi_bni_id', $id);
        $this->db->delete('p_remitansi_bni');
    }
}
