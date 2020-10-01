<?php defined('BASEPATH') or exit('No direct script access allowed');

class Remitansi_bni extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();

        $this->load->model('remitansi_bni_m');
    }

    public function index()
    {
        $data['row'] = $this->remitansi_bni_m->get();

        $this->template->load('template', 'product/remitansi_bni/remitansi_bni_data', $data);
    }

    public function add()
    {
        //tambah dan edit biar satu form
        $remitansi_bni = new stdClass();
        $remitansi_bni->remitansi_bni_id = null;
        $remitansi_bni->question = null;
        $remitansi_bni->answer = null;
        $data = array(
            'page' => 'add',
            'row' => $remitansi_bni
        );
        $this->template->load('template', 'product/remitansi_bni/remitansi_bni_form', $data);
    }

    public function edit($id)
    {
        $query = $this->remitansi_bni_m->get($id);
        if ($query->num_rows() > 0) {
            $remitansi_bni = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $remitansi_bni
            );
            $this->template->load('template', 'product/remitansi_bni/remitansi_bni_form', $data);
        } else {
            echo "<script>alert ('data tidak ditemukan');";
            echo "<script> window.location='" . site_url('remitansi_bni') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->remitansi_bni_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->remitansi_bni_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di simpan !');
        }
        //-- jika ingin menggunakan bawaan ci
        redirect('remitansi_bni');
        //-- jika ingin menggunakan javascript--
        // echo "<script> window.location='" . site_url('unit') . "';</script>";

    }

    public function del($id)
    {
        //ini method post
        // $id = $this->input->post('user_id');

        //ini method get
        $this->remitansi_bni_m->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di hapus !');
        }
        redirect('remitansi_bni');
    }
}
