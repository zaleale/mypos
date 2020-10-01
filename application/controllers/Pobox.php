<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pobox extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();

        $this->load->model('pobox_m');
    }

    public function index()
    {
        $data['row'] = $this->pobox_m->get();

        $this->template->load('template', 'product/pobox/pobox_data', $data);
    }

    public function add()
    {
        //tambah dan edit biar satu form
        $pobox = new stdClass();
        $pobox->pobox_id = null;
        $pobox->question = null;
        $pobox->answer = null;
        $data = array(
            'page' => 'add',
            'row' => $pobox
        );
        $this->template->load('template', 'product/pobox/pobox_form', $data);
    }

    public function edit($id)
    {
        $query = $this->pobox_m->get($id);
        if ($query->num_rows() > 0) {
            $pobox = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $pobox
            );
            $this->template->load('template', 'product/pobox/pobox_form', $data);
        } else {
            echo "<script>alert ('data tidak ditemukan');";
            echo "<script> window.location='" . site_url('pobox') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->pobox_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->pobox_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di simpan !');
        }
        //-- jika ingin menggunakan bawaan ci
        redirect('pobox');
        //-- jika ingin menggunakan javascript--
        // echo "<script> window.location='" . site_url('unit') . "';</script>";

    }

    public function del($id)
    {
        //ini method post
        // $id = $this->input->post('user_id');

        //ini method get
        $this->pobox_m->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di hapus !');
        }
        redirect('pobox');
    }
}
