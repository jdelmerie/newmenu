<?
$config = [
    'welcome/register' => [
        [
            'field' => 'email',
            'label' => 'email',
            'rules' => 'required|trim|valid_email|is_unique[users.email]',
        ],

        [
            'field' => 'password',
            'label' => 'password',
            'rules' => 'required|trim|min_length[8]',
        ],

        [
            'field' => 'confirmpassword',
            'label' => 'confirmpassword',
            'rules' => 'required|trim|min_length[8]',
        ],
    ],

    'welcome/new_password' => [
        [
            'field' => 'email',
            'label' => 'email',
            'rules' => 'trim|required|valid_email',
        ],

        [
            'field' => 'password',
            'label' => 'password',
            'rules' => 'required|trim|min_length[8]',
        ],
    ],

];