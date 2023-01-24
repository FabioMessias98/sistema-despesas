<?php
    include( '../../Category.php' );

    if( $_GET['id'] ) {
        $categories = new Category();
        $categories->delete( $_GET['id'] );
    }

    header( 'Location: ../index.php' );
?>