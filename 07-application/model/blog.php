<?php

function create_post( array &$errors ) : bool {
    $title      = $_POST[ 'title' ] ?? NULL;
    $content    = $_POST[ 'content' ] ?? NULL;
    $username   = $_SESSION[ 'login' ];
    $timestamp  = time();

    sanitize_content( $content );

    $validate_login = validate_login( $errors );
    $validate_tittle = validate_title( $errors, $title );
    $validate_content = validate_content( $errors, $content );

    if ( $validate_login && $validate_tittle && $validate_content ) {
        $data_string = "{$username}|{$timestamp}|{$title}|{$content}\n";

        $write = file_put_contents( BLOG_FILE, $data_string, FILE_APPEND );

        return $write !== FALSE;
    }

    return FALSE;
}

function get_blog_posts() : array {
    $blog_posts = [];

    $data = file_get_contents( BLOG_FILE );

    $explode_lines = explode( "\n", $data );

    foreach ( $explode_lines as $post_data ) {
        $exploded_data = explode( '|', $post_data );

        if ( count( $exploded_data ) === 4 ) {
            $blog_posts[] = [
                'username'      =>  $exploded_data[ 0 ],
                'timestamp'     =>  $exploded_data[ 1 ],
                'title'         =>  $exploded_data[ 2 ],
                'content'       =>  $exploded_data[ 3 ],
            ];
        }
    }

    return $blog_posts;
}

function sanitize_content( string &$content ) : void {
    $sanitizing_list = [
        "\r"    =>  '',
        "\n"    =>  '<br>',
        "|"     =>  ' '
    ];

    foreach ( $sanitizing_list as $search => $replace ) {
        $content = str_replace( $search, $replace, $content );
    }
}

function validate_content( array &$errors, ?string $content ) : bool {
    if ( is_null( $content ) ) {
        $errors[ 'content' ][] = _( 'Please type in a text' );
    }
    if ( strstr( $content, '|' ) !== FALSE ) {
        $errors[ 'content' ][] = _( 'Don\'t use disallowed characters' );
    }

    return isset( $errors[ 'content' ] ) === FALSE || count( $errors[ 'content' ] ) === 0;
}

function validate_login( array &$errors ) : bool {
    if ( is_logged_in() === FALSE ) {
        $errors[ 'login' ][] = _( 'U must be logged in to create a post' );
    }

    return isset( $errors[ 'login' ] ) === FALSE || count( $errors[ 'login' ] ) === 0;
}

function validate_title( array &$errors, ?string $title ) : bool {
    if ( is_null( $title ) ) {
        $errors[ 'title' ][] = _( 'Please type in a title' );
    }
    if ( strstr( $title, '|' ) !== FALSE ) {
        $errors[ 'title' ][] = _( 'Don\'t use disallowed characters' );
    }

    return isset( $errors[ 'title' ] ) === FALSE || count( $errors[ 'title' ] ) === 0;
}
