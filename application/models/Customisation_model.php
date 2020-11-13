<?
class Customisation_model extends CI_Model
{
    public function select($etab_id)
    {
        $this->db->select('*');
        $this->db->from('customisation');
        $this->db->where('est_id', $etab_id);
        $query = $this->db->get();

        if (count($query->result()) > 0){
            return $query->result()[0];
        }
        
    }

    public function add_logo($data_logo)
    {
        $this->db->insert('customisation', $data_logo);
    }

    public function update($etab_id, $data)
    {
        $this->db->where('est_id', $etab_id);
        $this->db->set($data);
        $this->db->update('customisation');
    }

    public function presentation($etab_id, $data)
    {
        $this->db->where('est_id', $etab_id);
        $this->db->set($data);
        $this->db->update('customisation');
    }

    public function colors($etab_id, $data)
    {
        $this->db->where('est_id', $etab_id);
        $this->db->set($data);
        $this->db->update('customisation');
    }
}
