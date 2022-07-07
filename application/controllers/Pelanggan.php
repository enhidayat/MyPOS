<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('customer_model');
    }


    public function index()
    {
        $data['custom'] = $this->customer_model->get();
        $this->template->load('template', 'customer/customer_data', $data);
    }
    public function add()
    {
        // ==membuat buat variabel null kemudian set ke customer_form
        $customer = new stdClass();
        $customer->customer_id = null;
        $customer->name = null; // initialisasi variabel utk field di customer form (biar kosong) 
        $customer->gender = null;
        $customer->phone = null;
        $customer->address = null;
        $data  = array(
            'page' => 'add',
            'custom' => $customer //lempar data  ke field di customer_form_ yg brisi data null 
        );
        //=== ===========
        $this->template->load('template', 'customer/customer_form', $data);
    }

    public function process()
    {
        $post = $this->input->post(null, true);
        if (isset($_POST['add'])) {
            $this->customer_model->add($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('Data berhasil disimpan');</script>";
            }
            echo "<script>window.location='" . base_url('customer') . "'</script>";
        } elseif (isset($_POST['update'])) {
            $this->customer_model->update($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('Data berhasil diupdate');</script>";
            }
            echo "<script>window.location='" . base_url('customer') . "'</script>";
        }
    }

    public function update($id)
    {
        $query = $this->customer_model->get($id);
        if ($query->num_rows() > 0) { // jk user ada di db
            $customer = $query->row(); // simpan row data yg didapat 
            $data  = array(
                'page' => 'update',
                'custom' => $customer // lempar ke field di customer_form_ yg brisi row data dr db utk update
            );
            $this->template->load('template', 'customer/customer_form', $data); // tampilkan dat user yg sudah dipilih pada template / form/halam
        } else {
            echo "<script>alert('Data tidak ditemukan');</script>";
            echo "<script>window.location='" . base_url('customer') . "'</script>";
        }
    }

    public function delete($id)
    {
        // $id = $this->input->post('customer_id');
        $this->customer_model->delete($id);

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='" . base_url('customer') . "'</script>";
    }
}
