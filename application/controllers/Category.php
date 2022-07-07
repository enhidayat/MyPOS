<?php
defined('BASEPATH') or exit('No direct script access allowed');

class category extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('category_model');
    }


    public function index()
    {
        $data['categ'] = $this->category_model->get();
        $this->template->load('template', 'product/category/category_data', $data);
    }
    public function add()
    {
        // ==membuat buat variabel null kemudian set ke category_form
        $category = new stdClass();
        $category->category_id = null;
        $category->name = null; // initialisasi variabel utk field di category form (biar kosong) 
        $data  = array(
            'page' => 'add',
            'categ' => $category //lempar data  ke field di category_form_ yg brisi data null 
        );
        //=== ===========
        $this->template->load('template', 'product/category/category_form', $data);
    }

    public function process()
    {
        $post = $this->input->post(null, true);
        if (isset($_POST['add'])) {
            $this->category_model->add($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan');
            }
            redirect('category');
        } elseif (isset($_POST['update'])) {
            $this->category_model->update($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil diupdate');
            }
            redirect('category');
        }
    }

    public function update($id)
    {
        $query = $this->category_model->get($id);
        if ($query->num_rows() > 0) { // jk user ada di db
            $category = $query->row(); // simpan row data yg didapat 
            $data  = array(
                'page' => 'update',
                'categ' => $category // lempar ke field di category_form_ yg brisi row data dr db utk update
            );
            $this->template->load('template', 'product/category/category_form', $data); // tampilkan dat user yg sudah dipilih pada template / form/halam
        } else {
            echo "<script>alert('Data tidak ditemukan');</script>";
            redirect('category');
        }
    }

    public function delete($id)
    {
        // $id = $this->input->post('category_id');
        $this->category_model->delete($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('category');
    }
}
