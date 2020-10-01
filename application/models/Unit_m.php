<?php defined('BASEPATH') or exit('No direct script access allowed');

class Unit_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('p_unit');
        if ($id != null) {
            $this->db->where('unit_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        //tambah dan edit biar satu form
        $params = [
            'name' => $post['unit_name'],
            'standar_waktu_penyerahan' => $post['standar_waktu_penyerahan'],
            'berat' => $post['berat'],
            'ukuran' => $post['ukuran'],
            'tracking' => $post['tracking'],
            'ganti_rugi' => $post['ganti_rugi'],
        ];
        $this->db->insert('p_unit', $params);
    }

    public function edit($post)
    {
        //tambah dan edit biar satu form
        $params = [
            'name' => $post['unit_name'],
            'standar_waktu_penyerahan' => $post['standar_waktu_penyerahan'],
            'berat' => $post['berat'],
            'ukuran' => $post['ukuran'],
            'tracking' => $post['tracking'],
            'ganti_rugi' => $post['ganti_rugi'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('unit_id', $post['id']);
        $this->db->update('p_unit', $params);
    }

    public function del($id)
    {
        $this->db->where('unit_id', $id);
        $this->db->delete('p_unit');
    }
}
