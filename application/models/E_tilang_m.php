<?php defined('BASEPATH') or exit('No direct script access allowed');

class E_tilang_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('p_e_tilang');
        if ($id != null) {
            $this->db->where('e_tilang_id', $id);
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
            'image' => $post['image'],
        ];
        $this->db->insert('p_e_tilang', $params);
    }

    public function edit($post)
    {
        // tambah dan edit biar satu form
        $params = [
            'question' => $post['question'],
            'answer' => $post['answer'],
            'image' => $post['image'],
            'updated' => date('Y-m-d H:i:s')
        ];
        if ($post['image'] != null) {
            $params['image'] = $post['image'];
        }
        $this->db->where('e_tilang_id', $post['id']);
        $this->db->update('p_e_tilang', $params);
    }

    public function del($id)
    {
        $this->db->where('e_tilang_id', $id);
        $this->db->delete('p_e_tilang');
    }
}
