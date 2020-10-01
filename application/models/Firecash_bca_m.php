<?php defined('BASEPATH') or exit('No direct script access allowed');

class Firecash_bca_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('p_firecash_bca');
        if ($id != null) {
            $this->db->where('firecash_bca_id', $id);
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
        $this->db->insert('p_firecash_bca', $params);
    }

    public function edit($post)
    {
        // tambah dan edit biar satu form
        $params = [
            'question' => $post['question'],
            'answer' => $post['answer'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('firecash_bca_id', $post['id']);
        $this->db->update('p_firecash_bca', $params);
    }

    public function del($id)
    {
        $this->db->where('firecash_bca_id', $id);
        $this->db->delete('p_firecash_bca');
    }
}
