<?php 
    include( '../includes/header.php' ); 
    include( '../Expenses.php' );    
    
    $api_expenses = file_get_contents( '../api/expenses.json', true);
    $data = json_decode( $api_expenses );
    $expenses = new Expenses( $data );
    $expenses->create();
?>

<?php include( '../includes/footer.php' ); ?>