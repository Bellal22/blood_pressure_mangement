<?php

return [
    'plural' => 'Nurses',
    'singular' => 'Nurse',
    'empty' => 'There are no nurses',
    'select' => 'Select Nurse',
    'permission' => 'Manage Nurses',
    'trashed' => 'Trashed Nurses',
    'perPage' => 'Count Results Per Page',
    'actions' => [
        'list' => 'List Nurses',
        'show' => 'Show Nurse',
        'create' => 'Create',
        'new' => 'New',
        'edit' => 'Edit Nurse',
        'delete' => 'Delete Nurse',
        'restore' => 'Restore',
        'forceDelete' => 'Force Delete',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The nurse has been created successfully.',
        'updated' => 'The nurse has been updated successfully.',
        'deleted' => 'The nurse has been deleted successfully.',
        'restored' => 'The nurse has been restored successfully.',
    ],
    'attributes' => [
        'name' => 'Name',
        'phone' => 'Phone',
        'email' => 'Email',
        'created_at' => 'The Date Of Join',
        'old_password' => 'Old Password',
        'password' => 'Password',
        'password_confirmation' => 'Password Confirmation',
        'type' => 'User Type',
        'avatar' => 'Avatar',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the nurse ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
        'restore' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to restore the nurse ?',
            'confirm' => 'Restore',
            'cancel' => 'Cancel',
        ],
        'forceDelete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to force delete the nurse ?',
            'confirm' => 'Force',
            'cancel' => 'Cancel',
        ],
    ],
];
