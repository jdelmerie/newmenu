<?
$config = [
    'welcome/register' => [
        [
            'field' => 'email',
            'label' => 'email',
            'rules' => 'required|valid_email|is_unique[users.email]',
        ],

        [
            'field' => 'password',
            'label' => 'password',
            'rules' => 'required|trim|max_length[8]',
        ],

        [
            'field' => 'confirmpassword',
            'label' => 'confirmpassword',
            'rules' => 'required|trim|max_length[8]',
        ],
    ],

];