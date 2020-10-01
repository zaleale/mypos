<?php defined('BASEPATH') or exit('No direct script access allowed');

class Posgiro_mobile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();

        $this->load->model('posgiro_mobile_m');
    }

    public function index()
    {
        $data['row'] = $this->posgiro_mobile_m->get();

        $this->template->load('template', 'product/posgiro_mobile/posgiro_mobile_data', $data);
    }

    public function add()
    {
        //tambah dan edit biar satu form
        $posgiro_mobile = new stdClass();
        $posgiro_mobile->posgiro_mobile_id = null;
        $posgiro_mobile->question = null;
        $posgiro_mobile->answer = null;
        $posgiro_mobile->image = null;
        $posgiro_mobile->deskripsi = null;
        $data = array(
            'page' => 'add',
            'row' => $posgiro_mobile
        );
        $this->template->load('template', 'product/posgiro_mobile/posgiro_mobile_form', $data);
    }

    public function edit($id)
    {
        $query = $this->posgiro_mobile_m->get($id);
        if ($query->num_rows() > 0) {
            $posgiro_mobile = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $posgiro_mobile
            );
            $this->template->load('template', 'product/posgiro_mobile/posgiro_mobile_form', $data);
        } else {
            echo "<script>alert ('data tidak ditemukan');";
            echo "<script> window.location='" . site_url('posgiro_mobile') . "';</script>";
        }
    }

    public function process()
    {
        $config['upload_path']      = './uploads/product/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg';
        $config['max_size']         = '2048';
        $config['file_name']        = 'posgiro_mobile-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);

        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            if (@$_FILES['image']['name'] != null) {
                if ($this->upload->do_upload('image')) {
                    $post['image'] = $this->upload->data('file_name');
                    $this->posgiro_mobile_m->add($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil di simpan !');
                    }
                    redirect('posgiro_mobile');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('posgiro_mobile');
                }
            } else {
                $post['image'] = null;
                $this->posgiro_mobile_m->add($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data berhasil di simpan !');
                }
                redirect('posgiro_mobile');
            }
        } else if (isset($_POST['edit'])) {
            if (@$_FILES['image']['name'] != null) {
                if ($this->upload->do_upload('image')) {

                    $posgiro_mobile = $this->posgiro_mobile_m->get($post['id'])->row;
                    if ($posgiro_mobile->image != null) {
                        $target_file = './uploads/product/' . $posgiro_mobile->image;
                        unlink($target_file);
                    }

                    $post['image'] = $this->upload->data('file_name');
                    $this->posgiro_mobile_m->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil di simpan !');
                    }
                    redirect('posgiro_mobile');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('posgiro_mobile');
                }
            } else {
                $post['image'] = null;
                $this->posgiro_mobile_m->edit($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data berhasil di simpan !');
                }
                redirect('posgiro_mobile');
            }
        }
    }

    public function del($id)
    {
        $posgiro_mobile = $this->posgiro_mobile_m->get($id)->row();
        if ($posgiro_mobile->image != null) {
            $target_file = './uploads/product/' . $posgiro_mobile->image;
            unlink($target_file);
        }
        //ini method post
        // $id = $this->input->post('user_id');

        //ini method get
        $this->posgiro_mobile_m->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di hapus !');
        }
        redirect('posgiro_mobile');
    }
}
