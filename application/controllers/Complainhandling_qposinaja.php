<?php defined('BASEPATH') or exit('No direct script access allowed');

class Complainhandling_qposinaja extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();

        $this->load->model('complainhandling_qposinaja_m');
    }

    public function index()
    {
        $data['row'] = $this->complainhandling_qposinaja_m->get();

        $this->template->load('template', 'product/complainhandling_qposinaja/complainhandling_qposinaja_data', $data);
    }

    public function add()
    {
        //tambah dan edit biar satu form
        $complainhandling_qposinaja = new stdClass();
        $complainhandling_qposinaja->complainhandling_qposinaja_id = null;
        $complainhandling_qposinaja->permasalahan = null;
        $complainhandling_qposinaja->complain_handling = null;
        $complainhandling_qposinaja->keterangan = null;
        $data = array(
            'page' => 'add',
            'row' => $complainhandling_qposinaja
        );
        $this->template->load('template', 'product/complainhandling_qposinaja/complainhandling_qposinaja_form', $data);
    }

    public function edit($id)
    {
        $query = $this->complainhandling_qposinaja_m->get($id);
        if ($query->num_rows() > 0) {
            $complainhandling_qposinaja = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $complainhandling_qposinaja
            );
            $this->template->load('template', 'product/complainhandling_qposinaja/complainhandling_qposinaja_form', $data);
        } else {
            echo "<script>alert ('data tidak ditemukan');";
            echo "<script> window.location='" . site_url('complainhandling_qposinaja') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->complainhandling_qposinaja_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->complainhandling_qposinaja_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di simpan !');
        }
        //-- jika ingin menggunakan bawaan ci
        redirect('complainhandling_qposinaja');
        //-- jika ingin menggunakan javascript--
        // echo "<script> window.location='" . site_url('unit') . "';</script>";

    }

    // public function del($id)
    // {
    //     //ini method post
    //     // $id = $this->input->post('user_id');

    //     //ini method get
    //     $this->complainhandling_pgm_m->del($id);

    //     if ($this->db->affected_rows() > 0) {
    //         $this->session->set_flashdata('success', 'Data berhasil di hapus !');
    //     }
    //     redirect('complainhandling_pgm');
    // }
}
