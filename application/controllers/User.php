 <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class User extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();

            check_not_login();
            check_admin();
            $this->load->model('User_model');
            $this->load->library('form_validation');
        }


        public function index()
        {
            // $data['users'] = $this->User_model->get()->result_array();
            $data['users'] = $this->User_model->get();

            $this->template->load('template', 'user/user_data', $data);
        }
        public function add()
        {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules(
                'passconf',
                'Password Confirmation',
                'required|matches[password]',

                array('matches' => '%s Not Mathes with password')
            );
            // $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('level', 'Level', 'required');


            $this->form_validation->set_message('required', '%s masih kosong, silahkan isi ');
            $this->form_validation->set_message('min_length', '{field}  minimal 9 karakter ');
            // $this->form_validation->set_message('is_unique', '{field} sudah dipakai, silahkan ganti ');



            if ($this->form_validation->run() == FALSE) {
                $this->template->load('template', 'user/user_form_add');
            } else {
                $post = $this->input->post(null, true);
                $this->User_model->add($post);

                if ($this->db->affected_rows() > 0) {
                    echo "<script>alert('Data berhasil disimpan');</script>";
                }
                echo "<script>window.location='" . base_url('user') . "'</script>";
            }
        }

        public function delete()
        {
            $id = $this->input->post('user_id');
            $this->User_model->delete($id);

            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('Data berhasil dihapus');</script>";
            }
            echo "<script>window.location='" . base_url('user') . "'</script>";
        }

        public function update($id)
        {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required|callback_username_check');

            if ($this->input->post('password')) { // gk wajib ganti password
                $this->form_validation->set_rules('password', 'Password', 'min_length[5]');
                $this->form_validation->set_rules(
                    'passconf',
                    'Password Confirmation',
                    '|matches[password]',
                    array('matches' => '%s Not Mathes with password')
                );
            }
            if ($this->input->post('passconf')) {
                $this->form_validation->set_rules(
                    'passconf',
                    'Password Confirmation',
                    'matches[password]',
                    array('matches' => '%s Not Mathes with password')
                );
            }
            $this->form_validation->set_rules('level', 'Level', 'required');


            $this->form_validation->set_message('required', '%s masih kosong, silahkan isi ');
            $this->form_validation->set_message('min_length', '{field}  minimal 5 karakter ');
            $this->form_validation->set_message('is_unique', '{field} sudah dipakai, silahkan ganti ');



            if ($this->form_validation->run() == FALSE) {
                $query = $this->User_model->get($id); // pilih user bersasarkan id 
                if ($query->num_rows() > 0) { // jk user ada di db
                    $data['users'] = $query->row(); // simpan dt user yg sudah diambil 
                    $this->template->load('template', 'user/user_form_update', $data); // tampilkan dat user yg sudah dipilih pada template / form/halam
                } else { //jika dt tidak ada
                    echo "<script>alert('Data tidak ditemukan');</script>";

                    echo "<script>window.location='" . base_url('user') . "'</script>";
                }
            } else {
                $post = $this->input->post(null, true);
                $this->User_model->update($post);

                if ($this->db->affected_rows() > 0) {
                    echo "<script>alert('Data berhasil diupdate');</script>";
                }
                echo "<script>window.location='" . base_url('user') . "'</script>";
            }
        }
        //fungsi collback 
        public function username_check()
        {
            $post = $this->input->post(null, true);
            $query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND user_id !=  '$post[user_id]'");
            if ($query->num_rows() > 0) {
                $this->form_validation->set_message('username_check', '{field}   sudah dipakai silahkan ganti username lain ');
                return FALSE;
            } else {
                return TRUE;
            }
        }
    }
