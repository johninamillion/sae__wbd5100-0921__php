<?php

namespace Application;

// Error Reporting
error_reporting( E_ALL );
ini_set( 'display_errors', '1' );

// Configuration
define( 'APPLICATION_ROOT',         __DIR__ );
define( 'TEMPLATES_DIR',            __DIR__ . '/templates' );
define( 'USERS_FILE',               __DIR__ . '/data/users.txt' );
define( 'USERS_FILE_PERMISSIONS',   'rw+' );

// Session starten
Session::start();
