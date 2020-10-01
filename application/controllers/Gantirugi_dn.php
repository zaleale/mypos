<?php defined('BASEPATH') or exit('No direct script access allowed');

class Gantirugi_dn extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();

        $this->load->model('gantirugi_dn_m');
    }

    public function index()
    {
        $data['row'] = $this->gantirugi_dn_m->get();

        $this->template->load('template', 'product/gantirugi_dn/gantirugi_dn_data', $data);
    }

    public function add()
    {
        //tambah dan edit biar satu form
        $gantirugi_dn = new stdClass();
        $gantirugi_dn->gantirugi_dn_id = null;
        $gantirugi_dn->jenis = null;
        $gantirugi_dn->pengajuan_pengaduan_da = null;
        $gantirugi_dn->besar_tgr_da = null;
        $gantirugi_dn->pengajuan_pengaduan_ta = null;
        $gantirugi_dn->besar_tgr_ta = null;
        $data = array(
            'page' => 'add',
            'row' => $gantirugi_dn
        );
        $this->template->load('template', 'product/gantirugi_dn/gantirugi_dn_form', $data);
    }

    public function edit($id)
    {
        $query = $this->gantirugi_dn_m->get($id);
        if ($query->num_rows() > 0) {
            $gantirugi_dn = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $gantirugi_dn
            );
            $this->template->load('template', 'product/gantirugi_dn/gantirugi_dn_form', $data);
        } else {
            echo "<script>alert ('data tidak ditemukan');";
            echo "<script> window.location='" . site_url('gantirugi_dn') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->gantirugi_dn_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->gantirugi_dn_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di simpan !');
        }
        //-- jika ingin menggunakan bawaan ci
        redirect('gantirugi_dn');
        //-- jika ingin menggunakan javascript--
        // echo "<script> window.location='" . site_url('unit') . "';</script>";

    }

    public function del($id)
    {
        //ini method post
        // $id = $this->input->post('user_id');

        //ini method get
        $this->gantirugi_dn_m->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di hapus !');
        }
        redirect('gantirugi_dn');
    }
}
