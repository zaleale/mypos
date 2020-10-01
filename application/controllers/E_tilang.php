<?php defined('BASEPATH') or exit('No direct script access allowed');

class E_tilang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();

        $this->load->model('e_tilang_m');
    }

    public function index()
    {
        $data['row'] = $this->e_tilang_m->get();

        $this->template->load('template', 'product/e_tilang/e_tilang_data', $data);
    }

    public function add()
    {
        //tambah dan edit biar satu form
        $e_tilang = new stdClass();
        $e_tilang->e_tilang_id = null;
        $e_tilang->question = null;
        $e_tilang->answer = null;
        $e_tilang->image = null;
        $data = array(
            'page' => 'add',
            'row' => $e_tilang
        );
        $this->template->load('template', 'product/e_tilang/e_tilang_form', $data);
    }

    public function edit($id)
    {
        $query = $this->e_tilang_m->get($id);
        if ($query->num_rows() > 0) {
            $e_tilang = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $e_tilang
            );
            $this->template->load('template', 'product/e_tilang/e_tilang_form', $data);
        } else {
            echo "<script>alert ('data tidak ditemukan');";
            echo "<script> window.location='" . site_url('e_tilang') . "';</script>";
        }
    }

    public function process()
    {
        $config['upload_path']      = './uploads/product/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg';
        $config['max_size']         = '2048';
        $config['file_name']        = 'e_tilang-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);

        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            if (@$_FILES['image']['name'] != null) {
                if ($this->upload->do_upload('image')) {
                    $post['image'] = $this->upload->data('file_name');
                    $this->e_tilang_m->add($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil di simpan !');
                    }
                    redirect('e_tilang');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('e_tilang');
                }
            } else {
                $post['image'] = null;
                $this->e_tilang_m->add($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data berhasil di simpan !');
                }
                redirect('e_tilang');
            }
        } else if (isset($_POST['edit'])) {
            if (@$_FILES['image']['name'] != null) {
                if ($this->upload->do_upload('image')) {

                    $e_tilang = $this->e_tilang_m->get($post['id'])->row;
                    if ($e_tilang->image != null) {
                        $target_file = './uploads/product/' . $e_tilang->image;
                        unlink($target_file);
                    }

                    $post['image'] = $this->upload->data('file_name');
                    $this->e_tilang_m->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil di simpan !');
                    }
                    redirect('e_tilang');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('e_tilang');
                }
            } else {
                $post['image'] = null;
                $this->e_tilang_m->edit($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data berhasil di simpan !');
                }
                redirect('e_tilang');
            }
        }
    }

    public function del($id)
    {
        $e_tilang = $this->e_tilang_m->get($id)->row();
        if ($e_tilang->image != null) {
            $target_file = './uploads/product/' . $e_tilang->image;
            unlink($target_file);
        }
        //ini method post
        // $id = $this->input->post('user_id');

        //ini method get
        $this->e_tilang_m->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di hapus !');
        }
        redirect('e_tilang');
    }
}
