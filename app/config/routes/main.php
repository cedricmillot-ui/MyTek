<?php

return [
    '/'                          => 'App\Controllers\MainController@index',
    '/climatisation'             => 'App\Controllers\MainController@climatisation',
    '/pompe-a-chaleur'           => 'App\Controllers\MainController@pompeAChaleur',
    '/chauffe-eau'               => 'App\Controllers\MainController@chauffeeau',
    '/plomberie'                 => 'App\Controllers\MainController@plomberie',
    '/nettoyage'                 => 'App\Controllers\MainController@nettoyage',
    '/entretien'                 => 'App\Controllers\MainController@entretien',
    '/contact'                   => 'App\Controllers\MainController@contact',
    
    // Pages Légales
    '/mentions-legales'          => 'App\Controllers\MainController@mentions',
    '/conditions-generales'      => 'App\Controllers\MainController@cgv', 
    '/politique-confidentialite' => 'App\Controllers\MainController@confidentialite', 
    
    // Erreur
    '/404'                       => 'App\Controllers\MainController@notFound',
];