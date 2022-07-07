<?php
class Fungsi
{
    protected $ci;
    function __construct()
    {
        $this->ci = &get_instance();
    }
    // set user id menjadi sesssion
    function user_login()
    {
        $this->ci->load->model('User_model');
        $user_id = $this->ci->session->userdata('userid'); // membua var session 
        $user_data = $this->ci->User_model->get($user_id)->row(); // simpan session menjadi sesuai userid = user_id pd tbl
        return $user_data;
    }

    function PdfGenerator($html, $filename, $paper, $orentation)
    {


        // instantiate and use the dompdf class
        $dompdf = new Dompdf\Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper($paper, $orentation);

        // Render the HTML as PDF
        $dompdf->render();

        // use Dompdf\Dompdf;
        // Output the generated PDF to Browser
        $dompdf->stream($filename,  array('Attachment' => 0));
    }
}
