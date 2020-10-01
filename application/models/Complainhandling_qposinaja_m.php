<?php defined('BASEPATH') or exit('No direct script access allowed');

class Complainhandling_qposinaja_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('p_complainhandling_qposinaja');
        if ($id != null) {
            $this->db->where('complainhandling_qposinaja_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        // tambah dan edit biar satu form
        $params = [
            'permasalahan' => $post['permasalahan'],
            'complain_handling' => $post['complain_handling'],
            'keterangan' => $post['keterangan'],
        ];
        $this->db->insert('p_complainhandling_qposinaja', $params);
    }

    public function edit($post)
    {
        // tambah dan edit biar satu form
        $params = [
            'permasalahan' => $post['permasalahan'],
            'complain_handling' => $post['complain_handling'],
            'keterangan' => $post['keterangan'],
            'updated' => date('Y-m-d H:i:s')
        ];

        $this->db->where('complainhandling_qposinaja_id', $post['id']);
        $this->db->update('p_complainhandling_qposinaja', $params);
    }

    // public function del($id)
    // {
    //     $this->db->where('qposin_aja_id', $id);
    //     $this->db->delete('p_qposin_aja');
    // }
}
