<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Back extends CI_Controller
{
    public $data = [];

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') != true) {
            $this->session->set_flashdata('error_co', 'Vous devez être connecté pour accédérer à cette page.');
            redirect('welcome/login');
        }
    }

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

    public function dashboard()
    {
        $etab_id = $this->session->userdata('etab_id');
        $data['title'] = 'Votre carte - Accueil';
        $this->load->model('Establishments_model', 'establishments');
        $data['etab'] = $this->establishments->selectById($etab_id);
        $data['count_cat'] = $this->establishments->countCat($etab_id);
        $this->template->load('layout', 'back/etab/dashboard', $data);
    }

    public function establishments()
    {
        $etab_id = $this->session->userdata('etab_id');
        $data['title'] = 'Votre carte - Etablissement';
        $this->load->model('Establishments_model', 'establishments');
        $data['etab'] = $this->establishments->selectById($etab_id);
        $this->template->load('layout', 'back/etab/edit', $data);
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

    public function categories()
    {
        $etab_id = $this->session->userdata('etab_id');
        $this->load->model('Categories_model', 'categories');
        $data['categories'] = $this->categories->selectAll($etab_id);

        if (count($data['categories']) > 0) {
            $data['title'] = 'Votre carte - Catégories de produits';
            $this->template->load('layout', 'back/categories/display_all', $data);
        } else {
            $data['title'] = 'Votre carte - Ajouter une catégorie de produits';
            $this->template->load('layout', 'back/categories/add', $data);
        }
    }

    public function add_category()
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
        $this->template->load('layout', 'back/categories/edit', $data);
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
        $this->categories->delete($cat_id);
        $this->session->set_flashdata('success_del', 'Catégorie supprimée');
        redirect("back/categories");
    }
}
