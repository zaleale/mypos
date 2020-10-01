<?php defined('BASEPATH') or exit('No direct script access allowed');

class Cashaccount_dn extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();

        $this->load->model('cashaccount_dn_m');
    }

    public function index()
    {
        $data['row'] = $this->cashaccount_dn_m->get();

        $this->template->load('template', 'product/cashaccount_dn/cashaccount_dn_data', $data);
    }

    public function add()
    {
        //tambah dan edit biar satu form
        $cashaccount_dn = new stdClass();
        $cashaccount_dn->cashaccount_dn_id = null;
        $cashaccount_dn->question = null;
        $cashaccount_dn->answer = null;
        $cashaccount_dn->image = null;
        $data = array(
            'page' => 'add',
            'row' => $cashaccount_dn
        );
        $this->template->load('template', 'product/cashaccount_dn/cashaccount_dn_form', $data);
    }

    public function edit($id)
    {
        $query = $this->cashaccount_dn_m->get($id);
        if ($query->num_rows() > 0) {
            $cashaccount_dn = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $cashaccount_dn
            );
            $this->template->load('template', 'product/cashaccount_dn/cashaccount_dn_form', $data);
        } else {
            echo "<script>alert ('data tidak ditemukan');";
            echo "<script> window.location='" . site_url('cashaccount_dn') . "';</script>";
        }
    }

    public function process()
    {
        $config['upload_path']      = './uploads/product/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg';
        $config['max_size']         = '2048';
        $config['file_name']        = 'cashaccount_dn-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);

        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            if (@$_FILES['image']['name'] != null) {
                if ($this->upload->do_upload('image')) {
                    $post['image'] = $this->upload->data('file_name');
                    $this->cashaccount_dn_m->add($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil di simpan !');
                    }
                    redirect('cashaccount_dn');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('cashaccount_dn');
                }
            } else {
                $post['image'] = null;
                $this->cashaccount_dn_m->add($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data berhasil di simpan !');
                }
                redirect('cashaccount_dn');
            }
        } else if (isset($_POST['edit'])) {
            if (@$_FILES['image']['name'] != null) {
                if ($this->upload->do_upload('image')) {

                    $cashaccount_dn = $this->cashaccount_dn_m->get($post['id'])->row;
                    if ($cashaccount_dn->image != null) {
                        $target_file = './uploads/product/' . $cashaccount_dn->image;
                        unlink($target_file);
                    }

                    $post['image'] = $this->upload->data('file_name');
                    $this->cashaccount_dn_m->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil di simpan !');
                    }
                    redirect('cashaccount_dn');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('cashaccount_dn');
                }
            } else {
                $post['image'] = null;
                $this->cashaccount_dn_m->edit($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data berhasil di simpan !');
                }
                redirect('cashaccount_dn');
            }
        }
    }

    public function del($id)
    {
        $cashaccount_dn = $this->cashaccount_dn_m->get($id)->row();
        if ($cashaccount_dn->image != null) {
            $target_file = './uploads/product/' . $cashaccount_dn->image;
            unlink($target_file);
        }
        //ini method post
        // $id = $this->input->post('user_id');

        //ini method get
        $this->cashaccount_dn_m->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di hapus !');
        }
        redirect('cashaccount_dn');
    }
}
