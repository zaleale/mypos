<?php defined('BASEPATH') or exit('No direct script access allowed');

class Tamasia extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();

        $this->load->model('tamasia_m');
    }

    public function index()
    {
        $data['row'] = $this->tamasia_m->get();

        $this->template->load('template', 'product/tamasia/tamasia_data', $data);
    }

    public function add()
    {
        //tambah dan edit biar satu form
        $tamasia = new stdClass();
        $tamasia->tamasia_id = null;
        $tamasia->question = null;
        $tamasia->answer = null;
        $tamasia->image = null;
        $data = array(
            'page' => 'add',
            'row' => $tamasia
        );
        $this->template->load('template', 'product/tamasia/tamasia_form', $data);
    }

    public function edit($id)
    {
        $query = $this->tamasia_m->get($id);
        if ($query->num_rows() > 0) {
            $tamasia = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $tamasia
            );
            $this->template->load('template', 'product/tamasia/tamasia_form', $data);
        } else {
            echo "<script>alert ('data tidak ditemukan');";
            echo "<script> window.location='" . site_url('tamasia') . "';</script>";
        }
    }

    public function process()
    {
        $config['upload_path']      = './uploads/product/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg';
        $config['max_size']         = '2048';
        $config['file_name']        = 'tamasia-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);

        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            if (@$_FILES['image']['name'] != null) {
                if ($this->upload->do_upload('image')) {
                    $post['image'] = $this->upload->data('file_name');
                    $this->tamasia_m->add($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil di simpan !');
                    }
                    redirect('tamasia');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('tamasia');
                }
            } else {
                $post['image'] = null;
                $this->tamasia_m->add($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data berhasil di simpan !');
                }
                redirect('tamasia');
            }
        } else if (isset($_POST['edit'])) {
            if (@$_FILES['image']['name'] != null) {
                if ($this->upload->do_upload('image')) {

                    $tamasia = $this->tamasia_m->get($post['id'])->row;
                    if ($tamasia->image != null) {
                        $target_file = './uploads/product/' . $tamasia->image;
                        unlink($target_file);
                    }

                    $post['image'] = $this->upload->data('file_name');
                    $this->tamasia_m->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil di simpan !');
                    }
                    redirect('tamasia');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('tamasia');
                }
            } else {
                $post['image'] = null;
                $this->tamasia_m->edit($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data berhasil di simpan !');
                }
                redirect('tamasia');
            }
        }
    }

    public function del($id)
    {
        $tamasia = $this->tamasia_m->get($id)->row();
        if ($tamasia->image != null) {
            $target_file = './uploads/product/' . $tamasia->image;
            unlink($target_file);
        }
        //ini method post
        // $id = $this->input->post('user_id');

        //ini method get
        $this->tamasia_m->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil di hapus !');
        }
        redirect('tamasia');
    }
}
