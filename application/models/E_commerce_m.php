<?php defined('BASEPATH') or exit('No direct script access allowed');

class E_commerce_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('p_e_commerce');
        if ($id != null) {
            $this->db->where('e_commerce_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        // tambah dan edit biar satu form
        $params = [
            'question' => $post['question'],
            'bukalapak' => $post['bukalapak'],
            'shopee' => $post['shopee'],
            'zalora' => $post['zalora'],
            'tokopedia' => $post['tokopedia'],
        ];
        $this->db->insert('p_e_commerce', $params);
    }

    public function edit($post)
    {
        // tambah dan edit biar satu form
        $params = [
            'question' => $post['question'],
            'bukalapak' => $post['bukalapak'],
            'shopee' => $post['shopee'],
            'zalora' => $post['zalora'],
            'tokopedia' => $post['tokopedia'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('e_commerce_id', $post['id']);
        $this->db->update('p_e_commerce', $params);
    }

    public function del($id)
    {
        $this->db->where('e_commerce_id', $id);
        $this->db->delete('p_e_commerce');
    }
}
