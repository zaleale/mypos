<?php defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();

        $this->load->model('unit_m');
    }

    public function index()
    {
        $data['row'] = $this->unit_m->get();

        $this->template->load('template', 'product/unit/unit_data', $data);
    }

    public function add()
    {
        //tambah dan edit biar satu form
        $unit = new stdClass();
        $unit->unit_id = null;
        $unit->name = null;
        $unit->standar_waktu_penyerahan = null;
        $unit->berat = null;
        $unit->ukuran = null;
        $unit->tracking = null;
        $unit->ganti_rugi = null;
        $data = array(
            'page' => 'add',
            'row' => $unit
        );
        $this->template->load('template', 'product/unit/unit_form', $data);
    }

    public function edit($id)
    {
        $query = $this->unit_m->get($id);
        if ($query->num_rows() > 0) {
            $unit = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $unit
            );
            $this->template->load('template', 'product/unit/unit_form', $data);
        } else {
            echo "<script>alert ('data tidak ditemukan');";
            echo "<script> window.location='" . site_url('unit') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->unit_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->unit_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di simpan !');
        }
        //-- jika ingin menggunakan bawaan ci
        redirect('unit');
        //-- jika ingin menggunakan javascript--
        // echo "<script> window.location='" . site_url('unit') . "';</script>";

    }

    public function del($id)
    {
        //ini method post
        // $id = $this->input->post('user_id');

        //ini method get
        $this->unit_m->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di hapus !');
        }
        redirect('unit');
    }
}
