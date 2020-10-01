<?php defined('BASEPATH') or exit('No direct script access allowed');

class Cashaccount_dn_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('p_cashaccount_dn');
        if ($id != null) {
            $this->db->where('cashaccount_dn_id', $id);
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
        $this->db->insert('p_cashaccount_dn', $params);
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
        $this->db->where('cashaccount_dn_id', $post['id']);
        $this->db->update('p_cashaccount_dn', $params);
    }

    public function del($id)
    {
        $this->db->where('cashaccount_dn_id', $id);
        $this->db->delete('p_cashaccount_dn');
    }
}
