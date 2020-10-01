<?php defined('BASEPATH') or exit('No direct script access allowed');

class Complainhandling_pgm_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('p_complainhandling_pgm');
        if ($id != null) {
            $this->db->where('complainhandling_pgm_id', $id);
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
        $this->db->insert('p_complainhandling_pgm', $params);
    }

    public function edit($post)
    {
        // tambah dan edit biar satu form
        $params = [
            'question' => $post['question'],
            'answer' => $post['answer'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('complainhandling_pgm_id', $post['id']);
        $this->db->update('p_complainhandling_pgm', $params);
    }

    public function del($id)
    {
        $this->db->where('complainhandling_pgm_id', $id);
        $this->db->delete('p_complainhandling_pgm');
    }
}
