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

    'welcome/connexion' => [
        [
            'field' => 'email',
            'label' => 'email',
            'rules' => 'required|trim|valid_email',
        ],

        [
            'field' => 'password',
            'label' => 'password',
            'rules' => 'required|trim|min_length[8]',
        ],
    ],

    'back/add_etabs' => [
        [
            'field' => 'nom',
            'label' => 'nom',
            'rules' => 'required',
        ],

        [
            'field' => 'url',
            'label' => 'url',
            'rules' => 'trim|required',
        ],

        [
            'field' => 'adresse',
            'label' => 'adresse',
            'rules' => 'required',
        ],

        [
            'field' => 'code_postale',
            'label' => 'code_postale',
            'rules' => 'required|numeric',
        ],

        [
            'field' => 'ville',
            'label' => 'ville',
            'rules' => 'required',
        ],

        [
            'field' => 'telephone',
            'label' => 'telephone',
            'rules' => 'required|numeric',
        ],

        [
            'field' => 'site',
            'label' => 'site',
            'rules' => 'required|valid_url',
        ],
    ],

    'back/edit_etabs' => [
        [
            'field' => 'nom',
            'label' => 'nom',
            'rules' => 'required',
        ],

        [
            'field' => 'url',
            'label' => 'url',
            'rules' => 'trim|required',
        ],

        [
            'field' => 'adresse',
            'label' => 'adresse',
            'rules' => 'required',
        ],

        [
            'field' => 'code_postale',
            'label' => 'code_postale',
            'rules' => 'required|numeric',
        ],

        [
            'field' => 'ville',
            'label' => 'ville',
            'rules' => 'required',
        ],

        [
            'field' => 'telephone',
            'label' => 'telephone',
            'rules' => 'required|numeric',
        ],

        [
            'field' => 'site',
            'label' => 'site',
            'rules' => 'required|valid_url',
        ],
    ],

    'back/edit_category_done' => [
        [
            'field' => 'nom',
            'label' => 'nom',
            'rules' => 'required',
        ],

        [
            'field' => 'description',
            'label' => 'description',
            'rules' => 'max_length[100]',
        ],

        [
            'field' => 'rang',
            'label' => 'rang',
            'rules' => '',
        ],
    ],

    'back/add_category_done' => [
        [
            'field' => 'nom',
            'label' => 'nom',
            'rules' => 'required',
        ],

        [
            'field' => 'description',
            'label' => 'description',
            'rules' => 'max_length[100]',
        ],

        [
            'field' => 'rang',
            'label' => 'rang',
            'rules' => '',
        ],
    ],

    'back/add_product_done' => [
        [
            'field' => 'nom',
            'label' => 'nom',
            'rules' => 'required',
        ],

        [
            'field' => 'description',
            'label' => 'description',
            'rules' => 'max_length[100]',
        ],

        [
            'field' => 'prix',
            'label' => 'prix',
            'rules' => 'integer',
        ],

        [
            'field' => 'rang',
            'label' => 'rang',
            'rules' => '',
        ],
    ],

    'back/edit_product_done' => [
        [
            'field' => 'nom',
            'label' => 'nom',
            'rules' => 'required',
        ],

        [
            'field' => 'description',
            'label' => 'description',
            'rules' => 'max_length[100]',
        ],

        [
            'field' => 'prix',
            'label' => 'prix',
            'rules' => 'integer',
        ],

        [
            'field' => 'rang',
            'label' => 'rang',
            'rules' => '',
        ],
    ],

    'back/add_quantity_done' => [
        [
            'field' => 'nom',
            'label' => 'nom',
            'rules' => 'required',
        ],

        [
            'field' => 'rang',
            'label' => 'rang',
            'rules' => '',
        ],
    ],

    'back/edit_single_quantity' => [
        [
            'field' => 'qtyname',
            'label' => 'qtyname',
            'rules' => 'required',
        ],
    ],
    



];