<?php defined('BASEPATH') or exit('No direct script access allowed');

class Qposin_aja extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();

        $this->load->model('qposin_aja_m');
    }

    public function index()
    {
        $data['row'] = $this->qposin_aja_m->get();

        $this->template->load('template', 'product/qposin_aja/qposin_aja_data', $data);
    }

    public function add()
    {
        //tambah dan edit biar satu form
        $qposin_aja = new stdClass();
        $qposin_aja->qposin_aja_id = null;
        $qposin_aja->question = null;
        $qposin_aja->answer = null;
        $qposin_aja->image = null;
        $data = array(
            'page' => 'add',
            'row' => $qposin_aja
        );
        $this->template->load('template', 'product/qposin_aja/qposin_aja_form', $data);
    }

    public function edit($id)
    {
        $query = $this->qposin_aja_m->get($id);
        if ($query->num_rows() > 0) {
            $qposin_aja = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $qposin_aja
            );
            $this->template->load('template', 'product/qposin_aja/qposin_aja_form', $data);
        } else {
            echo "<script>alert ('data tidak ditemukan');";
            echo "<script> window.location='" . site_url('qposin_aja') . "';</script>";
        }
    }

    public function process()
    {
        $config['upload_path']      = './uploads/product/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg';
        $config['max_size']         = '2048';
        $config['file_name']        = 'qposin_aja-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);

        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            if (@$_FILES['image']['name'] != null) {
                if ($this->upload->do_upload('image')) {
                    $post['image'] = $this->upload->data('file_name');
                    $this->qposin_aja_m->add($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil di simpan !');
                    }
                    redirect('qposin_aja');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('qposin_aja');
                }
            } else {
                $post['image'] = null;
                $this->qposin_aja_m->add($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data berhasil di simpan !');
                }
                redirect('qposin_aja');
            }
        } else if (isset($_POST['edit'])) {
            if (@$_FILES['image']['name'] != null) {
                if ($this->upload->do_upload('image')) {

                    $qposin_aja = $this->qposin_aja_m->get($post['id'])->row;
                    if ($qposin_aja->image != null) {
                        $target_file = './uploads/product/' . $qposin_aja->image;
                        unlink($target_file);
                    }

                    $post['image'] = $this->upload->data('file_name');
                    $this->qposin_aja_m->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil di simpan !');
                    }
                    redirect('qposin_aja');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('qposin_aja');
                }
            } else {
                $post['image'] = null;
                $this->qposin_aja_m->edit($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data berhasil di simpan !');
                }
                redirect('qposin_aja');
            }
        }
    }

    public function del($id)
    {
        $qposin_aja = $this->qposin_aja_m->get($id)->row();
        if ($qposin_aja->image != null) {
            $target_file = './uploads/product/' . $qposin_aja->image;
            unlink($target_file);
        }
        //ini method post
        // $id = $this->input->post('user_id');

        //ini method get
        $this->qposin_aja_m->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di hapus !');
        }
        redirect('qposin_aja');
    }
}
