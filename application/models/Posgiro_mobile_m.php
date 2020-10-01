<?php defined('BASEPATH') or exit('No direct script access allowed');

class Posgiro_mobile_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('p_posgiro_mobile');
        if ($id != null) {
            $this->db->where('posgiro_mobile_id', $id);
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
            'deskripsi' => $post['deskripsi'],
        ];
        $this->db->insert('p_posgiro_mobile', $params);
    }

    public function edit($post)
    {
        // tambah dan edit biar satu form
        $params = [
            'question' => $post['question'],
            'answer' => $post['answer'],
            'image' => $post['image'],
            'deskripsi' => $post['deskripsi'],
            'updated' => date('Y-m-d H:i:s')
        ];
        if ($post['image'] != null) {
            $params['image'] = $post['image'];
        }
        $this->db->where('posgiro_mobile_id', $post['id']);
        $this->db->update('p_posgiro_mobile', $params);
    }

    public function del($id)
    {
        $this->db->where('posgiro_mobile_id', $id);
        $this->db->delete('p_posgiro_mobile');
    }
}
