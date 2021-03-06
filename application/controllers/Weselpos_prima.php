<?php defined('BASEPATH') or exit('No direct script access allowed');

class Weselpos_prima extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();

        $this->load->model('weselpos_prima_m');
    }

    public function index()
    {
        $data['row'] = $this->weselpos_prima_m->get();

        $this->template->load('template', 'product/weselpos_prima/weselpos_prima_data', $data);
    }

    public function add()
    {
        //tambah dan edit biar satu form
        $weselpos_prima = new stdClass();
        $weselpos_prima->weselpos_prima_id = null;
        $weselpos_prima->question = null;
        $weselpos_prima->answer = null;
        $weselpos_prima->image = null;
        $data = array(
            'page' => 'add',
            'row' => $weselpos_prima
        );
        $this->template->load('template', 'product/weselpos_prima/weselpos_prima_form', $data);
    }

    public function edit($id)
    {
        $query = $this->weselpos_prima_m->get($id);
        if ($query->num_rows() > 0) {
            $weselpos_prima = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $weselpos_prima
            );
            $this->template->load('template', 'product/weselpos_prima/weselpos_prima_form', $data);
        } else {
            echo "<script>alert ('data tidak ditemukan');";
            echo "<script> window.location='" . site_url('weselpos_prima') . "';</script>";
        }
    }

    public function process()
    {
        $config['upload_path']      = './uploads/product/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg';
        $config['max_size']         = '2048';
        $config['file_name']        = 'weselpos_prima-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);

        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            if (@$_FILES['image']['name'] != null) {
                if ($this->upload->do_upload('image')) {
                    $post['image'] = $this->upload->data('file_name');
                    $this->weselpos_prima_m->add($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil di simpan !');
                    }
                    redirect('weselpos_prima');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('weselpos_prima');
                }
            } else {
                $post['image'] = null;
                $this->weselpos_prima_m->add($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data berhasil di simpan !');
                }
                redirect('weselpos_prima');
            }
        } else if (isset($_POST['edit'])) {
            if (@$_FILES['image']['name'] != null) {
                if ($this->upload->do_upload('image')) {

                    $weselpos_prima = $this->weselpos_prima_m->get($post['id'])->row;
                    if ($weselpos_prima->image != null) {
                        $target_file = './uploads/product/' . $weselpos_prima->image;
                        unlink($target_file);
                    }

                    $post['image'] = $this->upload->data('file_name');
                    $this->weselpos_prima_m->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil di simpan !');
                    }
                    redirect('weselpos_prima');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('weselpos_prima');
                }
            } else {
                $post['image'] = null;
                $this->weselpos_prima_m->edit($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data berhasil di simpan !');
                }
                redirect('weselpos_prima');
            }
        }
    }

    public function del($id)
    {
        $weselpos_prima = $this->weselpos_prima_m->get($id)->row();
        if ($weselpos_prima->image != null) {
            $target_file = './uploads/product/' . $weselpos_prima->image;
            unlink($target_file);
        }
        //ini method post
        // $id = $this->input->post('user_id');

        //ini method get
        $this->weselpos_prima_m->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di hapus !');
        }
        redirect('weselpos_prima');
    }
}
