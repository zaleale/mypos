<?php defined('BASEPATH') or exit('No direct script access allowed');

class Weselpos_dn extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();

        $this->load->model('weselpos_dn_m');
    }

    public function index()
    {
        $data['row'] = $this->weselpos_dn_m->get();

        $this->template->load('template', 'product/weselpos_dn/weselpos_dn_data', $data);
    }

    public function add()
    {
        //tambah dan edit biar satu form
        $weselpos_dn = new stdClass();
        $weselpos_dn->weselpos_dn_id = null;
        $weselpos_dn->question = null;
        $weselpos_dn->answer = null;
        $data = array(
            'page' => 'add',
            'row' => $weselpos_dn
        );
        $this->template->load('template', 'product/weselpos_dn/weselpos_dn_form', $data);
    }

    public function edit($id)
    {
        $query = $this->weselpos_dn_m->get($id);
        if ($query->num_rows() > 0) {
            $weselpos_dn = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $weselpos_dn
            );
            $this->template->load('template', 'product/weselpos_dn/weselpos_dn_form', $data);
        } else {
            echo "<script>alert ('data tidak ditemukan');";
            echo "<script> window.location='" . site_url('weselpos_dn') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->weselpos_dn_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->weselpos_dn_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di simpan !');
        }
        //-- jika ingin menggunakan bawaan ci
        redirect('weselpos_dn');
        //-- jika ingin menggunakan javascript--
        // echo "<script> window.location='" . site_url('unit') . "';</script>";

    }

    public function del($id)
    {
        //ini method post
        // $id = $this->input->post('user_id');

        //ini method get
        $this->weselpos_dn_m->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di hapus !');
        }
        redirect('weselpos_dn');
    }
}
