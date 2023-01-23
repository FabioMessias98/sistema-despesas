<?php
    include( '../TypesPayment.php' );

    if( $_GET['id'] ) {
        $types_payment = new TypesPayment();
        $types_payment->delete( $_GET['id'] );
    }

    header( 'Location: ../index.php' );
?>