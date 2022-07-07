 <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Supplier_model extends CI_Model
    {
        public function get($id = null)
        {
            $this->db->from('supplier_tbl');
            if ($id != null) {
                $this->db->where('supplier_id', $id);
            }
            $query = $this->db->get();
            return $query;
        }

        public function delete($id)
        {
            $this->db->where('supplier_id', $id);
            $this->db->delete('supplier_tbl');
        }

        public function add($post)
        {

            $params = [

                'name' => $post['supplier_name'],
                'phone' => $post['phone'],
                'address' => $post['address'],
                'description' => empty($post['description']) ? null : $post['description']

            ];
            $this->db->insert('supplier_tbl', $params);
        }
        public function update($post)
        {

            $params = [

                'name' => $post['supplier_name'],
                'phone' => $post['phone'],
                'address' => $post['address'],
                'description' => empty($post['description']) ? null : $post['description'],
                'updated'   =>  date('Y-m-d H:i:s')
            ];
            $this->db->where('supplier_id', $post['supplier_id']);
            $this->db->update('supplier_tbl', $params);
        }
    }
