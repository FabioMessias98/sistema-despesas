<?php
    include( '../../Expense.php' );

    $expenses = new Expense();

    header( 'Content-Type: text/csv; charset=UTF-8' );
    header( 'Content-Disposition: attachment; filename=relatorio.csv' );
    
    $data = fopen( 'php://output', 'w' );
    $header = ['id', mb_convert_encoding( 'Data de criação', 'ISO-8859-1', 'UTF-8' ), 'Valor', mb_convert_encoding( 'Descrição', 'ISO-8859-1', 'UTF-8' ), 'Tipo de pagamento', 'Categoria'];

    fputcsv( $data, $header, ';');
    fputcsv( $data, json_decode(json_encode($expenses->store()), true), ';');
    fclose( $data );
?>