<?php 
    include( '../../includes/header.php' );
    include( '../../TypesPayment.php' ); 

    if( isset( $_GET['id'] ) ) {
        $id = $_GET['id'];
        $types_payment = new TypesPayment();  
        $type_payment = $types_payment->find( $id );
    }
?>

<?php if( $type_payment ) : ?>
    <section class="py-5">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-8">

                    <h1 class="u-font-weight-bold text-center mb-4">
                        Alterar
                    </h1>

                    <form 
                    method="POST"
                    action="">

                        <div class="row justify-content-between">

                            <div class="col-12">
                                <label
                                class="u-font-weight-bold"
                                for="tipo">
                                    Tipo:
                                </label>

                                <input 
                                class="c-input-field py-2 px-4" 
                                type="text" 
                                name="tipo" 
                                id="tipo"
                                value="<?php echo $type_payment[0]->tipo; ?>">
                            </div>

                            <div class="col-4 mt-4">
                                <input
                                class="c-button-submit py-2"
                                type="submit"
                                value="Editar">
                            </div>

                            <div class="col-4 mt-4">
                                <a
                                class="c-button-submit text-center text-decoration-none py-2"
                                href="./index.php">
                                    Voltar
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php else : ?>
    <div 
    class="d-flex justify-content-center align-items-center"
    style="width:100%;height:100vh">
        <h3 class="u-font-weight-bold">
            Nenhum tipo de pagamento encontrado!
        </h3>   
    </div>
<?php endif; ?>

<?php
    if( isset( $_POST['tipo'] ) ) {
        $types_payment->setTipo( $_POST['tipo'] );
        $types_payment->update($type_payment[0]->id); 
        header('Refresh:0');
    }
?>