<?php defined('BASEPATH') or exit('No direct script access allowed');

class Complainhandling_pgm extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();

        $this->load->model('complainhandling_pgm_m');
    }

    public function index()
    {
        $data['row'] = $this->complainhandling_pgm_m->get();

        $this->template->load('template', 'product/complainhandling_pgm/complainhandling_pgm_data', $data);
    }

    public function add()
    {
        //tambah dan edit biar satu form
        $complainhandling_pgm = new stdClass();
        $complainhandling_pgm->complainhandling_pgm_id = null;
        $complainhandling_pgm->question = null;
        $complainhandling_pgm->answer = null;
        $data = array(
            'page' => 'add',
            'row' => $complainhandling_pgm
        );
        $this->template->load('template', 'product/complainhandling_pgm/complainhandling_pgm_form', $data);
    }

    public function edit($id)
    {
        $query = $this->complainhandling_pgm_m->get($id);
        if ($query->num_rows() > 0) {
            $complainhandling_pgm = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $complainhandling_pgm
            );
            $this->template->load('template', 'product/complainhandling_pgm/complainhandling_pgm_form', $data);
        } else {
            echo "<script>alert ('data tidak ditemukan');";
            echo "<script> window.location='" . site_url('complainhandling_pgm') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->complainhandling_pgm_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->complainhandling_pgm_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di simpan !');
        }
        //-- jika ingin menggunakan bawaan ci
        redirect('complainhandling_pgm');
        //-- jika ingin menggunakan javascript--
        // echo "<script> window.location='" . site_url('unit') . "';</script>";

    }

    public function del($id)
    {
        //ini method post
        // $id = $this->input->post('user_id');

        //ini method get
        $this->complainhandling_pgm_m->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di hapus !');
        }
        redirect('complainhandling_pgm');
    }
}
