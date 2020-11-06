<?
class Pricecat_Model extends CI_Model
{
    public function selectAll($cat_id)
    {
        $this->db->select('*');
        $this->db->from('prices_categories');
        $this->db->where('cat_id', $cat_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function add($data)
    {
        $this->db->insert('prices_categories', $data);
    }

    public function update($qty_id, $data)
    {
        $this->db->where('id', $qty_id);
        $this->db->set($data);
        $this->db->update('prices_categories');
    }

    public function delete($qty_id)
    {
        $this->db->where('id', $qty_id);
        $this->db->delete('prices_categories');
    }

}