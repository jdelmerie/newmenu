<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Etab extends CI_Controller
{
    public $data = [];

    public function index()
    {
        $this->load->model('Establishments_model', 'establishments');
        $url = explode('/', uri_string());
        $etab_url = $url[1];

        $data['etab'] = $this->establishments->selectUrl($etab_url);

        if ($data['etab']){
            $etab_id = $data['etab']->id;
        }

        redirect("etab/display/$etab_id");
    }

    public function display($etab_id)
    {
        $data['categories'] = $this->carte->get_categories($etab_id);
        $data['etab'] = $this->carte->get_etab($etab_id);
        $data['etab_perso'] = $this->carte->get_presentation($etab_id);
        $data['title'] = $data['etab']->name;
        $data['header_color'] = $data['etab_perso']->header_color;
        $data['background_color'] = $data['etab_perso']->background_color;

        $this->template->load('layout_front', 'front/etab/presentation', $data);
    }

    public function category($cat_id)
    {
        $etab_id = $this->input->get('etab_id', true);
        $data['categories'] = $this->carte->get_categories($etab_id);
        $data['etab'] = $this->carte->get_etab($etab_id);
        $data['etab_perso'] = $this->carte->get_presentation($etab_id);
        $data['header_color'] = $data['etab_perso']->header_color;
        $data['background_color'] = $data['etab_perso']->background_color;

        $this->load->model('Categories_model', 'categories');
        $this->load->model('Products_model', 'products');

        $data['category'] = $this->categories->selectById($cat_id);
        $data['title'] = $data['category']->name;
        $data['produits'] = $this->products->selectAll($cat_id);

        $this->template->load('layout_front', 'front/etab/products', $data);
    }

    public function product($prod_id)
    {
        $etab_id = $this->input->get('etab_id', true);
        $this->load->model('Products_model', 'products');
        $this->load->model('Categories_model', 'categories');
        $this->load->model('Link_prod_prices_model', 'link');

        $data['produit'] = $this->products->selectById($prod_id);
        $data['categories'] = $this->carte->get_categories($etab_id);
        $data['etab'] = $this->carte->get_etab($etab_id);
        $data['etab_perso'] = $this->carte->get_presentation($etab_id);
        $data['header_color'] = $data['etab_perso']->header_color;
        $data['background_color'] = $data['etab_perso']->background_color;
        $data['category'] = $this->categories->selectById($data['produit']->cat_id);
        $data['prod_prices'] = $this->link->getPriceByProdFront($prod_id);
        $data['title'] = $data['produit']->name;

        $this->template->load('layout_front', 'front/etab/product_fiche', $data);
    }
}
