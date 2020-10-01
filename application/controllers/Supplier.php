//SUPPLIER ADALAH KIRIMAN
<?php defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();

        $this->load->model('supplier_m');
    }

    public function index()
    {
        $data['row'] = $this->supplier_m->get();

        $this->template->load('template', 'supplier/supplier_data', $data);
    }

    public function add()
    {
        //tambah dan edit biar satu form
        $supplier = new stdClass();
        $supplier->supplier_id = null;
        $supplier->name = null;
        $supplier->phone = null;
        $supplier->address = null;
        $supplier->description = null;
        $data = array(
            'page' => 'add',
            'row' => $supplier
        );
        $this->template->load('template', 'supplier/supplier_form', $data);
    }

    public function edit($id)
    {
        $query = $this->supplier_m->get($id);
        if ($query->num_rows() > 0) {
            $supplier = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $supplier
            );
            $this->template->load('template', 'supplier/supplier_form', $data);
        } else {
            echo "<script>alert ('data tidak ditemukan');";
            echo "<script> window.location='" . site_url('supplier') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->supplier_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->supplier_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert ('data berhasil disimpan');</script>";
        }
        echo "<script> window.location='" . site_url('supplier') . "';</script>";
    }

    public function del($id)
    {
        //ini method post
        // $id = $this->input->post('user_id');

        //ini method get
        $this->supplier_m->del($id);

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert ('data berhasil dihapus');</script>";
        }
        echo "<script> window.location='" . site_url('supplier') . "';</script>";
    }
}
