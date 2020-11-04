<?php
defined('BASEPATH') or exit('No direct script access allowed');
// require_once 'env.php';

class Welcome extends CI_Controller
{
    public $data = [];

    public function index()
    {
        $data['title'] = "NEW MENU";

        $this->load->view('partials/header', $data);
        $this->load->view('home');
        $this->load->view('partials/footer');
    }

    public function signin()
    {
        $data['title'] = "New Menu - Inscription";

        $this->load->view('partials/header', $data);
        $this->load->view('front/signin_view');
        $this->load->view('partials/footer');
    }

    public function register()
    {
        $this->load->library('form_validation');
        $this->load->library('email');

        $email = $this->input->post("email");
        $password = $this->input->post("password");
        $confirmpassword = $this->input->post("confirmpassword");
        $activation_hash = password_hash($password, PASSWORD_DEFAULT);

        if ($this->form_validation->run() == true) {

            if ($password != $confirmpassword) {
                $this->session->set_flashdata('error', "Le mot de passe ne correspond pas.");
                redirect('welcome/signin');
            } else {
                $this->load->model('Users_model', 'users');
                $data = [
                    'email' => $email,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'active' => 0,
                    'activation_hash' => $activation_hash,
                ];
                $this->users->add($data);
                $user_id = $this->db->insert_id();
                $this->sendmail($user_id, $activation_hash, $email);
                $this->session->set_flashdata('success_signin', "<strong>Votre compte a bien été créé.</strong><br> Vous allez recevoir un email de validation.");
                redirect('welcome/login');
            }
        } else {
            $this->session->set_flashdata('error', "Cet email est déjà associé à un compte.");
            redirect('welcome/signin');
        }
    }

    public function sendmail($user_id, $activation_hash, $email)
    {
        // TODOS : urlencode les mpd 
        $lien_validation = "<a href='http://newmenu.local/welcome/validation?id=$user_id&activation=$activation_hash'>ICI</a>";
        $objet = 'Création de compte pour NewMenu';
        $message = "Pour valider votre compte, cliquez sur le lien : $lien_validation";

        $config['protocol'] = PROTOCOL;
        $config['smtp_host'] = SMTP_HOST;
        $config['smtp_port'] = SMTP_PORT;
        $config['smtp_user'] = SMTP_USER;
        $config['smtp_pass'] = SMTP_PASS;
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = true;
        $this->email->initialize($config);

        $this->email->from(SMTP_USER, 'No Reply');
        $this->email->to($email);
        $this->email->subject($objet);
        $this->email->message($message);
        $this->email->send();
    }

    public function validation()
    {
        $id = $this->input->get('id', true);
        $this->load->model('Users_model', 'users');
        $user = $this->users->selectById($id);

        if ($user->id == $id) {
            $data = ['active' => 1];
            $this->users->validation($id, $data);
            $this->session->set_flashdata('success_valid', '<strong>Votre compte a été activé.</strong><br>Vous pouvez vous connecter.');
            redirect('/welcome/login');
        }
    }

    public function forgotten_password()
    {
        $data['title'] = 'New Menu - Mot de passe oublié';

        $this->load->view('partials/header', $data);
        $this->load->view('front/forgotten_password');
        $this->load->view('partials/footer');
    }

    public function new_password()
    {
        $this->load->library('form_validation');

        $email = $this->input->post("email");
        $password = $this->input->post("password");

        if ($this->form_validation->run() == true) {
            $this->load->model('Users_model', 'users');
            $this->users->selectByEmail($email);
            $new_password = password_hash($password, PASSWORD_DEFAULT);
            $data = ['password' => $new_password];
            $this->users->updatePwd($data, $email);
            $this->session->set_flashdata('success_new_pwd', 'Votre mot de passe a été modifié, vous pouvez vous connecter.');
            redirect('welcome/login');
        } else {
            $this->session->set_flashdata('error', "Une erreur s'est produite.");
            redirect('welcome/forgotten_password');
        }
    }

    public function login()
    {
        $data['title'] = "New Menu - Connexion";

        $this->load->view('partials/header', $data);
        $this->load->view('front/login_view');
        $this->load->view('partials/footer');
    }

    public function connexion()
    {
        $this->load->library('form_validation', 'email');

        $email = $this->input->post("email");
        $password = $this->input->post("password");

        if ($this->form_validation->run() == true) {

            // select l'user grâce à son email
            $this->load->model('Users_model', 'users');
            $user = $this->users->selectByEmail($email);

            // si l'user existe, vérifie le mdp et que son compte est activé
            if (password_verify($password, $user->password) && $user->active == 1) {

                // définit les info de la session
                $userSession = ['user_id' => $user->id, 'logged_in' => true];
                $this->session->set_userdata($userSession);
                $this->load->model('Establishments_model', 'establishments');

                // vérifie si l'user a un resto, si oui redirect sur son tableau de bord sinon page de création
                if (count($this->establishments->selectByUserId($user->id)) > 0) {
                    $etab = $this->establishments->selectUserEtabs($user->id);
                    $etab_id = ['etab_id' => $etab->id];
                    $this->session->set_userdata($etab_id);
                    redirect("back/dashboard");
                } else {
                    redirect("back/create_etabs");
                }

                // compte non validé ou mdp incorrect
            } else {
                $this->session->set_flashdata('error', 'Erreur de connexion');
                redirect('welcome/login');
            }

            // email ne correspond pas
        } else {
            $this->session->set_flashdata('error', 'Erreur de connexion');
            redirect('welcome/login');
        }
    }

    public function logout()
    {
        $user = ['etab_id, user_id, logged_in'];
        $this->session->unset_userdata($user);
        $this->session->sess_destroy();
        redirect('');
    }

}
