<?php defined('BASEPATH') or exit('No direct script access allowed');

class Weselpos_ln_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('p_weselpos_ln');
        if ($id != null) {
            $this->db->where('weselpos_ln_id', $id);
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
        $this->db->insert('p_weselpos_ln', $params);
    }

    public function edit($post)
    {
        // tambah dan edit biar satu form
        $params = [
            'question' => $post['question'],
            'answer' => $post['answer'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('weselpos_ln_id', $post['id']);
        $this->db->update('p_weselpos_ln', $params);
    }

    public function del($id)
    {
        $this->db->where('weselpos_ln_id', $id);
        $this->db->delete('p_weselpos_ln');
    }
}
