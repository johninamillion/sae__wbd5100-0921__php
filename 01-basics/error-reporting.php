<?php

// Error Handling
// error_reporting  Welche Fehler sollen Ausgegeben werden
error_reporting( E_ERROR );
// ini_set          Überschreiben einer Konfiguration zur Ausgabe von Errormeldungen
ini_set( 'display_errors', '1' );

trigger_error( 'Something wrent wrong', E_USER_ERROR );