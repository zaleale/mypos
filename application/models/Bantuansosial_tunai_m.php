<?php defined('BASEPATH') or exit('No direct script access allowed');

class Bantuansosial_tunai_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('p_bantuansosial_tunai');
        if ($id != null) {
            $this->db->where('bantuansosial_tunai_id', $id);
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
        $this->db->insert('p_bantuansosial_tunai', $params);
    }

    public function edit($post)
    {
        // tambah dan edit biar satu form
        $params = [
            'question' => $post['question'],
            'answer' => $post['answer'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('bantuansosial_tunai_id', $post['id']);
        $this->db->update('p_bantuansosial_tunai', $params);
    }

    public function del($id)
    {
        $this->db->where('bantuansosial_tunai_id', $id);
        $this->db->delete('p_bantuansosial_tunai');
    }
}
