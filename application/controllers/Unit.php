<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('unit_model');
    }


    public function index()
    {
        $data['uni'] = $this->unit_model->get();
        $this->template->load('template', 'product/unit/unit_data', $data);
    }
    public function add()
    {
        // ==membuat buat variabel null kemudian set ke unit_form
        $unit = new stdClass();
        $unit->unit_id = null;
        $unit->name = null; // initialisasi variabel utk field di unit form (biar kosong) 
        $data  = array(
            'page' => 'add',
            'uni' => $unit //lempar data  ke field di unit_form_ yg brisi data null 
        );
        //=== ===========
        $this->template->load('template', 'product/unit/unit_form', $data);
    }

    public function process()
    {
        $post = $this->input->post(null, true);
        if (isset($_POST['add'])) {
            $this->unit_model->add($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan');
            }
            redirect('unit');
        } elseif (isset($_POST['update'])) {
            $this->unit_model->update($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil diupdate');
            }
            redirect('unit');
        }
    }

    public function update($id)
    {
        $query = $this->unit_model->get($id);
        if ($query->num_rows() > 0) { // jk user ada di db
            $unit = $query->row(); // simpan row data yg didapat 
            $data  = array(
                'page' => 'update',
                'uni' => $unit // lempar ke field di unit_form_ yg brisi row data dr db utk update
            );
            $this->template->load('template', 'product/unit/unit_form', $data); // tampilkan dat user yg sudah dipilih pada template / form/halam
        } else {
            echo "<script>alert('Data tidak ditemukan');</script>";
            redirect('unit');
        }
    }

    public function delete($id)
    {
        // $id = $this->input->post('unit_id');
        $this->unit_model->delete($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('unit');
    }
}
