<?php
defined('BASEPATH') or exit('No direct script access allowed');

class item extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['item_model', 'category_model', 'unit_model']);
    }


    public function index()
    {
        $data['itm'] = $this->item_model->get();
        $this->template->load('template', 'product/item/item_data', $data);
    }
    public function add()
    {
        // ==membuat buat variabel null kemudian set ke item_form
        $item = new stdClass();
        $item->item_id = null;
        $item->barcode = null;
        $item->name = null; // initialisasi variabel utk field di item form (biar kosong) 
        $item->price = null;
        $item->category_id = null;
        $query_category   = $this->category_model->get();
        $unit['null'] = '- Pilih -';


        $query_unit   = $this->unit_model->get();
        foreach ($query_unit->result() as $unt) {
            // print_r($unt);
            $unit[$unt->unit_id] = $unt->name;
        }
        $data  = array(
            'page' => 'add',
            'itm' => $item, //lempar data  ke field di item_form_ yg brisi data null 
            'categ' => $query_category,
            'unit'  => $unit, //$unit=  variabel array 2D yg berisi [unit_id & name ]yg sesuai serta  [null => -PILIH - ]
            'selectedUnit' => null,

        );
        // print_r($unit);
        $this->template->load('template', 'product/item/item_form', $data);
    }

    public function process()
    {
        $config['upload_path']          = './uploads/product';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2048;
        $config['file_name']             = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);

        $post = $this->input->post(null, true);
        if (isset($_POST['add'])) {
            if ($this->item_model->check_barcode($post['barcode'])->num_rows() > 0) {
                $this->session->set_flashdata("error", "Barcode $post[barcode] sudah dipakai Barang lain");
                redirect('item/add');
            } else {



                //kalo pake gambar
                if (@$_FILES['image']['name'] != null) {
                    if ($this->upload->do_upload('image')) {
                        $post['image'] = $this->upload->data('file_name');
                        $this->item_model->add($post);

                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'Data berhasil disimpan');
                        }
                        redirect('item');
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata("error", $error);
                        redirect('item/add');
                    }
                }
                // kalo gak pake gambar
                else {
                    $post['image'] = null;
                    $this->item_model->add($post);

                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    }
                    redirect('item');
                }
            }
            // if ($this->db->affected_rows() > 0) {
            //     $this->session->set_flashdata('success', 'Data berhasil disimpan');
            // }
            // redirect('item');

        } elseif (isset($_POST['update'])) {

            if ($this->item_model->check_barcode($post['barcode'], $post['item_id'])->num_rows() > 0) {
                $this->session->set_flashdata("error", "Barcode $post[barcode] sudah dipakai Barang lain");
                redirect('item/update/' . $post['item_id']);
            } else {
                //disini
                //kalo pake gambar
                if (@$_FILES['image']['name'] != null) {
                    if ($this->upload->do_upload('image')) {

                        // replace
                        $item = $this->item_model->get($post['item_id'])->row();
                        if ($item->image != null) {
                            $target_file = trim('./uploads/product/' . $item->image);
                            unlink($target_file);
                        }

                        $post['image'] = $this->upload->data('file_name');
                        $this->item_model->update($post);

                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'Data berhasil diupdate');
                        }
                        redirect('item');
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata("error", $error);
                        redirect('item/update');
                    }
                }
                // kalo gak pake gambar
                else {
                    $post['image'] = null;
                    $this->item_model->update($post);

                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil diupdate');
                    }
                    redirect('item');
                }
            }

            // $this->item_model->update($post);
            // if ($this->db->affected_rows() > 0) {
            //     $this->session->set_flashdata('success', 'Data berhasil diupdate');
            // }
            // redirect('item');
        }
    }

    public function update($id)
    {
        $query = $this->item_model->get($id);
        if ($query->num_rows() > 0) { // jk user ada di db
            $item = $query->row(); // simpan row data yg didapat 
            $query_category   = $this->category_model->get();
            $unit['null'] = '- Pilih -';


            $query_unit   = $this->unit_model->get();
            foreach ($query_unit->result() as $unt) {
                // print_r($unt);
                $unit[$unt->unit_id] = $unt->name;
            }
            $data  = array(
                'page' => 'update',
                'itm' => $item, //lempar data  ke field di item_form_ yg brisi data null 
                'categ' => $query_category,
                'unit'  => $unit, //$unit=  variabel array 2D yg berisi [unit_id & name ]yg sesuai serta  [null => -PILIH - ]
                'selectedUnit' => $item->unit_id,

            );
            $this->template->load('template', 'product/item/item_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');</script>";
            redirect('item');
        }
    }

    public function delete($id)
    {
        //hapus gambar di folder
        $item = $this->item_model->get($id)->row();
        if ($item->image != null) {
            $target_file = trim('./uploads/product/' . $item->image);
            unlink($target_file);
        }

        $this->item_model->delete($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('item');
    }

    public function barcode_qrcode($id)
    {
        //     $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
        //     echo $generator->getBarcode('081wrwerewr', $generator::TYPE_CODE_128);
        $data['itm'] = $this->item_model->get($id)->row();
        $this->template->load('template', 'product/item/barcode_qrcode', $data);
    }

    public function barcode_print($id)
    {
        $data['itm'] = $this->item_model->get($id)->row();
        $html = $this->load->view('product/item/barcode_print', $data, true);
        $this->fungsi->PdfGenerator($html, 'barcode-' . $data['itm']->barcode, 'A4', 'landscape');
    }
    public function qrcode_print($id)
    {
        $data['itm'] = $this->item_model->get($id)->row();
        $html = $this->load->view('product/item/qrcode_print', $data, true);
        $this->fungsi->PdfGenerator($html, 'qrcode-' . $data['itm']->barcode, 'A4', 'potrait');
    }
}
