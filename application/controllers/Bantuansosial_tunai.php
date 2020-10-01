<?php defined('BASEPATH') or exit('No direct script access allowed');

class Bantuansosial_tunai extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();

        $this->load->model('bantuansosial_tunai_m');
    }

    public function index()
    {
        $data['row'] = $this->bantuansosial_tunai_m->get();

        $this->template->load('template', 'product/bantuansosial_tunai/bantuansosial_tunai_data', $data);
    }

    public function add()
    {
        //tambah dan edit biar satu form
        $bantuansosial_tunai = new stdClass();
        $bantuansosial_tunai->bantuansosial_tunai_id = null;
        $bantuansosial_tunai->question = null;
        $bantuansosial_tunai->answer = null;
        $data = array(
            'page' => 'add',
            'row' => $bantuansosial_tunai
        );
        $this->template->load('template', 'product/bantuansosial_tunai/bantuansosial_tunai_form', $data);
    }

    public function edit($id)
    {
        $query = $this->bantuansosial_tunai_m->get($id);
        if ($query->num_rows() > 0) {
            $bantuansosial_tunai = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $bantuansosial_tunai
            );
            $this->template->load('template', 'product/bantuansosial_tunai/bantuansosial_tunai_form', $data);
        } else {
            echo "<script>alert ('data tidak ditemukan');";
            echo "<script> window.location='" . site_url('bantuansosial_tunai') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->bantuansosial_tunai_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->bantuansosial_tunai_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di simpan !');
        }
        //-- jika ingin menggunakan bawaan ci
        redirect('bantuansosial_tunai');
        //-- jika ingin menggunakan javascript--
        // echo "<script> window.location='" . site_url('unit') . "';</script>";

    }

    public function del($id)
    {
        //ini method post
        // $id = $this->input->post('user_id');

        //ini method get
        $this->bantuansosial_tunai_m->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di hapus !');
        }
        redirect('bantuansosial_tunai');
    }
}
