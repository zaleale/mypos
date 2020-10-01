<?php defined('BASEPATH') or exit('No direct script access allowed');

class Alamat_email extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();

        $this->load->model('alamat_email_m');
    }

    public function index()
    {
        $data['row'] = $this->alamat_email_m->get();

        $this->template->load('template', 'product/alamat_email/alamat_email_data', $data);
    }

    public function add()
    {
        //tambah dan edit biar satu form
        $alamat_email = new stdClass();
        $alamat_email->alamat_email_id = null;
        $alamat_email->nama = null;
        $alamat_email->email = null;
        $alamat_email->no_telepon = null;
        $data = array(
            'page' => 'add',
            'row' => $alamat_email
        );
        $this->template->load('template', 'product/alamat_email/alamat_email_form', $data);
    }

    public function edit($id)
    {
        $query = $this->alamat_email_m->get($id);
        if ($query->num_rows() > 0) {
            $alamat_email = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $alamat_email
            );
            $this->template->load('template', 'product/alamat_email/alamat_email_form', $data);
        } else {
            echo "<script>alert ('data tidak ditemukan');";
            echo "<script> window.location='" . site_url('alamat_email') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->alamat_email_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->alamat_email_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di simpan !');
        }
        //-- jika ingin menggunakan bawaan ci
        redirect('alamat_email');
        //-- jika ingin menggunakan javascript--
        // echo "<script> window.location='" . site_url('unit') . "';</script>";

    }

    public function del($id)
    {
        //ini method post
        // $id = $this->input->post('user_id');

        //ini method get
        $this->alamat_email_m->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di hapus !');
        }
        redirect('alamat_email');
    }
}
