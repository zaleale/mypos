<?php defined('BASEPATH') or exit('No direct script access allowed');

class Batas_pengaduan_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('p_batas_pengaduan');
        if ($id != null) {
            $this->db->where('batas_pengaduan_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        //tambah dan edit biar satu form
        $params = [
            'nama_layanan' => $post['nama_layanan'],
            'batas_pengaduan_kiriman' => $post['batas_pengaduan_kiriman'],
        ];
        $this->db->insert('p_batas_pengaduan', $params);
    }

    public function edit($post)
    {
        //tambah dan edit biar satu form
        $params = [
            'nama_layanan' => $post['nama_layanan'],
            'batas_pengaduan_kiriman' => $post['batas_pengaduan_kiriman'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('batas_pengaduan_id', $post['id']);
        $this->db->update('p_batas_pengaduan', $params);
    }

    public function del($id)
    {
        $this->db->where('batas_pengaduan_id', $id);
        $this->db->delete('p_batas_pengaduan');
    }
}
