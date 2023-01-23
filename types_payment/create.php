<?php 
    include( '../includes/header.php' ); 
    include( '../TypesPayment.php' );
?>

<h1>
    Tipo de pagamento
</h1>

<form
method="POST"
action="">
    <div style="display:flex;flex-direction:column">
        <label style="margin-bottom:.5rem;display:flex;flex-direction:column" for="tipo">
            Tipo: 

            <input type="text" name="tipo" id="tipo" placeholder="Tipo">
        </label>   

        <input type="submit" value="Salvar">
    </div>
</form>

<?php
    if( isset( $_POST['tipo'] ) ) {
        $type_payment = new TypesPayment();

        $type_payment->setTipo( $_POST['tipo'] );
        $type_payment->create();
    }
?>

<?php include( '../includes/footer.php' ); ?>