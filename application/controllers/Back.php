<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Back extends CI_Controller
{
    public $data = [];

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') != true) {
            $this->session->set_flashdata('error_co', 'Vous devez être connecté pour accéder à cette page.');
            redirect('welcome/login');
        }
    }

    ///////////////// CREATE ETAB
    public function create_etabs()
    {
        $data['title'] = 'New Menu - Créer un établissement';

        $this->load->view('partials/header', $data);
        $this->load->view('back/etab/create', $data);
    }

    public function add_etabs()
    {
        $this->load->library('form_validation', 'url');

        $user_id = $this->session->userdata('user_id');
        $nom = $this->input->post('nom');
        $url = $this->input->post('url');
        $adresse = $this->input->post('adresse');
        $code_postale = $this->input->post('code_postale');
        $telephone = $this->input->post('telephone');
        $ville = $this->input->post('ville');
        $site = $this->input->post('site');

        if ($this->form_validation->run() == true) {
            $this->load->model('Establishments_model', 'establishments');
            $data = [
                'name' => $nom,
                'url' => $url,
                'adress' => $adresse,
                'postal_code' => $code_postale,
                'phone' => $telephone,
                'city' => $ville,
                'web_site' => $site,
                'user_id' => $user_id,
            ];

            $this->establishments->add($data);
            $id = $this->db->insert_id();
            $etab_id = ['etab_id' => $id];
            $this->session->set_userdata($etab_id);
            redirect("back/dashboard/");
        } else {
            $this->session->set_flashdata('error', "Une erreur s'est produite");
            redirect('back/create_etabs');
        }
    }

    ///////////////// AFFICHAGE TABLEAU DE BORD

    public function dashboard()
    {
        $etab_id = $this->session->userdata('etab_id');
        $data['title'] = 'Votre carte - Accueil';
        $this->load->model('Establishments_model', 'establishments');
        $data['etab'] = $this->establishments->selectById($etab_id);
        $data['count_cat'] = $this->establishments->countCat($etab_id);
        $data['count_prod'] = $this->establishments->countProd($etab_id);
        $this->load->model('Customisation_model', 'customisation');
        $data['logo'] = $this->customisation->select($etab_id);
        $this->template->load('layout_back', 'back/etab/dashboard', $data);
    }

    ///////////////// AFFICHAGE EDIT ETAB

    public function establishments()
    {
        $etab_id = $this->session->userdata('etab_id');
        $data['title'] = 'Votre carte - Etablissement';
        $this->load->model('Establishments_model', 'establishments');
        $data['etab'] = $this->establishments->selectById($etab_id);
        $this->template->load('layout_back', 'back/etab/edit', $data);
    }

    public function edit_etabs()
    {
        $this->load->library('form_validation', 'url');

        $etab_id = $this->session->userdata('etab_id');
        $nom = $this->input->post('nom');
        $url = $this->input->post('url');
        $adresse = $this->input->post('adresse');
        $code_postale = $this->input->post('code_postale');
        $telephone = $this->input->post('telephone');
        $ville = $this->input->post('ville');
        $site = $this->input->post('site');

        if ($this->form_validation->run() == true) {
            $this->load->model('Establishments_model', 'establishments');
            $data = [
                'name' => $nom,
                'url' => $url,
                'adress' => $adresse,
                'postal_code' => $code_postale,
                'phone' => $telephone,
                'city' => $ville,
                'web_site' => $site,
            ];

            $this->establishments->update($etab_id, $data);
            $this->session->set_flashdata('success_update', 'Mis à jour de votre établissement');
            redirect('back/establishments');
        } else {
            redirect('back/establishments');
        }
    }

    ///////////////// CATEGORIES

    public function categories()
    {
        $etab_id = $this->session->userdata('etab_id');
        $this->load->model('Categories_model', 'categories');
        $data['categories'] = $this->categories->selectAll($etab_id);

        if (count($data['categories']) > 0) {
            $data['title'] = 'Votre carte - Catégories de produits';
            $this->template->load('layout_back', 'back/categories/display_all', $data);
        } else {
            $this->add_category();
        }
    }

    public function add_category()
    {
        $data['title'] = 'Votre carte - Ajouter une catégorie de produits';
        // $data['icons'] = ['1-cocktail.png', '2-entree.png', '3-hotfood.png', '4-plate.png', '5-pizza.png', '6-hamburger.png', '7-meat.png', '8-pastas.png', '9-crustacean.png', '10-fish.png', '11-cake.png', '12-ice.png', '13-drink.png', '14-beer.png', '15-wine.png', '16-cafe.png', '17-digestif.png', '18-cheese.png', '19-salad.png', '20-soup.png', '21-shooters.png'];
        $this->template->load('layout_back', 'back/categories/add', $data);
    }

    public function add_category_done()
    {
        $this->load->library('form_validation');
        $nom = $this->input->post('nom');
        $description = $this->input->post('description');
        $rang = $this->input->post('rang');
        $etab_id = $this->session->userdata('etab_id');

        if ($this->form_validation->run() == true) {
            $this->load->model('Categories_model', 'categories');
            $data = ['name' => $nom, 'description' => $description, 'rank' => $rang, 'est_id' => $etab_id];
            $this->categories->add($data);
            $this->session->set_flashdata('success_add', 'Catégorie ajoutée');
            redirect("back/categories");
        } else {
            $this->session->set_flashdata('error', "Une erreur s'est produite.");
            redirect("back/categories");
        }
    }

    public function edit_category($cat_id)
    {
        $data['title'] = 'Votre carte - Catégories de produits';
        $this->load->model('Categories_model', 'categories');
        $data['category'] = $this->categories->selectById($cat_id);
        $data['icons'] = ['1-cocktail.png', '2-entree.png', '3-hotfood.png', '4-plate.png', '5-pizza.png', '6-hamburger.png', '7-meat.png', '8-pastas.png', '9-crustacean.png', '10-fish.png', '11-cake.png', '12-ice.png', '13-drink.png', '14-beer.png', '15-wine.png', '16-cafe.png', '17-digestif.png', '18-cheese.png', '19-salad.png', '20-soup.png', '21-shooters.png'];
        $this->template->load('layout_back', 'back/categories/edit', $data);
    }

    public function edit_category_done($cat_id)
    {
        $this->edit_category($cat_id);
        $this->load->library('form_validation');
        $nom = $this->input->post('nom');
        $description = $this->input->post('description');
        $rang = $this->input->post('rang');

        if ($this->form_validation->run() == true) {
            $this->load->model('Categories_model', 'categories');
            $data = ['name' => $nom, 'description' => $description, 'rank' => $rang];
            $this->categories->update($cat_id, $data);
            $this->session->set_flashdata('success_edit', 'Catégorie modifiée');
            redirect("/back/categories/");
        } else {
            $this->session->set_flashdata('error', "Une erreur s'est produite.");
            redirect("back/categories");
        }
    }

    public function delete_category($cat_id)
    {
        $this->load->model('Categories_model', 'categories');

        if ($this->categories->delete($cat_id)) {
            $this->session->set_flashdata('alert', '<strong>Impossible de supprimer.</strong><br>Un ou plusieurs produits sont associés à cette catégorie. Vous devez les supprimer avant de pouvoir supprimer cette catégorie.');
            redirect("back/categories");
        } else {
            $this->session->set_flashdata('success_del', 'Catégorie supprimée');
            redirect("back/categories");
        }
    }

    ///////////////// PRODUITS

    public function products()
    {
        $etab_id = $this->session->userdata('etab_id');
        $data['title'] = 'Votre carte - Liste de produit';
        $this->load->model('Categories_model', 'categories');
        $data['categories'] = $this->categories->selectAll($etab_id);
        $data['display_produits'] = '';

        if (count($data['categories']) > 0) {
            $this->template->load('layout_back', 'back/products/all_prod', $data);
        } else {
            $this->add_product();
        }
    }

    public function add_product()
    {
        $etab_id = $this->session->userdata('etab_id');
        $data['title'] = 'Votre carte - Ajouter un produit';

        $this->load->model('Categories_model', 'categories');
        $data['categories'] = $this->categories->selectAll($etab_id);

        if (count($data['categories']) > 0) {
            $data['display_categories'] = $this->load->view('back/products/select_cat', $data, true);
        } else {
            $data['display_categories'] = $this->load->view('back/products/no_cat', '', true);
        }
        $this->template->load('layout_back', 'back/products/add', $data);
    }

    public function add_product_done()
    {
        $this->load->library('form_validation');

        $cat_id = $this->input->post('categorie');
        $nom = $this->input->post('nom');
        $description = $this->input->post('description');
        $prix = $this->input->post('prix');
        $rang = $this->input->post('rang');

        if ($this->form_validation->run() == true) {
            $this->load->model('Products_model', 'products');
            $data = ['cat_id' => $cat_id, 'name' => $nom, 'composition' => $description, 'price' => $prix, 'rank' => $rang];
            $this->products->add($data);
            $prod_id = $this->db->insert_id();

            $data['product_added'] = $this->products->selectById($prod_id);

            $this->load->model('Pricecat_Model', 'pricecat');
            $data['catprices'] = $this->pricecat->selectAll($data['product_added']->cat_id);

            if (count($data['catprices']) > 0) {
                $this->products->activePiceCat($prod_id);
            }

            $this->edit_product($prod_id);
        } else {
            $this->session->set_flashdata('error', "Une erreur s'est produite.");
            redirect("back/products");
        }
    }

    public function display_products($cat_id)
    {
        $etab_id = $this->session->userdata('etab_id');
        $this->load->model('Products_model', 'products');
        $data['produits'] = $this->products->selectAll($cat_id);
        $this->load->model('Categories_model', 'categories');
        $data['category'] = $this->categories->selectById($cat_id);
        $data['title'] = "Votre carte - " . $data['category']->name;

        if (count($data['produits']) > 0) {
            $data['categories'] = $this->categories->selectAll($etab_id);
            $this->load->model('Link_prod_prices_model', 'link');
            $data['prod_prices'] = $this->link->getPriceByProd($cat_id);
            $data['display_produits'] = $this->load->view('back/products/show_prod', $data, true);
            $this->template->load('layout_back', 'back/products/all_prod', $data);
        } else {
            redirect('back/add_product');
        }
    }

    public function edit_product($prod_id)
    {
        $etab_id = $this->session->userdata('etab_id');

        $this->load->model('Categories_model', 'categories');
        $data['categories'] = $this->categories->selectAll($etab_id);

        $this->load->model('Products_model', 'products');
        $data['produit'] = $this->products->selectById($prod_id);
        $data['title'] = 'Votre carte - Produit : ' . $data['produit']->name;
        $data['category'] = $this->products->selectProdByCat($data['produit']->cat_id);

        $this->load->model('Pricecat_Model', 'pricecat');
        $data['catprices'] = $this->pricecat->selectAll($data['produit']->cat_id);

        if (count($data['categories']) > 0) {
            $data['display_categories'] = $this->load->view('back/products/select_cat_edit', $data, true);
        }

        if (count($data['catprices']) > 0) {
            $this->products->activePiceCat($prod_id);
            $data['displayprice_cat'] = 'style="display: block;"';
            $data['display_unique_price'] = 'style="display: none;"';

            $this->load->model('Link_prod_prices_model', 'link');
            $data['prod_prices'] = $this->link->selectAll($prod_id);
        } else {
            $data['display_unique_price'] = 'style="display : block;"';
            $data['displayprice_cat'] = 'style="display : none;"';
        }

        $this->template->load('layout_back', 'back/products/edit', $data);
    }

    public function edit_product_done($prod_id)
    {
        $this->load->library('form_validation');
        $prod_id = $this->input->post('prod_id');
        $cat_id = $this->input->post('cat_id');
        $nom = $this->input->post('nom');
        $description = $this->input->post('description');
        $prix = $this->input->post('prix');
        $rang = $this->input->post('rang');

        $pricecats = $this->input->post("pricecat");
        $catprices_id = $this->input->post("catprice_id");

        if ($this->form_validation->run() == true) {
            $this->load->model('Products_model', 'products');
            $data = ['name' => $nom, 'composition' => $description, 'price' => $prix, 'rank' => $rang];
            $this->products->update($prod_id, $data);

            $this->load->model('Link_prod_prices_model', 'link');
            $data['prod_prices'] = $this->link->selectAll($prod_id);

            if (count($data['prod_prices']) > 0) {
                $i = 0;
                foreach ($pricecats as $row) {
                    foreach ($catprices_id as $row) {
                        $datakey = ['prod_id' => $prod_id, 'prices_id' => $catprices_id[$i]];
                        $data3 = ['price' => $pricecats[$i]];
                    }
                    $i++;
                    $this->link->update($data3, $datakey);
                };
            } else {
                $i = 0;
                foreach ($pricecats as $row) {
                    foreach ($catprices_id as $row) {
                        $data2 = ['prod_id' => $prod_id, 'price' => $pricecats[$i], 'prices_id' => $catprices_id[$i]];
                    }
                    $i++;
                    $this->link->add($data2);
                };
            }
            $this->session->set_flashdata('success_edit', 'Produit modifié');
            redirect("back/display_products/$cat_id");
        } else {
            $this->session->set_flashdata('error', "Une erreur s'est produite.");
            redirect("back/display_products/$cat_id");
        }
    }

    public function upload_product_img($prod_id)
    {
        $this->load->helper(array('form'));

        $config['upload_path'] = './uploads/products/';
        $config['allowed_types'] = 'jpg|png';
        $config['file_name'] = "prodcut_";
        $config['overwrite'] = true;
        $config['max_size'] = 8;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('product_image')) {
            $data['error'] = $this->upload->display_errors();
            $this->session->set_flashdata('error_upload', $data['error']);
            print_r($data);

        } else {
            $data['product_image'] = $this->upload->data();
            // $img = $data['logo']['file_name'];
            print_r($data);

            // $this->load->model('Customisation_model', 'customisation');
            // $data['etab_perso'] = $this->customisation->select($etab_id);

            // if (isset($data['etab_perso']->logo)) {
            //     $data_logo = ['logo' => $logo];
            //     $this->customisation->update($etab_id, $data_logo);
            // } else {
            //     $data_logo = ['est_id' => $etab_id, 'logo' => $logo];
            //     $this->customisation->add_logo($data_logo);
            // }
            // $this->output->delete_cache('back/etab/customisation/');
            // $this->output->delete_cache('back/etab/dashboard/');
        }
        // redirect('back/customize');
    }

    public function delete_product($prod_id)
    {
        $this->load->model('Products_model', 'products');
        $this->load->model('Link_prod_prices_model', 'link');
        $data['products'] = $this->link->selectAll($prod_id);

        foreach ($data['products'] as $product) {
            $prices_id = $product->prices_id;
            $this->products->deletelink($prod_id, $prices_id);
        }

        $this->products->delete($prod_id);
        $this->session->set_flashdata('succes_del', 'Produit supprimé');
        redirect("back/products/");
    }

    ///////////////// QUANTITES

    public function quantity()
    {
        $etab_id = $this->session->userdata('etab_id');
        $this->load->model('Categories_model', 'categories');
        $data['categories'] = $this->categories->selectAll($etab_id);

        if (count($data['categories']) > 0) {
            $data['title'] = 'Votre carte - Quantités';
            $this->template->load('layout_back', 'back/quantites/all_qty', $data);
        } else {
            $this->add_category();
        }
    }

    public function add_quantity($cat_id)
    {
        $this->load->model('Categories_model', 'categories');
        $data['categorie'] = $this->categories->selectById($cat_id);
        $data['title'] = "Votre carte | Quantités : " . $data['categorie']->name;
        $this->load->model('Pricecat_Model', 'pricecat');
        $data['quantites'] = $this->pricecat->selectAll($cat_id);

        if (count($data['quantites']) > 0) {
            $data['displayqte'] = $this->load->view('back/quantites/qty_by_cat', $data, true);
        } else {
            $data['displayqte'] = '';
        }

        $this->template->load('layout_back', 'back/quantites/add', $data);
    }

    public function add_quantity_done($cat_id)
    {
        $this->add_quantity($cat_id);
        $this->load->library('form_validation');

        $nom = $this->input->post('nom');
        $rang = $this->input->post('rang');

        if ($this->form_validation->run() == true) {
            $this->load->model('Pricecat_Model', 'pricecat');
            $data = ['name' => $nom, 'rank' => $rang, 'cat_id' => $cat_id];
            $this->pricecat->add($data);
            redirect("back/add_quantity/$cat_id");
        } else {
            redirect('back/quantity');
        }
    }

    public function edit_quantity($cat_id)
    {
        $this->load->model('Categories_model', 'categories');
        $data['categorie'] = $this->categories->selectById($cat_id);
        $data['title'] = "Votre carte | Quantités : " . $data['categorie']->name;
        $this->load->model('Pricecat_Model', 'pricecat');
        $data['quantites'] = $this->pricecat->selectAll($cat_id);

        if (count($data['quantites']) > 0) {
            $this->template->load('layout_back', 'back/quantites/edit', $data);
        } else {
            $this->session->set_flashdata('no_qty', "Cette catégorie n'a aucune quantité");
            redirect('back/quantity');
        }
    }

    public function edit_single_quantity($qty_id)
    {
        $this->load->library('form_validation');
        $qtyname = $this->input->post('qtyname');
        $cat_id = $this->input->post('cat_id');

        if ($this->form_validation->run() == true) {
            $this->load->model('Pricecat_Model', 'pricecat');
            $data = ['name' => $qtyname];
            $this->pricecat->update($qty_id, $data);
            $this->edit_quantity($cat_id);
            $this->session->set_flashdata('succes_qty', "Quantitée modifiée.");
        } else {
            $this->session->set_flashdata('error', "Une erreur s'est produite.");
        }
    }

    public function delete_quantity($qty_id)
    {
        $this->load->model('Pricecat_Model', 'pricecat');
        $this->pricecat->delete($qty_id);
        $this->session->set_flashdata('succes_del', "Quantité supprimée.");
        redirect('back/quantity');
    }

    ///////////////// PERSONNALISATION

    public function customize()
    {
        $data['title'] = 'Votre carte - Personnalisation';
        $data['etab_id'] = $this->session->userdata('etab_id');
        $this->load->model('Customisation_model', 'customisation');
        $data['etab_perso'] = $this->customisation->select($data['etab_id']);
        $this->template->load('layout_back', 'back/etab/customization', $data);
    }

    public function upload_logo()
    {
        $this->load->helper(array('form'));
        $data['title'] = 'Votre carte - Personnalisation';
        $etab_id = $this->session->userdata('etab_id');

        $config['upload_path'] = './uploads/logos/';
        $config['allowed_types'] = 'jpg|png';
        $config['file_name'] = "logo_" . $etab_id;
        $config['overwrite'] = true;
        $config['max_size'] = 5;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('logo')) {
            $data['error'] = $this->upload->display_errors();
            $this->session->set_flashdata('error_upload', $data['error']);

        } else {
            $data['logo'] = $this->upload->data();
            $logo = $data['logo']['file_name'];
            $this->load->model('Customisation_model', 'customisation');
            $data['etab_perso'] = $this->customisation->select($etab_id);

            if (isset($data['etab_perso']->logo)) {
                $data_logo = ['logo' => $logo];
                $this->customisation->update($etab_id, $data_logo);
            } else {
                $data_logo = ['est_id' => $etab_id, 'logo' => $logo];
                $this->customisation->add_logo($data_logo);
            }
            $this->output->delete_cache('back/etab/customisation/');
            $this->output->delete_cache('back/etab/dashboard/');
        }
        redirect('back/customize');
    }

    public function presentation_etab()
    {
        $this->load->library('form_validation');

        $etab_id = $this->session->userdata('etab_id');
        $presentation = $this->input->post('presentation');

        if ($this->form_validation->run() == true) {
            $this->load->model('Customisation_model', 'customisation');
            $data = ['presentation' => $presentation];
            $this->customisation->presentation($etab_id, $data);
            redirect('back/customize');
        }
    }

}
