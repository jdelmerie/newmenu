<? 
class Categories_model extends CI_Model 
{
    public function selectAll($etab_id)
    {
        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where('est_id', $etab_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function selectById($cat_id)
    {
        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where('id', $cat_id);
        $query = $this->db->get();
        return $query->result()[0];
    }

    public function add($data)
    {
        $this->db->insert('categories', $data);
    }

    public function update($cat_id, $data)
    {
        $this->db->where('id', $cat_id);
        $this->db->set($data);
        $this->db->update('categories');
    }

    public function delete($cat_id)
    {
        $this->db->where('id', $cat_id);
        $this->db->delete('categories');
    }
}