<?php 
    include( '../../includes/header.php' ); 
    include( '../../TypesPayment.php' );
?>

<section class="py-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-8">

                <h1 class="u-font-weight-bold text-center mb-4">
                    Criar
                </h1>

                <form 
                method="POST"
                action="">

                    <div class="row">

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
                            id="tipo">
                        </div>

                        <div class="col-4 mt-4">
                            <a
                            class="c-button-submit text-center text-decoration-none py-2"
                            href="index.php">
                                Voltar
                            </a>
                        </div>

                        <div class="col-4 mt-4">
                            <input
                            class="c-button-submit py-2"
                            type="submit"
                            value="Salvar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
    if( isset( $_POST['tipo'] ) ) {
        $type_payment = new TypesPayment();
        $type_payment->setTipo( $_POST['tipo'] );
        $type_payment->create();
        header('Refresh:0');
    }
?>

<?php include( '../../includes/footer.php' ); ?>