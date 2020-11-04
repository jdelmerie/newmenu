<?
class Establishments_model extends CI_Model 
{
    public function selectByUserId($user_id)
    {
        $this->db->select('*');
        $this->db->from('establishments');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function selectUserEtabs($user_id)
    {
        $this->db->select('*');
        $this->db->from('establishments');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        return $query->result()[0];
    }

    public function add($data)
    {
        $this->db->insert('establishments', $data);
    }

    public function selectById($etab_id)
    {
        $this->db->select('*');
        $this->db->from('establishments');
        $this->db->where('id', $etab_id);
        $query = $this->db->get();
        return $query->result()[0];
    }

    public function update($etab_id, $data)
    {
        $this->db->where('id', $etab_id);
        $this->db->set($data);
        $this->db->update('establishments');
    }

    public function countCat($etab_id)
    {
        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where('est_id', $etab_id);
        $count = $this->db->count_all_results();
        return $count;
    }
}