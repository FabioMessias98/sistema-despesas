<?php
    include( '../../Expense.php' );

    if( $_GET['id'] ) {
        $expenses = new Expense();
        $expenses->delete( $_GET['id'] );
    }

    header( 'Location: ../index.php' );
?>