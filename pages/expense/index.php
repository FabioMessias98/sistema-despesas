<?php 
    include( '../../includes/header.php' ); 
    include( '../../ApiCategory.php' );
    include( '../../ApiTypesPayment.php' );
    include( '../../Expense.php' );  
    include( '../../TypesPayment.php' );
    include( '../../Category.php' );
    include( '../../functions.php' );

    $api_category = file_get_contents( '../../api/categories.json', true);
    $data_category = json_decode( $api_category );

    $api_types_payment = file_get_contents( '../../api/types-payment.json', true);
    $data_types_payment = json_decode( $api_types_payment );

    $categories = new Category();
    $types_payment = new TypesPayment();

    if( !$categories->store() && !$types_payment->store() ) {
        $categories_api = new ApiCategory( $data_category );
        $categories_api->create();
        $types_payment_api = new ApiTypesPayment( $data_types_payment );
        $types_payment_api->create();
    }
?>

    <section class="d-flex flex-wrap">

        <?php include( '../../includes/sidebar.php' ); ?>

        <div class="col-9 pt-5">

            <div class="row">

                <div class="col-6">
                    <h1>
                        <strong>Despesas</strong> - <?php echo get_format_month( date('m') ); ?>
                    </h1>
                </div>

                <div class="col-6">

                    <div class="row justify-content-end">

                        <div class="col-4">
                            <a 
                            class="l-expense__report py-2"
                            href="create.php">
                                Nova despesa
                            </a>
                        </div>

                        <div class="col-5">
                            <div class="l-expense__report py-2">
                                Gerar relatório

                                <div class="l-expense__report__item">
                                    <a 
                                    class="l-expense__report__item__link py-2"
                                    href="../../report/pdf/">
                                        PDF
                                    </a>

                                    <a 
                                    class="l-expense__report__item__link py-2"
                                    href="../../report/excel/">
                                        Excel
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5 pt-5">

                <h4 class="u-font-weight-bold text-center mb-5">
                    Lista das despesas do mês de <?php echo get_format_month(date( 'm' )); ?>
                </h4>
                        
                <div class="col-12">

                    <div class="row">

                        <div class="col-1">
                            <p class="u-font-size-14 u-font-weight-bold text-center">
                                ID
                            </p>
                        </div>

                        <div class="col">
                            <p class="u-font-size-14 u-font-weight-bold text-center">
                                Valor
                            </p>
                        </div>

                        <div class="col">
                            <p class="u-font-size-14 u-font-weight-bold text-center">
                                Data da compra
                            </p>
                        </div>

                        <div class="col">
                            <p class="u-font-size-14 u-font-weight-bold text-center">
                                Descrição
                            </p>
                        </div>

                        <div class="col">
                            <p class="u-font-size-14 u-font-weight-bold text-center">
                                Tipo de pagamento
                            </p>
                        </div>

                        <div class="col">
                            <p class="u-font-size-14 u-font-weight-bold text-center">
                                Categoria
                            </p>
                        </div>

                        <div class="col-2"></div>
                    </div>
                </div>
                <!-- loop -->
                <?php 
                    $expenses = new Expense();
                        
                    if( $expenses->store() ) :
                        foreach( $expenses->store() as $expense ) :
                            list($data_day, $data_month, $data_year) = explode('-', $expense->data_compra);    
                            if( $data_month == date( 'm' ) ) :         
                ?>
                                <div class="col-12 mb-3">

                                    <div class="row">

                                        <div class="col-1">

                                            <div class="l-expense__box">
                                                <p class="u-font-size-12 u-font-weight-bold u-font-style-italic text-center mb-0 py-2">
                                                    <?php echo '#' . $expense->id_despesa; ?>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col">

                                            <div class="l-expense__box">
                                                <p class="u-font-size-14 text-center mb-0 py-2">
                                                    <?php echo $expense->valor; ?>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col">

                                            <div class="l-expense__box">
                                                <p class="u-font-size-14 text-center mb-0 py-2">
                                                    <?php echo get_format_date( $expense->data_compra ); ?>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col">

                                            <div class="l-expense__box">
                                                <p class="u-font-size-14 text-center mb-0 py-2">
                                                    <?php echo $expense->descricao_despesa; ?>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col">

                                            <div class="l-expense__box">
                                                <p class="u-font-size-14 text-center mb-0 py-2">
                                                    <?php echo $expense->tipo; ?>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col">

                                            <div class="l-expense__box">
                                                <p class="u-font-size-14 text-center mb-0 py-2">
                                                    <?php echo $expense->nome; ?>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-1">

                                            <div>
                                                <a 
                                                class="l-expense__box__action l-expense__box__action--edit u-font-weight-bold text-center mb-0 py-2"
                                                href="alter.php/?id=<?php echo $expense->id_despesa; ?>">
                                                    Editar
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-1">

                                            <div>
                                                <a 
                                                class="l-expense__box__action l-expense__box__action--remove u-font-weight-bold text-center mb-0 py-2"
                                                href="delete.php/?id=<?php echo $expense->id_despesa; ?>">
                                                    Remover
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                <?php       endif;  
                        endforeach; 
                    endif;
                ?>
                <!-- end loop -->
            </div>
        </div>
    </section>
</div>

<?php include( '../../includes/footer.php' ); ?>