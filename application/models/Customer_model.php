 <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class customer_model extends CI_Model
    {
        public function get($id = null)
        {
            $this->db->from('customer_tbl');
            if ($id != null) {
                $this->db->where('customer_id', $id);
            }
            $query = $this->db->get();
            return $query;
        }

        public function delete($id)
        {
            $this->db->where('customer_id', $id);
            $this->db->delete('customer_tbl');
        }

        public function add($post)
        {

            $params = [

                'name' => $post['customer_name'],
                'gender' => $post['gender'],
                'phone' => $post['phone'],
                'address' => $post['address'],


            ];
            $this->db->insert('customer_tbl', $params);
        }
        public function update($post)
        {

            $params = [

                'name' => $post['customer_name'],
                'gender' => $post['gender'],
                'phone' => $post['phone'],
                'address' => $post['address'],

                'updated'   =>  date('Y-m-d H:i:s')
            ];
            $this->db->where('customer_id', $post['customer_id']);
            $this->db->update('customer_tbl', $params);
        }
    }
