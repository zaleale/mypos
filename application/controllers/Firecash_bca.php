<?php defined('BASEPATH') or exit('No direct script access allowed');

class Firecash_bca extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();

        $this->load->model('firecash_bca_m');
    }

    public function index()
    {
        $data['row'] = $this->firecash_bca_m->get();

        $this->template->load('template', 'product/firecash_bca/firecash_bca_data', $data);
    }

    public function add()
    {
        //tambah dan edit biar satu form
        $firecash_bca = new stdClass();
        $firecash_bca->firecash_bca_id = null;
        $firecash_bca->question = null;
        $firecash_bca->answer = null;
        $data = array(
            'page' => 'add',
            'row' => $firecash_bca
        );
        $this->template->load('template', 'product/firecash_bca/firecash_bca_form', $data);
    }

    public function edit($id)
    {
        $query = $this->firecash_bca_m->get($id);
        if ($query->num_rows() > 0) {
            $firecash_bca = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $firecash_bca
            );
            $this->template->load('template', 'product/firecash_bca/firecash_bca_form', $data);
        } else {
            echo "<script>alert ('data tidak ditemukan');";
            echo "<script> window.location='" . site_url('firecash_bca') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->firecash_bca_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->firecash_bca_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di simpan !');
        }
        //-- jika ingin menggunakan bawaan ci
        redirect('firecash_bca');
        //-- jika ingin menggunakan javascript--
        // echo "<script> window.location='" . site_url('unit') . "';</script>";

    }

    public function del($id)
    {
        //ini method post
        // $id = $this->input->post('user_id');

        //ini method get
        $this->firecash_bca_m->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di hapus !');
        }
        redirect('firecash_bca');
    }
}
