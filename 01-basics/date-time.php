<?php

/*
 * PHP Time:
 * https://www.php.net/manual/en/function.time.php
 * PHP Date:
 * https://www.php.net/manual/en/function.date.php
 */

$timestamp = time(); // Kriegen wir einen Int mit den Sekunden vom 01.01.1970 (UNIX-Timestamp)

var_dump( $timestamp );

$date = date( 'd.m.Y - H:i' ); // Gibt uns ein für den Nutzer lesbares Datum in einem gewünschten Format zurück

var_dump( $date );
