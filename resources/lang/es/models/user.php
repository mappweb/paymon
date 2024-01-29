<?php

return [
    'module' => 'Usuario|Usuarios',
    'fillable' => [
        'id' => 'Nro',
        'first_name' => 'Nombres',
        'last_name' => 'Apeliidos',
        'email' => 'Email',
        'password' => 'Contraseña',
        'confirm_password' => 'Confirmar contraseña',
    ],
    'actions' => [
        'create' => 'Crear usuario',
        'edit' => 'Editar usuario',
        'destroy' => 'Eliminar usuario',
        'show' => 'Ver usuario',
    ],
];
