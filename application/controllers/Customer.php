<?php defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();

        $this->load->model('customer_m');
    }

    public function index()
    {
        $data['row'] = $this->customer_m->get();

        $this->template->load('template', 'customer/customer_data', $data);
    }

    public function add()
    {
        //tambah dan edit biar satu form
        $customer = new stdClass();
        $customer->customer_id = null;
        $customer->name = null;
        $customer->gender = null;
        $customer->phone = null;
        $customer->address = null;
        $data = array(
            'page' => 'add',
            'row' => $customer
        );
        $this->template->load('template', 'customer/customer_form', $data);
    }

    public function edit($id)
    {
        $query = $this->customer_m->get($id);
        if ($query->num_rows() > 0) {
            $customer = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $customer
            );
            $this->template->load('template', 'customer/customer_form', $data);
        } else {
            echo "<script>alert ('data tidak ditemukan');";
            echo "<script> window.location='" . site_url('customer') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->customer_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->customer_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert ('data berhasil disimpan');</script>";
        }
        echo "<script> window.location='" . site_url('customer') . "';</script>";
    }

    public function del($id)
    {
        //ini method post
        // $id = $this->input->post('user_id');

        //ini method get
        $this->customer_m->del($id);

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert ('data berhasil dihapus');</script>";
        }
        echo "<script> window.location='" . site_url('customer') . "';</script>";
    }
}
