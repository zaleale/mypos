<?php defined('BASEPATH') or exit('No direct script access allowed');

class Weselpos_ln extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();

        $this->load->model('weselpos_ln_m');
    }

    public function index()
    {
        $data['row'] = $this->weselpos_ln_m->get();

        $this->template->load('template', 'product/weselpos_ln/weselpos_ln_data', $data);
    }

    public function add()
    {
        //tambah dan edit biar satu form
        $weselpos_ln = new stdClass();
        $weselpos_ln->weselpos_ln_id = null;
        $weselpos_ln->question = null;
        $weselpos_ln->answer = null;
        $data = array(
            'page' => 'add',
            'row' => $weselpos_ln
        );
        $this->template->load('template', 'product/weselpos_ln/weselpos_ln_form', $data);
    }

    public function edit($id)
    {
        $query = $this->weselpos_ln_m->get($id);
        if ($query->num_rows() > 0) {
            $weselpos_ln = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $weselpos_ln
            );
            $this->template->load('template', 'product/weselpos_ln/weselpos_ln_form', $data);
        } else {
            echo "<script>alert ('data tidak ditemukan');";
            echo "<script> window.location='" . site_url('weselpos_ln') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->weselpos_ln_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->weselpos_ln_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di simpan !');
        }
        //-- jika ingin menggunakan bawaan ci
        redirect('weselpos_ln');
        //-- jika ingin menggunakan javascript--
        // echo "<script> window.location='" . site_url('unit') . "';</script>";

    }

    public function del($id)
    {
        //ini method post
        // $id = $this->input->post('user_id');

        //ini method get
        $this->weselpos_ln_m->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di hapus !');
        }
        redirect('weselpos_ln');
    }
}
