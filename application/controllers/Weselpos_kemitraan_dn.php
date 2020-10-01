<?php defined('BASEPATH') or exit('No direct script access allowed');

class Weselpos_kemitraan_dn extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();

        $this->load->model('weselpos_kemitraan_dn_m');
    }

    public function index()
    {
        $data['row'] = $this->weselpos_kemitraan_dn_m->get();

        $this->template->load('template', 'product/weselpos_kemitraan_dn/weselpos_kemitraan_dn_data', $data);
    }

    public function add()
    {
        //tambah dan edit biar satu form
        $weselpos_kemitraan_dn = new stdClass();
        $weselpos_kemitraan_dn->weselpos_kemitraan_dn_id = null;
        $weselpos_kemitraan_dn->question = null;
        $weselpos_kemitraan_dn->answer = null;
        $weselpos_kemitraan_dn->image = null;
        $data = array(
            'page' => 'add',
            'row' => $weselpos_kemitraan_dn
        );
        $this->template->load('template', 'product/weselpos_kemitraan_dn/weselpos_kemitraan_dn_form', $data);
    }

    public function edit($id)
    {
        $query = $this->weselpos_kemitraan_dn_m->get($id);
        if ($query->num_rows() > 0) {
            $weselpos_kemitraan_dn = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $weselpos_kemitraan_dn
            );
            $this->template->load('template', 'product/weselpos_kemitraan_dn/weselpos_kemitraan_dn_form', $data);
        } else {
            echo "<script>alert ('data tidak ditemukan');";
            echo "<script> window.location='" . site_url('weselpos_kemitraan_dn') . "';</script>";
        }
    }

    public function process()
    {
        $config['upload_path']      = './uploads/product/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg';
        $config['max_size']         = '2048';
        $config['file_name']        = 'weselpos_kemitraan_dn-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);

        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            if (@$_FILES['image']['name'] != null) {
                if ($this->upload->do_upload('image')) {
                    $post['image'] = $this->upload->data('file_name');
                    $this->weselpos_kemitraan_dn_m->add($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil di simpan !');
                    }
                    redirect('weselpos_kemitraan_dn');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('weselpos_kemitraan_dn');
                }
            } else {
                $post['image'] = null;
                $this->weselpos_kemitraan_dn_m->add($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data berhasil di simpan !');
                }
                redirect('weselpos_kemitraan_dn');
            }
        } else if (isset($_POST['edit'])) {
            if (@$_FILES['image']['name'] != null) {
                if ($this->upload->do_upload('image')) {

                    $weselpos_kemitraan_dn = $this->weselpos_kemitraan_dn_m->get($post['id'])->row;
                    if ($weselpos_kemitraan_dn->image != null) {
                        $target_file = './uploads/product/' . $weselpos_kemitraan_dn->image;
                        unlink($target_file);
                    }

                    $post['image'] = $this->upload->data('file_name');
                    $this->weselpos_kemitraan_dn_m->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil di simpan !');
                    }
                    redirect('weselpos_kemitraan_dn');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('weselpos_kemitraan_dn');
                }
            } else {
                $post['image'] = null;
                $this->weselpos_kemitraan_dn_m->edit($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data berhasil di simpan !');
                }
                redirect('weselpos_kemitraan_dn');
            }
        }
    }

    public function del($id)
    {
        $weselpos_kemitraan_dn = $this->weselpos_kemitraan_dn_m->get($id)->row();
        if ($weselpos_kemitraan_dn->image != null) {
            $target_file = './uploads/product/' . $weselpos_kemitraan_dn->image;
            unlink($target_file);
        }
        //ini method post
        // $id = $this->input->post('user_id');

        //ini method get
        $this->weselpos_kemitraan_dn_m->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di hapus !');
        }
        redirect('weselpos_kemitraan_dn');
    }
}
