<?php defined('BASEPATH') or exit('No direct script access allowed');

class Gantirugi_dn_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('p_gantirugi_dn');
        if ($id != null) {
            $this->db->where('gantirugi_dn_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        //tambah dan edit biar satu form
        $params = [
            'jenis' => $post['jenis'],
            'pengajuan_pengaduan_da' => $post['pengajuan_pengaduan_da'],
            'besar_tgr_da' => $post['besar_tgr_da'],
            'pengajuan_pengaduan_ta' => $post['pengajuan_pengaduan_ta'],
            'besar_tgr_ta' => $post['besar_tgr_ta'],
        ];
        $this->db->insert('p_gantirugi_dn', $params);
    }

    public function edit($post)
    {
        //tambah dan edit biar satu form
        $params = [
            'jenis' => $post['jenis'],
            'pengajuan_pengaduan_da' => $post['pengajuan_pengaduan_da'],
            'besar_tgr_da' => $post['besar_tgr_da'],
            'pengajuan_pengaduan_ta' => $post['pengajuan_pengaduan_ta'],
            'besar_tgr_ta' => $post['besar_tgr_ta'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('gantirugi_dn_id', $post['id']);
        $this->db->update('p_gantirugi_dn', $params);
    }

    public function del($id)
    {
        $this->db->where('gantirugi_dn_id', $id);
        $this->db->delete('p_gantirugi_dn');
    }
}
