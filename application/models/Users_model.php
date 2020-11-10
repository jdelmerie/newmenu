<?
class Users_model extends CI_Model
{
    public function add($data)
    {
        $this->db->set('creation', 'NOW()', false);
        $this->db->insert('users', $data);
    }

    public function selectById($id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result()[0];
    }

    public function validation($user_id, $data)
    {
        $this->db->where('id', $user_id);
        $this->db->set($data);
        $this->db->update('users');
    }

    public function selectByEmail($email)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $email);
        $query = $this->db->get();
        return $query->result()[0];
    }

    public function updatePwd($data, $email)
    {
        $this->db->where('email', $email);
        $this->db->set($data);
        $this->db->update('users');
    }

}
