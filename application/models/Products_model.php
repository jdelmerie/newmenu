<?
class Products_Model extends CI_Model
{
    public function selectAll($cat_id)
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('cat_id', $cat_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function selectById($prod_id)
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('id', $prod_id);
        $query = $this->db->get();
        return $query->result()[0];
    }

    public function selectProdByCat($cat_id)
    {
        $this->db->select('categories.name, categories.id, products.cat_id');
        $this->db->from('products');
        $this->db->join('categories', 'categories.id = products.cat_id');
        $this->db->where('categories.id', $cat_id);
        $this->db->where('products.cat_id', $cat_id);
        $query = $this->db->get();
        return $query->result()[0];
    }

    public function add($data)
    {
        $this->db->insert('products', $data);
    }

    public function update($prod_id, $data)
    {
        $this->db->where('id', $prod_id);
        $this->db->set($data);
        $this->db->update('products');
    }

    public function delete($prod_id)
    {
        $this->db->delete('products', ['id' => $prod_id]);
    }

    public function deletelink($prod_id, $prices_id)
    {
        $this->db->where(['prod_id' => $prod_id, 'prices_id' => $prices_id]);
        $this->db->delete('link_prod_prices');
    }

    public function activePiceCat($prod_id)
    {
        $this->db->where('id', $prod_id);
        $this->db->set(['prices_categories' => 1, 'price' => 0]);
        $this->db->update('products');
    }
}
