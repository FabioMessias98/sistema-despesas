<?php 
    include( '../TypesPayment.php' ); 
?>

<h1>
    Alterar
</h1>

<?php
    if( isset( $_GET['id'] ) ) {
        $id = $_GET['id'];
        $types_payment = new TypesPayment();  
        $type_payment = $types_payment->find( $id );
    }
?>

<?php if( $type_payment ) : ?>
    <form
    method="POST"
    action="">
        <div style="display:flex;flex-direction:column">
            <label style="margin-bottom:.5rem;display:flex;flex-direction:column" for="tipo">
                Tipo:

                <input type="text" name="tipo" id="tipo" placeholder="Tipo" value="<?php echo $type_payment[0]->tipo; ?>">
            </label>   

            <input type="submit" value="Salvar">
        </div>
    </form>
<?php else : ?>
    <p>
        Nenhum tipo de pagamento encontrado!
    </p>
<?php endif; ?>

<?php
    if( isset( $_POST['tipo'] ) ) {
        $types_payment->setTipo( $_POST['tipo'] );
        $types_payment->update($type_payment[0]->id); 
    }
?>