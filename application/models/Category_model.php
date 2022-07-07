 <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class category_model extends CI_Model
    {
        public function get($id = null)
        {
            $this->db->from('product_category');
            if ($id != null) {
                $this->db->where('category_id', $id);
            }
            $query = $this->db->get();
            return $query;
        }

        public function delete($id)
        {
            $this->db->where('category_id', $id);
            $this->db->delete('product_category');
        }

        public function add($post)
        {

            $params = [

                'name' => $post['category_name'],

            ];
            $this->db->insert('product_category', $params);
        }
        public function update($post)
        {

            $params = [

                'name' => $post['category_name'],
                'updated'   =>  date('Y-m-d H:i:s')
            ];
            $this->db->where('category_id', $post['category_id']);
            $this->db->update('product_category', $params);
        }
    }
