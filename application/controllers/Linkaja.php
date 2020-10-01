<?php defined('BASEPATH') or exit('No direct script access allowed');

class Linkaja extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();

        $this->load->model('linkaja_m');
    }

    public function index()
    {
        $data['row'] = $this->linkaja_m->get();

        $this->template->load('template', 'product/linkaja/linkaja_data', $data);
    }

    public function add()
    {
        //tambah dan edit biar satu form
        $linkaja = new stdClass();
        $linkaja->linkaja_id = null;
        $linkaja->question = null;
        $linkaja->answer = null;
        $data = array(
            'page' => 'add',
            'row' => $linkaja
        );
        $this->template->load('template', 'product/linkaja/linkaja_form', $data);
    }

    public function edit($id)
    {
        $query = $this->linkaja_m->get($id);
        if ($query->num_rows() > 0) {
            $linkaja = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $linkaja
            );
            $this->template->load('template', 'product/linkaja/linkaja_form', $data);
        } else {
            echo "<script>alert ('data tidak ditemukan');";
            echo "<script> window.location='" . site_url('linkaja') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->linkaja_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->linkaja_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di simpan !');
        }
        //-- jika ingin menggunakan bawaan ci
        redirect('linkaja');
        //-- jika ingin menggunakan javascript--
        // echo "<script> window.location='" . site_url('unit') . "';</script>";

    }

    public function del($id)
    {
        //ini method post
        // $id = $this->input->post('user_id');

        //ini method get
        $this->linkaja_m->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di hapus !');
        }
        redirect('linkaja');
    }
}
