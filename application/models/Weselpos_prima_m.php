<?php defined('BASEPATH') or exit('No direct script access allowed');

class Weselpos_prima_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('p_weselpos_prima');
        if ($id != null) {
            $this->db->where('weselpos_prima_id', $id);
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
        $this->db->insert('p_weselpos_prima', $params);
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
        $this->db->where('weselpos_prima_id', $post['id']);
        $this->db->update('p_weselpos_prima', $params);
    }

    public function del($id)
    {
        $this->db->where('weselpos_prima_id', $id);
        $this->db->delete('p_weselpos_prima');
    }
}
