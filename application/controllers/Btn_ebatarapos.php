<?php defined('BASEPATH') or exit('No direct script access allowed');

class Btn_ebatarapos extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();

        $this->load->model('btn_ebatarapos_m');
    }

    public function index()
    {
        $data['row'] = $this->btn_ebatarapos_m->get();

        $this->template->load('template', 'product/btn_ebatarapos/btn_ebatarapos_data', $data);
    }

    public function add()
    {
        //tambah dan edit biar satu form
        $btn_ebatarapos = new stdClass();
        $btn_ebatarapos->btn_ebatarapos_id = null;
        $btn_ebatarapos->question = null;
        $btn_ebatarapos->answer = null;
        $btn_ebatarapos->image = null;
        $data = array(
            'page' => 'add',
            'row' => $btn_ebatarapos
        );
        $this->template->load('template', 'product/btn_ebatarapos/btn_ebatarapos_form', $data);
    }

    public function edit($id)
    {
        $query = $this->btn_ebatarapos_m->get($id);
        if ($query->num_rows() > 0) {
            $btn_ebatarapos = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $btn_ebatarapos
            );
            $this->template->load('template', 'product/btn_ebatarapos/btn_ebatarapos_form', $data);
        } else {
            echo "<script>alert ('data tidak ditemukan');";
            echo "<script> window.location='" . site_url('btn_ebatarapos') . "';</script>";
        }
    }

    public function process()
    {
        $config['upload_path']      = './uploads/product/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg';
        $config['max_size']         = '2048';
        $config['file_name']        = 'btn_ebatarapos-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);

        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            if (@$_FILES['image']['name'] != null) {
                if ($this->upload->do_upload('image')) {
                    $post['image'] = $this->upload->data('file_name');
                    $this->btn_ebatarapos_m->add($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil di simpan !');
                    }
                    redirect('btn_ebatarapos');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('btn_ebatarapos');
                }
            } else {
                $post['image'] = null;
                $this->btn_ebatarapos_m->add($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data berhasil di simpan !');
                }
                redirect('btn_ebatarapos');
            }
        } else if (isset($_POST['edit'])) {
            if (@$_FILES['image']['name'] != null) {
                if ($this->upload->do_upload('image')) {

                    $btn_ebatarapos = $this->btn_ebatarapos_m->get($post['id'])->row;
                    if ($btn_ebatarapos->image != null) {
                        $target_file = './uploads/product/' . $btn_ebatarapos->image;
                        unlink($target_file);
                    }

                    $post['image'] = $this->upload->data('file_name');
                    $this->btn_ebatarapos_m->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil di simpan !');
                    }
                    redirect('btn_ebatarapos');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('btn_ebatarapos');
                }
            } else {
                $post['image'] = null;
                $this->btn_ebatarapos_m->edit($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data berhasil di simpan !');
                }
                redirect('btn_ebatarapos');
            }
        }
    }

    public function del($id)
    {
        $btn_ebatarapos = $this->btn_ebatarapos_m->get($id)->row();
        if ($btn_ebatarapos->image != null) {
            $target_file = './uploads/product/' . $btn_ebatarapos->image;
            unlink($target_file);
        }
        //ini method post
        // $id = $this->input->post('user_id');

        //ini method get
        $this->btn_ebatarapos_m->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di hapus !');
        }
        redirect('btn_ebatarapos');
    }
}
