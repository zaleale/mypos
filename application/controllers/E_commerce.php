<?php defined('BASEPATH') or exit('No direct script access allowed');

class E_commerce extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();

        $this->load->model('e_commerce_m');
    }

    public function index()
    {
        $data['row'] = $this->e_commerce_m->get();

        $this->template->load('template', 'product/e_commerce/e_commerce_data', $data);
    }

    public function add()
    {
        //tambah dan edit biar satu form
        $e_commerce = new stdClass();
        $e_commerce->e_commerce_id = null;
        $e_commerce->question = null;
        $e_commerce->bukalapak = null;
        $e_commerce->shopee = null;
        $e_commerce->zalora = null;
        $e_commerce->tokopedia = null;
        $data = array(
            'page' => 'add',
            'row' => $e_commerce
        );
        $this->template->load('template', 'product/e_commerce/e_commerce_form', $data);
    }

    public function edit($id)
    {
        $query = $this->e_commerce_m->get($id);
        if ($query->num_rows() > 0) {
            $e_commerce = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $e_commerce
            );
            $this->template->load('template', 'product/e_commerce/e_commerce_form', $data);
        } else {
            echo "<script>alert ('data tidak ditemukan');";
            echo "<script> window.location='" . site_url('e_commerce') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->e_commerce_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->e_commerce_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di simpan !');
        }
        //-- jika ingin menggunakan bawaan ci
        redirect('e_commerce');
        //-- jika ingin menggunakan javascript--
        // echo "<script> window.location='" . site_url('unit') . "';</script>";

    }

    public function del($id)
    {
        //ini method post
        // $id = $this->input->post('user_id');

        //ini method get
        $this->e_commerce_m->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di hapus !');
        }
        redirect('e_commerce');
    }
}
