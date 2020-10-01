<?php defined('BASEPATH') or exit('No direct script access allowed');

class Tamasia_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('p_tamasia');
        if ($id != null) {
            $this->db->where('tamasia_id', $id);
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
        $this->db->insert('p_tamasia', $params);
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
        $this->db->where('tamasia_id', $post['id']);
        $this->db->update('p_tamasia', $params);
    }

    public function del($id)
    {
        $this->db->where('tamasia_id', $id);
        $this->db->delete('p_tamasia    ');
    }
}
