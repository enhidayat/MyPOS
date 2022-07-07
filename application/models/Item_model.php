 <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class item_model extends CI_Model
    {
        public function get($id = null)
        {
            $this->db->select('product_item.*,product_category.name as category_name, product_unit.name  as unit_name');
            $this->db->from('product_item');
            $this->db->join('product_category', 'product_category.category_id = product_item.category_id');
            $this->db->join('product_unit', 'product_unit.unit_id = product_item.unit_id');
            if ($id != null) {
                $this->db->where('item_id', $id);
            }
            $this->db->order_by('barcode', 'asc');
            $query = $this->db->get();
            return $query;
        }

        public function check_barcode($code, $id = null)
        {
            $this->db->from('product_item');
            $this->db->where('barcode', $code);
            if ($id != null) {
                $this->db->where('item_id !=', $id); // -> yg bikin return jd false
            }
            $query = $this->db->get();
            return $query; // kalo method add ( ) setelah dicek return = true , kalo edit returnya = false
        }

        public function delete($id)
        {
            $this->db->where('item_id', $id);
            $this->db->delete('product_item');
        }

        public function add($post)
        {

            $params = [

                'barcode' => $post['barcode'],
                'name' => $post['name'],
                'category_id' => $post['category'],
                'unit_id' => $post['unit'],
                'price' => $post['price'],
                'image' => $post['image'],

            ];
            $this->db->insert('product_item', $params);
        }
        public function update($post)
        {

            $params = [

                'barcode' => $post['barcode'],
                'name' => $post['name'],
                'category_id' => $post['category'],
                'unit_id' => $post['unit'],
                'price' => $post['price'],
                'updated'   =>  date('Y-m-d H:i:s')
            ];
            if ($post['image'] != null) { // jk image tidak ksong(mau diganti)
                $params['image'] = $post['image'];
            }
            $this->db->where('item_id', $post['item_id']);
            $this->db->update('product_item', $params);
        }
    }
