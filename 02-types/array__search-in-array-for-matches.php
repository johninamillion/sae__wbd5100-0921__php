<?php

error_reporting( E_ALL );
ini_set( 'display_errors', '1' );

$users = [
    [
        'name' => 'John',
        'city' => 'Hamburg',
    ],
    [
        'name' => 'Sandra',
        'city' => 'Frankfurt',
    ],
    [
        'name' => 'Grispin',
        'city' => 'Bochum',
    ],
    [
        'name' => 'May',
        'city' => 'Frankfurt',
    ],
    [
        'name' => 'Kevin',
        'city' => 'Hamburg',
    ],
    [
        'name' => 'Julia',
        'city' => 'Frankfurt'
    ]
];

function isUserInCity( array $user, string $city ) : bool {

    return isset( $user[ 'city' ] ) && $user['city'] === $city;
}

function getUsersByCity(array $users, string $city): array {
    $users_by_city = [];

    foreach ($users as $user) {
        if ( isUserInCity( $user, $city ) ) {
            array_push($users_by_city, $user);
        }
    }

    return $users_by_city;
}

$users_in_frankfurt = getUsersByCity($users, 'Frankfurt');
$users_in_hamburg = getUsersByCity($users, 'Hamburg');

var_dump($users_in_frankfurt);
var_dump($users_in_hamburg);
