<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Back extends CI_Controller
{
    public $data = [];

    public function create_etabs()
    {
        $data['title'] = 'New Menu - Créer un établissement';

        $this->load->view('partials/header', $data);
        echo "créer un établissement";
        $this->load->view('partials/footer');
    }

    public function dashboard()
    {
        $data['title'] = 'Votre carte - Accueil';

        $this->load->view('partials/header', $data);
        echo "votre tableau de bord";
        $this->load->view('partials/footer');

        $resto_id = $this->session->userdata('etab_id');

        echo "id du resto : $resto_id";
    }
}
