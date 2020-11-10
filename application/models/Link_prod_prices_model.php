<?
class Link_prod_prices_model extends CI_Model
{

    public function selectAll($prod_id)
    {
        $this->db->select('*');
        $this->db->from('link_prod_prices');
        $this->db->where('prod_id', $prod_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function add($data2)
    {
        $this->db->insert('link_prod_prices', $data2);
    }

    public function update($data3, $datakey)
    {
        $this->db->set($data3);
        $this->db->where($datakey);
        $this->db->update('link_prod_prices');
    }

    public function getPriceByProd($cat_id)
    {
        $this->db->select('link_prod_prices.prod_id as linkprodid, prices_id, link_prod_prices.price, prices_categories.name as pricename, products.name as prodname');
        $this->db->from('link_prod_prices');
        $this->db->join('products', 'link_prod_prices.prod_id = products.id');
        $this->db->join('prices_categories', 'link_prod_prices.prices_id = prices_categories.id');
        $this->db->where('products.cat_id', $cat_id);
        $this->db->group_by('link_prod_prices.prod_id, prices_id, link_prod_prices.price, prodname'); 
        $query = $this->db->get();
        return $query->result();
    }

}
