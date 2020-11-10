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
        if (!$this->db->delete('categories', ['id' => $cat_id])) {
            return $this->db->error();
        }
        return false;
    }

    public function countByCat($cat_id)
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->join('categories', 'categories.id = products.cat_id');
        $this->db->where('cat_id', $cat_id);
        $count = $this->db->count_all_results();
        return $count;
    }
}