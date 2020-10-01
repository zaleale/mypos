<?php defined('BASEPATH') or exit('No direct script access allowed');

class Batas_pengaduan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();

        $this->load->model('batas_pengaduan_m');
    }

    public function index()
    {
        $data['row'] = $this->batas_pengaduan_m->get();

        $this->template->load('template', 'product/batas_pengaduan/batas_pengaduan_data', $data);
    }

    public function add()
    {
        //tambah dan edit biar satu form
        $batas_pengaduan = new stdClass();
        $batas_pengaduan->batas_pengaduan_id = null;
        $batas_pengaduan->nama_layanan = null;
        $batas_pengaduan->batas_pengaduan_kiriman = null;
        $data = array(
            'page' => 'add',
            'row' => $batas_pengaduan
        );
        $this->template->load('template', 'product/batas_pengaduan/batas_pengaduan_form', $data);
    }

    public function edit($id)
    {
        $query = $this->batas_pengaduan_m->get($id);
        if ($query->num_rows() > 0) {
            $batas_pengaduan = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $batas_pengaduan
            );
            $this->template->load('template', 'product/batas_pengaduan/batas_pengaduan_form', $data);
        } else {
            echo "<script>alert ('data tidak ditemukan');";
            echo "<script> window.location='" . site_url('batas_pengaduan') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->batas_pengaduan_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->batas_pengaduan_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di simpan !');
        }
        //-- jika ingin menggunakan bawaan ci
        redirect('batas_pengaduan');
        //-- jika ingin menggunakan javascript--
        // echo "<script> window.location='" . site_url('unit') . "';</script>";

    }

    public function del($id)
    {
        //ini method post
        // $id = $this->input->post('user_id');

        //ini method get
        $this->batas_pengaduan_m->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di hapus !');
        }
        redirect('batas_pengaduan');
    }
}
