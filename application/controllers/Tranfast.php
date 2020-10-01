<?php defined('BASEPATH') or exit('No direct script access allowed');

class Tranfast extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();

        $this->load->model('tranfast_m');
    }

    public function index()
    {
        $data['row'] = $this->tranfast_m->get();

        $this->template->load('template', 'product/tranfast/tranfast_data', $data);
    }

    public function add()
    {
        //tambah dan edit biar satu form
        $tranfast = new stdClass();
        $tranfast->tranfast_id = null;
        $tranfast->question = null;
        $tranfast->answer = null;
        $data = array(
            'page' => 'add',
            'row' => $tranfast
        );
        $this->template->load('template', 'product/tranfast/tranfast_form', $data);
    }

    public function edit($id)
    {
        $query = $this->tranfast_m->get($id);
        if ($query->num_rows() > 0) {
            $tranfast = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $tranfast
            );
            $this->template->load('template', 'product/tranfast/tranfast_form', $data);
        } else {
            echo "<script>alert ('data tidak ditemukan');";
            echo "<script> window.location='" . site_url('tranfast') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->tranfast_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->tranfast_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di simpan !');
        }
        //-- jika ingin menggunakan bawaan ci
        redirect('tranfast');
        //-- jika ingin menggunakan javascript--
        // echo "<script> window.location='" . site_url('unit') . "';</script>";

    }

    public function del($id)
    {
        //ini method post
        // $id = $this->input->post('user_id');

        //ini method get
        $this->tranfast_m->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di hapus !');
        }
        redirect('tranfast');
    }
}
