<?php defined('BASEPATH') or exit('No direct script access allowed');

class Moneygram extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();

        $this->load->model('moneygram_m');
    }

    public function index()
    {
        $data['row'] = $this->moneygram_m->get();

        $this->template->load('template', 'product/moneygram/moneygram_data', $data);
    }

    public function add()
    {
        //tambah dan edit biar satu form
        $moneygram = new stdClass();
        $moneygram->moneygram_id = null;
        $moneygram->question = null;
        $moneygram->answer = null;
        $data = array(
            'page' => 'add',
            'row' => $moneygram
        );
        $this->template->load('template', 'product/moneygram/moneygram_form', $data);
    }

    public function edit($id)
    {
        $query = $this->moneygram_m->get($id);
        if ($query->num_rows() > 0) {
            $moneygram = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $moneygram
            );
            $this->template->load('template', 'product/moneygram/moneygram_form', $data);
        } else {
            echo "<script>alert ('data tidak ditemukan');";
            echo "<script> window.location='" . site_url('moneygram') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->moneygram_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->moneygram_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di simpan !');
        }
        //-- jika ingin menggunakan bawaan ci
        redirect('moneygram');
        //-- jika ingin menggunakan javascript--
        // echo "<script> window.location='" . site_url('unit') . "';</script>";

    }

    public function del($id)
    {
        //ini method post
        // $id = $this->input->post('user_id');

        //ini method get
        $this->moneygram_m->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di hapus !');
        }
        redirect('moneygram');
    }
}
