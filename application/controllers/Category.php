<!-- KIRIMAN_DOMESTIK -->
<?php defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();

        $this->load->model('category_m');
    }

    public function index()
    {
        $data['row'] = $this->category_m->get();

        $this->template->load('template', 'product/category/category_data', $data);
    }

    public function add()
    {
        //tambah dan edit biar satu form
        $category = new stdClass();
        $category->category_id = null;
        $category->name = null;
        $category->standar_waktu_penyerahan = null;
        $category->berat = null;
        $category->ukuran = null;
        $category->posting = null;
        $category->pickup = null;
        $category->cod = null;
        $data = array(
            'page' => 'add',
            'row' => $category
        );
        $this->template->load('template', 'product/category/category_form', $data);
    }

    public function edit($id)
    {
        $query = $this->category_m->get($id);
        if ($query->num_rows() > 0) {
            $category = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $category
            );
            $this->template->load('template', 'product/category/category_form', $data);
        } else {
            echo "<script>alert ('data tidak ditemukan');";
            echo "<script> window.location='" . site_url('category') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->category_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->category_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di simpan !');
        }
        //-- jika ingin menggunakan bawaan ci
        redirect('category');
        //-- jika ingin menggunakan javascript--
        // echo "<script> window.location='" . site_url('category') . "';</script>";

    }

    public function del($id)
    {
        //ini method post
        // $id = $this->input->post('user_id');

        //ini method get
        $this->category_m->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di hapus !');
        }
        redirect('category');
    }
}
