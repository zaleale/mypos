<?php defined('BASEPATH') or exit('No direct script access allowed');

class Btn_ebatarapos_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('p_btn_ebatarapos');
        if ($id != null) {
            $this->db->where('btn_ebatarapos_id', $id);
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
        $this->db->insert('p_btn_ebatarapos', $params);
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
        $this->db->where('btn_ebatarapos_id', $post['id']);
        $this->db->update('p_btn_ebatarapos', $params);
    }

    public function del($id)
    {
        $this->db->where('btn_ebatarapos_id', $id);
        $this->db->delete('p_btn_ebatarapos');
    }
}
