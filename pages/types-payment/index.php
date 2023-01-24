<?php
    include( '../../includes/header.php' );
    include( '../../TypesPayment.php' ); 
?>

<section class="d-flex flex-wrap">

    <?php include( '../../includes/sidebar.php' ); ?>

    <div class="col-9 pt-5">

        <div class="row justify-content-end">

            <div class="col-3">
                <a 
                class="l-expense__report py-2"
                href="create.php">
                    Novo tipo de pagamento
                </a>
            </div>
        </div>

        <div class="mt-5 pt-5">

            <h4 class="u-font-weight-bold text-center mb-5">
                Lista de tipos de pagamentos
            </h4>
                    
            <div class="col-12">

                <div class="row">

                    <div class="col-1">
                        <p class="u-font-size-14 u-font-weight-bold text-center">
                            ID
                        </p>
                    </div>

                    <div class="col-10">
                        <p class="u-font-size-14 u-font-weight-bold text-center">
                            Tipo
                        </p>
                    </div>
                </div>
            </div>

            <!-- loop -->
            <?php 
                $types_payment = new TypesPayment();

                foreach( $types_payment->store() as $type_payment ) : 
            ?>
                    <div class="col-12 mb-3">

                        <div class="row">

                            <div class="col-1">

                                <div class="l-expense__box">
                                    <p class="u-font-size-12 u-font-weight-bold u-font-style-italic text-center mb-0 py-2">
                                        <?php echo '#' . $type_payment->id; ?>
                                    </p>
                                </div>
                            </div>

                            <div class="col-9   ">

                                <div class="l-expense__box">
                                    <p class="u-font-size-14 text-center mb-0 py-2">
                                        <?php echo $type_payment->tipo; ?>
                                    </p>
                                </div>
                            </div>

                            <div class="col-1">

                                <div>
                                    <a 
                                    class="l-expense__box__action l-expense__box__action--edit u-font-weight-bold text-center mb-0 py-2"
                                    href="alter.php?id=<?php echo $type_payment->id; ?>">
                                        Editar
                                    </a>
                                </div>
                            </div>

                            <div class="col-1">

                                <div>
                                    <a 
                                    class="l-expense__box__action l-expense__box__action--remove u-font-weight-bold text-center mb-0 py-2"
                                    href="delete.php/?id=<?php echo $type_payment->id; ?>">
                                        Remover
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php    
                endforeach; 
            ?>
            <!-- end loop -->
        </div>
    </div>
</section>

<?php include( '../../includes/footer.php' ); ?>