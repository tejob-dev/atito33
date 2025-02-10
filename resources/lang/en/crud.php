<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Edit',
        'update' => 'Update',
        'new' => 'New',
        'cancel' => 'Cancel',
        'attach' => 'Attach',
        'detach' => 'Detach',
        'save' => 'Save',
        'delete' => 'Delete',
        'delete_selected' => 'Delete selected',
        'search' => 'Search...',
        'back' => 'Back to Index',
        'are_you_sure' => 'Are you sure?',
        'no_items_found' => 'No items found',
        'created' => 'Successfully created',
        'saved' => 'Saved successfully',
        'removed' => 'Successfully removed',
    ],

    'users' => [
        'name' => 'Users',
        'index_title' => 'Users List',
        'new_title' => 'New User',
        'create_title' => 'Create User',
        'edit_title' => 'Edit User',
        'show_title' => 'Show User',
        'inputs' => [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
        ],
    ],

    'communes' => [
        'name' => 'Communes',
        'index_title' => 'Communes List',
        'new_title' => 'New Commune',
        'create_title' => 'Create Commune',
        'edit_title' => 'Edit Commune',
        'show_title' => 'Show Commune',
        'inputs' => [
            'nom_commune' => 'Nom Commune',
            'ville_id' => 'Ville',
        ],
    ],

    'photos_salles' => [
        'name' => 'Photos Salles',
        'index_title' => 'PhotosSalles List',
        'new_title' => 'New Photos salle',
        'create_title' => 'Create PhotosSalle',
        'edit_title' => 'Edit PhotosSalle',
        'show_title' => 'Show PhotosSalle',
        'inputs' => [
            'titre_image' => 'Titre Image',
            'description_image' => 'Description Image',
            'photo' => 'Photo',
        ],
    ],

    'quartiers' => [
        'name' => 'Quartiers',
        'index_title' => 'Quartiers List',
        'new_title' => 'New Quartier',
        'create_title' => 'Create Quartier',
        'edit_title' => 'Edit Quartier',
        'show_title' => 'Show Quartier',
        'inputs' => [
            'nom_quartier' => 'Nom Quartier',
            'commune_id' => 'Commune',
        ],
    ],

    'salles' => [
        'name' => 'Salles',
        'index_title' => 'Salles List',
        'new_title' => 'New Salle',
        'create_title' => 'Create Salle',
        'edit_title' => 'Edit Salle',
        'show_title' => 'Show Salle',
        'inputs' => [
            'type' => 'Type',
            'nom_salle' => 'Nom Salle',
            'adresse_salle' => 'Adresse Salle',
            'presentation_salle' => 'Présentation Salle',
            'capacite_salle' => 'Capacite Salle',
            'tarif_salle' => 'Tarif Salle',
            'acces_salle' => 'Acces Salle',
            'logistique_salle' => 'Logistique Salle',
            'telephone' => 'Telephone',
            'tel_whatsapp' => 'Tel Whatsapp',
            'email_salle' => 'Email Salle',
            'facebook_salle' => 'Facebook Salle',
            'site_internet' => 'Site Internet',
            'date_salle' => 'Date Salle',
            'photo' => 'Photo',
            'commune_id' => 'Commune',
            'ville_id' => 'Ville',
            'quartier_id' => 'Quartier',
        ],
    ],

    'texte_jours' => [
        'name' => 'Texte Jours',
        'index_title' => 'TexteJours List',
        'new_title' => 'New Texte jour',
        'create_title' => 'Create TexteJour',
        'edit_title' => 'Edit TexteJour',
        'show_title' => 'Show TexteJour',
        'inputs' => [
            'libelle' => 'Libelle',
            'texte' => 'Texte',
            'photo' => 'Photo',
            'fonction_texte' => 'Fonction Texte',
        ],
    ],

    'type_salles' => [
        'name' => 'Type Salles',
        'index_title' => 'TypeSalles List',
        'new_title' => 'New Type salle',
        'create_title' => 'Create TypeSalle',
        'edit_title' => 'Edit TypeSalle',
        'show_title' => 'Show TypeSalle',
        'inputs' => [
            'libelle' => 'Libelle',
            'description' => 'Description',
            'photo' => 'Photo',
        ],
    ],

    'video_salles' => [
        'name' => 'Video Salles',
        'index_title' => 'VideoSalles List',
        'new_title' => 'New Video salle',
        'create_title' => 'Create VideoSalle',
        'edit_title' => 'Edit VideoSalle',
        'show_title' => 'Show VideoSalle',
        'inputs' => [
            'lien_video' => 'Lien Video',
            'photo' => 'Photo',
        ],
    ],

    'villes' => [
        'name' => 'Villes',
        'index_title' => 'Villes List',
        'new_title' => 'New Ville',
        'create_title' => 'Create Ville',
        'edit_title' => 'Edit Ville',
        'show_title' => 'Show Ville',
        'inputs' => [
            'nom_ville' => 'Nom Ville',
        ],
    ],

    'comptes' => [
        'name' => 'Comptes',
        'index_title' => 'Comptes List',
        'new_title' => 'New Compte',
        'create_title' => 'Create Compte',
        'edit_title' => 'Edit Compte',
        'show_title' => 'Show Compte',
        'inputs' => [
            'nom_compte' => 'Nom Compte',
            'prenom_compte' => 'Prenom Compte',
            'telephone_compte' => 'Telephone Compte',
            'whatsapp_compte' => 'Whatsapp Compte',
            'adresse_compte' => 'Adresse Compte',
            'nom_entreprise' => 'Nom Entreprise',
            'siteweb_compte' => 'Siteweb Compte',
            'activite_compte' => 'Activite Compte',
            'logo_entreprise' => 'Logo Entreprise',
            'user_id' => 'User',
        ],
    ],

    'salle_type_salles' => [
        'name' => 'Salle Type Salles',
        'index_title' => ' List',
        'new_title' => 'New Salle type salle',
        'create_title' => 'Create salle_type_salle',
        'edit_title' => 'Edit salle_type_salle',
        'show_title' => 'Show salle_type_salle',
        'inputs' => [
            'type_salle_id' => 'Type Salle',
        ],
    ],

    'salle_video_salles' => [
        'name' => 'Salle Video Salles',
        'index_title' => ' List',
        'new_title' => 'New Salle video salle',
        'create_title' => 'Create salle_video_salle',
        'edit_title' => 'Edit salle_video_salle',
        'show_title' => 'Show salle_video_salle',
        'inputs' => [
            'video_salle_id' => 'Video Salle',
        ],
    ],

    'salle_photos_salles' => [
        'name' => 'Salle Photos Salles',
        'index_title' => ' List',
        'new_title' => 'New Photos salle salle',
        'create_title' => 'Create photos_salle_salle',
        'edit_title' => 'Edit photos_salle_salle',
        'show_title' => 'Show photos_salle_salle',
        'inputs' => [
            'photos_salle_id' => 'Photos Salle',
        ],
    ],

    'salle_comptes' => [
        'name' => 'Salle Comptes',
        'index_title' => ' List',
        'new_title' => 'New Info user salle',
        'create_title' => 'Create info_user_salle',
        'edit_title' => 'Edit info_user_salle',
        'show_title' => 'Show info_user_salle',
        'inputs' => [
            'info_user_id' => 'Compte',
        ],
    ],

    'roles' => [
        'name' => 'Roles',
        'index_title' => 'Roles List',
        'create_title' => 'Create Role',
        'edit_title' => 'Edit Role',
        'show_title' => 'Show Role',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'visites' => [
        'name' => 'Visites',
        'index_title' => 'Visites List',
        'new_title' => 'New Visite',
        'create_title' => 'Create Visite',
        'edit_title' => 'Edit Visite',
        'show_title' => 'Show Visite',
        'inputs' => [
            'counter' => 'Counter',
            'salle_id' => 'Salle',
        ],
    ],

    'salle_comodites' => [
        'name' => 'Salle Comodites',
        'index_title' => ' List',
        'new_title' => 'New Comodite salle',
        'create_title' => 'Create comodite_salle',
        'edit_title' => 'Edit comodite_salle',
        'show_title' => 'Show comodite_salle',
        'inputs' => [
            'comodite_id' => 'Comodite',
        ],
    ],

    'comodites' => [
        'name' => 'Comodites',
        'index_title' => 'Comodites List',
        'new_title' => 'New Comodite',
        'create_title' => 'Create Comodite',
        'edit_title' => 'Edit Comodite',
        'show_title' => 'Show Comodite',
        'inputs' => [
            'libel' => 'Libelle',
        ],
    ],

    'contacts' => [
        'name' => 'Contacts',
        'index_title' => 'Contacts List',
        'new_title' => 'New Contact',
        'create_title' => 'Create Contact',
        'edit_title' => 'Edit Contact',
        'show_title' => 'Show Contact',
        'inputs' => [
            'message' => 'Message',
            'nom_prenom_c' => 'Nom Prenom',
            'phone' => 'Phone',
            'email' => 'Email',
            'compte_id' => 'Compte',
        ],
    ],

    'permissions' => [
        'name' => 'Permissions',
        'index_title' => 'Permissions List',
        'create_title' => 'Create Permission',
        'edit_title' => 'Edit Permission',
        'show_title' => 'Show Permission',
        'inputs' => [
            'name' => 'Name',
        ],
    ],
];
