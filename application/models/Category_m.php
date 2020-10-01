<!-- KIRIMAN_DOMESTIK -->
<?php defined('BASEPATH') or exit('No direct script access allowed');

class Category_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('p_category');
        if ($id != null) {
            $this->db->where('category_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        //tambah dan edit biar satu form
        $params = [
            'name' => $post['category_name'],
            'standar_waktu_penyerahan' => $post['standar_waktu_penyerahan'],
            'berat' => $post['berat'],
            'ukuran' => $post['ukuran'],
            'posting' => $post['posting'],
            'pickup' => $post['pickup'],
            'cod' => $post['cod']
        ];
        $this->db->insert('p_category', $params);
    }

    public function edit($post)
    {
        //tambah dan edit biar satu form
        $params = [
            'name' => $post['category_name'],
            'standar_waktu_penyerahan' => $post['standar_waktu_penyerahan'],
            'berat' => $post['berat'],
            'ukuran' => $post['ukuran'],
            'posting' => $post['posting'],
            'pickup' => $post['pickup'],
            'cod' => $post['cod'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('category_id', $post['id']);
        $this->db->update('p_category', $params);
    }

    public function del($id)
    {
        $this->db->where('category_id', $id);
        $this->db->delete('p_category');
    }
}
