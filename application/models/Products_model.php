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

    public function add($data)
    {
        $this->db->insert('products', $data);
    }
}