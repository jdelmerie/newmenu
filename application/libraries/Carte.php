<?if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Carte
{
    public function get_categories($etab_id)
    {
        $CI = &get_instance();
        $CI->db->select('*');
        $CI->db->from('categories');
        $CI->db->where('est_id', $etab_id);
        $query = $CI->db->get();
        return $query->result();
    }

    public function get_etab($etab_id)
    {
        $CI = &get_instance();
        $CI->db->select('*');
        $CI->db->from('establishments');
        $CI->db->where('id', $etab_id);
        $query = $CI->db->get();
        
        if (count($query->result()) > 0){
            return $query->result()[0];
        }
    }

    public function get_presentation($etab_id)
    {
        $CI = &get_instance();
        $CI->db->select('*');
        $CI->db->from('customisation');
        $CI->db->where('est_id', $etab_id);
        $query = $CI->db->get();

        if (count($query->result()) > 0){
            return $query->result()[0];
        }
    }
}
