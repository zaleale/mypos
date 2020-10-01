<?php defined('BASEPATH') or exit('No direct script access allowed');

class Q9 extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();

        $this->load->model('q9_m');
    }

    public function index()
    {
        $data['row'] = $this->q9_m->get();

        $this->template->load('template', 'product/q9/q9_data', $data);
    }

    public function add()
    {
        //tambah dan edit biar satu form
        $q9 = new stdClass();
        $q9->q9_id = null;
        $q9->question = null;
        $q9->answer = null;
        $q9->image = null;
        $data = array(
            'page' => 'add',
            'row' => $q9
        );
        $this->template->load('template', 'product/q9/q9_form', $data);
    }

    public function edit($id)
    {
        $query = $this->q9_m->get($id);
        if ($query->num_rows() > 0) {
            $q9 = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $q9
            );
            $this->template->load('template', 'product/q9/q9_form', $data);
        } else {
            echo "<script>alert ('data tidak ditemukan');";
            echo "<script> window.location='" . site_url('q9') . "';</script>";
        }
    }

    public function process()
    {
        $config['upload_path']      = './uploads/product/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg';
        $config['max_size']         = '2048';
        $config['file_name']        = 'q9-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);

        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            if (@$_FILES['image']['name'] != null) {
                if ($this->upload->do_upload('image')) {
                    $post['image'] = $this->upload->data('file_name');
                    $this->q9_m->add($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil di simpan !');
                    }
                    redirect('q9');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('q9');
                }
            } else {
                $post['image'] = null;
                $this->q9_m->add($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data berhasil di simpan !');
                }
                redirect('q9');
            }
        } else if (isset($_POST['edit'])) {
            if (@$_FILES['image']['name'] != null) {
                if ($this->upload->do_upload('image')) {

                    $q9 = $this->q9_m->get($post['id'])->row;
                    if ($q9->image != null) {
                        $target_file = './uploads/product/' . $q9->image;
                        unlink($target_file);
                    }

                    $post['image'] = $this->upload->data('file_name');
                    $this->q9_m->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil di simpan !');
                    }
                    redirect('q9');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('q9');
                }
            } else {
                $post['image'] = null;
                $this->q9_m->edit($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data berhasil di simpan !');
                }
                redirect('q9');
            }
        }
    }

    public function del($id)
    {
        $q9 = $this->q9_m->get($id)->row();
        if ($q9->image != null) {
            $target_file = './uploads/product/' . $q9->image;
            unlink($target_file);
        }
        //ini method post
        // $id = $this->input->post('user_id');

        //ini method get
        $this->q9_m->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di hapus !');
        }
        redirect('q9');
    }
}
