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
}