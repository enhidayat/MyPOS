<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('supplier_model');
    }


    public function index()
    {
        $data['suply'] = $this->supplier_model->get();
        $this->template->load('template', 'supplier/supplier_data', $data);
    }
    public function add()
    {
        // ==membuat buat variabel null kemudian set ke supplier_form
        $supplier = new stdClass();
        $supplier->supplier_id = null;
        $supplier->name = null; // initialisasi variabel utk field di supplier form (biar kosong) 
        $supplier->phone = null;
        $supplier->address = null;
        $supplier->description = null;
        $data  = array(
            'page' => 'add',
            'suply' => $supplier //lempar data  ke field di supplier_form_ yg brisi data null 
        );
        //=== ===========
        $this->template->load('template', 'supplier/supplier_form', $data);
    }

    public function process()
    {
        $post = $this->input->post(null, true);
        if (isset($_POST['add'])) {
            $this->supplier_model->add($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('Data berhasil disimpan');</script>";
            }
            echo "<script>window.location='" . base_url('supplier') . "'</script>";
        } elseif (isset($_POST['update'])) {
            $this->supplier_model->update($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('Data berhasil diupdate');</script>";
            }
            echo "<script>window.location='" . base_url('supplier') . "'</script>";
        }
    }

    public function update($id)
    {
        $query = $this->supplier_model->get($id);
        if ($query->num_rows() > 0) { // jk user ada di db
            $supplier = $query->row(); // simpan row data yg didapat 
            $data  = array(
                'page' => 'update',
                'suply' => $supplier // lempar ke field di supplier_form_ yg brisi row data dr db utk update
            );
            $this->template->load('template', 'supplier/supplier_form', $data); // tampilkan dat user yg sudah dipilih pada template / form/halam
        } else {
            echo "<script>alert('Data tidak ditemukan');</script>";
            echo "<script>window.location='" . base_url('supplier') . "'</script>";
        }
    }

    public function delete($id)
    {
        // $id = $this->input->post('supplier_id');
        $this->supplier_model->delete($id);

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='" . base_url('supplier') . "'</script>";
    }
}
